<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Metrics Cards - 2 columns on mobile, 5 on desktop -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-6 mb-8">
                <!-- Total Products -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Total Produk</p>
                                <p class="text-lg sm:text-2xl font-bold text-gray-900 mt-1">{{ $totalProducts }}</p>
                            </div>
                            <div class="flex-shrink-0 bg-blue-100 rounded-lg p-2 sm:p-3">
                                <svg class="h-5 w-5 sm:h-8 sm:w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Low Stock Products -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Stok Tipis</p>
                                <p class="text-lg sm:text-2xl font-bold text-gray-900 mt-1">{{ $lowStockProducts }}</p>
                            </div>
                            <div class="flex-shrink-0 bg-orange-100 rounded-lg p-2 sm:p-3">
                                <svg class="h-5 w-5 sm:h-8 sm:w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Sales -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Hari Ini</p>
                                <p class="text-lg sm:text-2xl font-bold text-gray-900 mt-1">Rp{{ number_format($todaysSales/1000, 0) }}k</p>
                            </div>
                            <div class="flex-shrink-0 bg-green-100 rounded-lg p-2 sm:p-3">
                                <svg class="h-5 w-5 sm:h-8 sm:w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Revenue -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Bulan Ini</p>
                                <p class="text-lg sm:text-2xl font-bold text-gray-900 mt-1">Rp{{ number_format($monthlyRevenue/1000000, 1) }}M</p>
                            </div>
                            <div class="flex-shrink-0 bg-purple-100 rounded-lg p-2 sm:p-3">
                                <svg class="h-5 w-5 sm:h-8 sm:w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inventory Value -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-[10px] sm:text-sm font-medium text-gray-500 uppercase tracking-wider">Total Nilai</p>
                                <p class="text-lg sm:text-2xl font-bold text-gray-900 mt-1">Rp{{ number_format($inventoryValue/1000000, 1) }}M</p>
                            </div>
                            <div class="flex-shrink-0 bg-indigo-100 rounded-lg p-2 sm:p-3">
                                <svg class="h-5 w-5 sm:h-8 sm:w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Low Stock Alerts -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Peringatan Stok Hampir Habis</h3>
                        <div class="space-y-3">
                            @forelse($lowStockAlerts as $product)
                                <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $product->name }}</p>
                                        <p class="text-sm text-gray-500">SKU: {{ $product->sku }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-orange-600">Stok: {{ $product->stock_quantity }} unit</p>
                                        <p class="text-xs text-gray-500">Min: {{ $product->minimum_stock_threshold }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Tidak ada produk dengan stok rendah</p>
                            @endforelse
                        </div>
                        @if($lowStockAlerts->count() > 0)
                            <div class="mt-4">
                                <a href="{{ route('inventory.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    Lihat Semua Inventori →
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Sales -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Penjualan Terbaru</h3>
                        <div class="space-y-3">
                            @forelse($recentSales as $sale)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $sale->sale_number }}</p>
                                        <p class="text-sm text-gray-500">{{ $sale->user->name }} • {{ $sale->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-green-600">Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</p>
                                        <p class="text-xs text-gray-500">{{ ucfirst($sale->payment_method) }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Belum ada penjualan</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales Analytics Chart (Moved Below Grid) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Analitik Penjualan Bulanan</h3>
                    <div class="h-[250px] sm:h-[300px]">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Actions with Modal-Style Buttons -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Shortcut</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="{{ route('products.create') }}" class="group relative flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md border border-blue-200">
                            <div class="bg-white rounded-lg p-3 mb-3 shadow-sm group-hover:shadow-md transition-shadow">
                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">Tambah Produk</span>
                        </a>
                        
                        <a href="{{ route('pos.index') }}" class="group relative flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md border border-green-200">
                            <div class="bg-white rounded-lg p-3 mb-3 shadow-sm group-hover:shadow-md transition-shadow">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">Buat Penjualan</span>
                        </a>
                        
                        <a href="{{ route('purchases.create') }}" class="group relative flex flex-col items-center justify-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md border border-purple-200">
                            <div class="bg-white rounded-lg p-3 mb-3 shadow-sm group-hover:shadow-md transition-shadow">
                                <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">Buat Pembelian</span>
                        </a>
                        
                        <a href="{{ route('inventory.adjustments.create') }}" class="group relative flex flex-col items-center justify-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 hover:from-orange-100 hover:to-orange-200 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md border border-orange-200">
                            <div class="bg-white rounded-lg p-3 mb-3 shadow-sm group-hover:shadow-md transition-shadow">
                                <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">Penyesuaian Stok</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Prepare data for chart
        const monthlySales = @json($monthlySales);
        
        const labels = monthlySales.map(item => {
            const [year, month] = item.month.split('-');
            const date = new Date(year, month - 1);
            return date.toLocaleDateString('id-ID', { month: 'short', year: 'numeric' });
        });
        
        const data = monthlySales.map(item => item.total);

        // Create chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Penjualan (Rp)',
                    data: data,
                    borderColor: 'rgb(37, 99, 235)',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: 'rgb(37, 99, 235)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive:true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
