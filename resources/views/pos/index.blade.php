<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Point of Sale (POS)
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mobile Tab Navigation -->
            <div class="lg:hidden flex mb-4 bg-white rounded-lg shadow-sm p-1 border border-gray-200">
                <button onclick="switchTab('products')" id="tab-products" 
                        class="flex-1 py-2 px-4 rounded-md font-semibold text-sm transition-all duration-200 bg-blue-600 text-white shadow-sm">
                    Daftar Produk
                </button>
                <button onclick="switchTab('cart')" id="tab-cart" 
                        class="flex-1 py-2 px-4 rounded-md font-semibold text-sm transition-all duration-200 text-gray-600 hover:bg-gray-50">
                    Keranjang (<span id="cart-count-badge">0</span>)
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left: Product Selection (2/3 width) -->
                <div class="lg:col-span-2 block" id="section-products">
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-6">
                        <div class="p-4">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </span>
                                <input type="text" id="product-search" placeholder="Cari nama atau SKU..." 
                                       class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg font-semibold mb-4 lg:block hidden">Pilih Produk</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4" id="product-grid">
                                @foreach($products as $product)
                                    <button class="product-item flex flex-col p-3 border border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 text-left bg-white shadow-sm active:scale-95 touch-manipulation"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ e($product->name) }}"
                                            data-price="{{ $product->harga_jual }}"
                                            data-stock="{{ $product->stock_quantity }}">
                                        <div class="mb-2">
                                            <h4 class="font-bold text-sm text-gray-800 line-clamp-2 leading-tight h-10">{{ $product->name }}</h4>
                                            <p class="text-[10px] text-gray-400 truncate mt-1">#{{ $product->sku }}</p>
                                        </div>
                                        <div class="mt-auto">
                                            <p class="text-sm font-black text-blue-600">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</p>
                                            <div class="flex items-center justify-between mt-1">
                                                <span class="text-[10px] {{ $product->stock_quantity <= 5 ? 'text-red-500 font-bold' : 'text-gray-500' }}">
                                                    Stok: {{ $product->stock_quantity }}
                                                </span>
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Cart & Checkout (1/3 width) -->
                <div class="lg:col-span-1 lg:block hidden" id="section-cart">
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl sticky top-6 border border-gray-100">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Keranjang Belanja
                            </h3>
                            
                            <div id="cart-items" class="space-y-2 mb-4 max-h-64 overflow-y-auto">
                                <p class="text-gray-500 text-center py-8">Keranjang kosong</p>
                            </div>

                            <div class="border-t pt-4 mb-4">
                                <div class="flex justify-between text-lg font-bold mb-4">
                                    <span>Total:</span>
                                    <span id="total-amount" class="text-green-600">Rp 0</span>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Metode Pembayaran</label>
                                    <select id="payment-method" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="cash">Tunai</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                                    <textarea id="notes" rows="2" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>

                                <button onclick="processCheckout()" id="checkout-btn" 
                                        class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded mb-2">
                                    Proses Pembayaran
                                </button>
                                <button onclick="clearCart()" 
                                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Reset Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];
        let allProducts = @json($products);

        // HTML escape function to prevent XSS
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Product click event delegation (safe from XSS)
        document.getElementById('product-grid').addEventListener('click', function(e) {
            const btn = e.target.closest('.product-item');
            if (btn) {
                const id = parseInt(btn.dataset.id);
                const name = btn.dataset.name;
                const price = parseFloat(btn.dataset.price);
                const stock = parseInt(btn.dataset.stock);
                addToCart(id, name, price, stock);
            }
        });

        // Product search
        document.getElementById('product-search').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const productItems = document.querySelectorAll('.product-item');
            
            productItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(query)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        function switchTab(tab) {
            const prodSection = document.getElementById('section-products');
            const cartSection = document.getElementById('section-cart');
            const prodTab = document.getElementById('tab-products');
            const cartTab = document.getElementById('tab-cart');

            if (tab === 'products') {
                prodSection.classList.remove('hidden');
                prodSection.classList.add('block');
                cartSection.classList.add('hidden');
                cartSection.classList.remove('block');
                
                prodTab.classList.add('bg-blue-600', 'text-white', 'shadow-sm');
                prodTab.classList.remove('text-gray-600', 'hover:bg-gray-50');
                
                cartTab.classList.remove('bg-blue-600', 'text-white', 'shadow-sm');
                cartTab.classList.add('text-gray-600', 'hover:bg-gray-50');
            } else {
                prodSection.classList.add('hidden');
                prodSection.classList.remove('block');
                cartSection.classList.remove('hidden');
                cartSection.classList.add('block');
                
                cartTab.classList.add('bg-blue-600', 'text-white', 'shadow-sm');
                cartTab.classList.remove('text-gray-600', 'hover:bg-gray-50');
                
                prodTab.classList.remove('bg-blue-600', 'text-white', 'shadow-sm');
                prodTab.classList.add('text-gray-600', 'hover:bg-gray-50');
            }
        }

        function addToCart(id, name, price, stock) {
            const existing = cart.find(item => item.product_id === id);
            
            if (existing) {
                if (existing.quantity >= stock) {
                    alert('Stok tidak mencukupi!');
                    return;
                }
                existing.quantity++;
            } else {
                cart.push({
                    product_id: id,
                    name: name,
                    unit_price: price,
                    quantity: 1,
                    stock: stock
                });
            }
            
            // Feedback for mobile
            if (window.innerWidth < 1024) {
               window.showToast('Produk ditambahkan ke keranjang');
            }
            
            renderCart();
        }

        function updateQuantity(index, delta) {
            const item = cart[index];
            const newQty = item.quantity + delta;
            
            if (newQty <= 0) {
                cart.splice(index, 1);
            } else if (newQty > item.stock) {
                alert('Stok tidak mencukupi!');
                return;
            } else {
                item.quantity = newQty;
            }
            
            renderCart();
        }

        function removeItem(index) {
            cart.splice(index, 1);
            renderCart();
        }

        function renderCart() {
            const cartItems = document.getElementById('cart-items');
            const totalAmount = document.getElementById('total-amount');
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-gray-500 text-center py-8">Keranjang kosong</p>';
                totalAmount.textContent = 'Rp 0';
                document.getElementById('cart-count-badge').textContent = '0';
                return;
            }
            
            let total = 0;
            let html = '';
            
            cart.forEach((item, index) => {
                const subtotal = item.unit_price * item.quantity;
                total += subtotal;
                
                html += `
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-100">
                        <div class="flex-1">
                            <p class="font-bold text-sm text-gray-800">${escapeHtml(item.name)}</p>
                            <p class="text-xs text-gray-500">Rp ${formatNumber(item.unit_price)} × ${item.quantity}</p>
                        </div>
                        <div class="flex items-center gap-1 sm:gap-2 ml-2">
                            <button onclick="updateQuantity(${index}, -1)" class="w-8 h-8 flex items-center justify-center bg-white border border-gray-200 hover:bg-gray-50 text-gray-600 rounded-lg shadow-sm font-bold">-</button>
                            <span class="w-6 text-center text-sm font-bold">${item.quantity}</span>
                            <button onclick="updateQuantity(${index}, 1)" class="w-8 h-8 flex items-center justify-center bg-white border border-gray-200 hover:bg-gray-50 text-gray-600 rounded-lg shadow-sm font-bold">+</button>
                            <button onclick="removeItem(${index})" class="w-8 h-8 flex items-center justify-center bg-red-50 hover:bg-red-600 text-white rounded-lg shadow-sm ml-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>
                `;
            });
            
            cartItems.innerHTML = html;
            totalAmount.textContent = 'Rp ' + formatNumber(total);
            
            // Update mobile badge
            document.getElementById('cart-count-badge').textContent = cart.reduce((acc, item) => acc + item.quantity, 0);
        }

        async function processCheckout() {
            if (cart.length === 0) {
                alert('Keranjang kosong!');
                return;
            }
            
            const items = cart.map(item => ({
                product_id: item.product_id,
                quantity: item.quantity,
                unit_price: item.unit_price
            }));
            
            const data = {
                items: items,
                payment_method: document.getElementById('payment-method').value,
                notes: document.getElementById('notes').value
            };
            
            try {
                const response = await fetch('{{ route("pos.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert(`Penjualan berhasil!\nNo. Transaksi: ${result.sale_number}`);
                    window.location.href = '{{ route("pos.receipt", ":id") }}'.replace(':id', result.sale_id);
                } else {
                    alert('Error: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan: ' + error.message);
            }
        }

        function clearCart() {
            if (cart.length > 0 && !confirm('Yakin ingin mengosongkan keranjang?')) {
                return;
            }
            cart = [];
            renderCart();
        }

        function formatNumber(num) {
            return Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>
</x-app-layout>
