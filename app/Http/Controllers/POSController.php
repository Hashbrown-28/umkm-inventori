<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class POSController extends Controller
{
    public function index()
    {
        $products = Product::active()
            ->where('stock_quantity', '>', 0)
            ->get();
        
        return view('pos.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:cash,transfer',
            'notes' => 'nullable|string',
        ]);
        
        DB::beginTransaction();
        
        try {
            // Calculate total
            $totalAmount = 0;
            foreach ($validated['items'] as $item) {
                $totalAmount += $item['quantity'] * $item['unit_price'];
            }
            
            // Create sale
            $sale = Sale::create([
                'sale_number' => Sale::generateSaleNumber(),
                'user_id' => auth()->id(),
                'total_amount' => $totalAmount,
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'paid',
                'notes' => $validated['notes'] ?? null,
            ]);
            
            // Create sale items and update stock
            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);
                
                // Check stock availability
                if ($product->stock_quantity < $item['quantity']) {
                    throw new \Exception("Stok tidak cukup untuk produk: {$product->name}");
                }
                
                // Create sale item
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['quantity'] * $item['unit_price'],
                ]);
                
                // Reduce stock
                $product->decrement('stock_quantity', $item['quantity']);
            }
            
            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Penjualan berhasil disimpan',
                'sale_id' => $sale->id,
                'sale_number' => $sale->sale_number,
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function receipt($id)
    {
        $sale = Sale::with(['items.product', 'user'])->findOrFail($id);
        
        return view('pos.receipt', compact('sale'));
    }
    public function downloadReceipt($id)
    {
        $sale = Sale::with('items.product', 'user')->findOrFail($id);
        
        $pdf = Pdf::loadView('pdf.receipt', compact('sale'));
        
        return $pdf->download('struk-' . $sale->sale_number . '.pdf');
    }
    }

