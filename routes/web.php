<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/debug-db', function () {
    try {
        $dbPath = config('database.connections.sqlite.database');
        return [
            'database_path' => $dbPath,
            'database_exists' => file_exists($dbPath),
            'user_count' => \App\Models\User::count(),
            'users' => \App\Models\User::all('email')->pluck('email'),
            'env' => app()->environment(),
        ];
    } catch (\Exception $e) {
        return ['error' => $e->getMessage()];
    }
});

Route::get('/run-seed', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return 'Database migrated and seeded successfully! Now try to login.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/reset-admin', function () {
    try {
        $admin1 = \App\Models\User::where('email', 'admin@umkm.com')->first();
        if ($admin1) {
            $admin1->password = \Illuminate\Support\Facades\Hash::make('password');
            $admin1->save();
        }

        $admin2 = \App\Models\User::where('email', 'admin@umkm.local')->first();
        if ($admin2) {
            $admin2->password = \Illuminate\Support\Facades\Hash::make('admin123');
            $admin2->save();
        }

        return 'Admin passwords have been explicitly reset. Try admin@umkm.com / password OR admin@umkm.local / admin123';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/debug-logs', function () {
    $logPath = storage_path('logs/laravel.log');
    if (!file_exists($logPath)) {
        return 'Log file not found at ' . $logPath;
    }
    $logs = file_get_contents($logPath);
    // Return last 100 lines
    $lines = explode("\n", $logs);
    $lastLines = array_slice($lines, -100);
    return response(implode("\n", $lastLines), 200, ['Content-Type' => 'text/plain']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard - accessible by all authenticated users
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Products - Admin only for create/edit/delete
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // Admin-only product routes (must be before {product} wildcard)
    Route::middleware('role:admin')->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::patch('/products/{product}', [ProductController::class, 'update']);
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    
    // Product show route (after /create to avoid matching 'create' as {product})
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    
    // POS (Point of Sale) - accessible by admin and staff
    Route::get('/pos', [POSController::class, 'index'])->name('pos.index');
    Route::post('/pos', [POSController::class, 'store'])->name('pos.store');
    Route::get('/pos/receipt/{id}', [POSController::class, 'receipt'])->name('pos.receipt');
    Route::get('/pos/receipt/{id}/download', [POSController::class, 'downloadReceipt'])->name('pos.receipt.download');
    
    // Inventory - view for all, adjustments for admin only
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/adjustments', [InventoryController::class, 'adjustments'])->name('inventory.adjustments');
    
    Route::middleware('role:admin')->group(function () {
        Route::get('/inventory/adjustments/create', [InventoryController::class, 'createAdjustment'])->name('inventory.adjustments.create');
        Route::post('/inventory/adjustments', [InventoryController::class, 'storeAdjustment'])->name('inventory.adjustments.store');
    });
    
    // Purchases - Admin only
    Route::middleware('role:admin')->group(function () {
        Route::resource('purchases', PurchaseController::class);
    });
    
    // Stock Adjustments - Admin only
    Route::middleware('role:admin')->group(function () {
        Route::resource('stock-adjustments', StockAdjustmentController::class)->only(['index', 'create', 'store', 'show']);
    });
    
    // Reports & Analytics - view for all, export for admin
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/profit-loss', [ReportController::class, 'profitLoss'])->name('reports.profit-loss');
    Route::get('/reports/top-products', [ReportController::class, 'topProducts'])->name('reports.top-products');
    
    Route::middleware('role:admin')->group(function () {
        Route::get('/reports/sales/export-excel', [ReportController::class, 'exportSalesExcel'])->name('reports.sales.export-excel');
    });
    
    // Profile - accessible by all authenticated users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
