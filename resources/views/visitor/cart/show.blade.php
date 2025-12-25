<x-visitor-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Breadcrumb Navigation -->
        <nav class="mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="{{ route('visitor.products.index') }}" class="text-gray-500 hover:text-blue-600">Products</a>
                </li>
                <li class="flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 font-medium text-gray-700">Shopping Cart</span>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-bold text-gray-900 mb-8">Shopping Cart</h1>

        @if($cartItems && count($cartItems) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Cart Header -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Your Items ({{ count($cartItems) }})</h2>
                        <button onclick="clearCart()" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Clear Cart
                        </button>
                    </div>
                </div>

                <!-- Cart Items List -->
                <div class="space-y-4">
                    @foreach($cartItems as $item)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col sm:flex-row">
                            <!-- Product Image -->
                            <div class="sm:w-32 md:w-40 bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center p-4">
                                <div class="text-center">
                                    <div class="text-4xl mb-2">🛒</div>
                                    <p class="text-gray-500 text-sm">Product Image</p>
                                    <!-- In real app: <img src="{{ $item->product->image_url }}" class="max-h-32 max-w-full object-contain"> -->
                                </div>
                            </div>
                            
                            <!-- Product Details -->
                            <div class="flex-1 p-6">
                                <div class="flex flex-col md:flex-row md:items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item->product->name ?? 'Product Name' }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $item->product->description ?? 'Product description...' }}</p>
                                        
                                        <!-- Product Features -->
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Category</span>
                                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">In Stock</span>
                                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Free Shipping</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Price & Actions -->
                                    <div class="flex flex-col items-end space-y-4">
                                        <!-- Price -->
                                        <div class="text-right">
                                            <p class="text-2xl font-bold text-gray-900">${{ number_format($item->product->price ?? 0, 2) }}</p>
                                            <p class="text-gray-500 text-sm">${{ number_format(($item->product->price ?? 0) * $item->quantity, 2) }} total</p>
                                        </div>
                                        
                                        <!-- Quantity Controls -->
                                        <div class="flex items-center space-x-3">
                                            <button onclick="updateQuantity({{ $item->id }}, -1)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                </svg>
                                            </button>
                                            <span class="w-12 text-center text-lg font-semibold">{{ $item->quantity }}</span>
                                            <button onclick="updateQuantity({{ $item->id }}, 1)" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <!-- Remove Button -->
                                        <button onclick="removeItem({{ $item->id }})" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Promo Code -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Have a Promo Code?</h3>
                    <div class="flex space-x-4">
                        <input type="text" placeholder="Enter promo code" class="flex-1 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold px-6 py-3 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-200">
                            Apply
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <!-- Summary Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                            <h2 class="text-xl font-bold text-white">Order Summary</h2>
                            <p class="text-blue-100">Review your order details</p>
                        </div>
                        
                        <!-- Summary Details -->
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-900">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold text-green-600">FREE</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Tax</span>
                                <span class="font-semibold text-gray-900">${{ number_format($tax, 2) }}</span>
                            </div>
                            
                            <!-- Promo Discount -->
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Discount</span>
                                <span class="font-semibold text-red-600">-$0.00</span>
                            </div>
                            
                            <!-- Divider -->
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <div class="text-right">
                                        <p class="text-3xl font-bold text-gray-900">${{ number_format($total, 2) }}</p>
                                        <p class="text-gray-500 text-sm">Including ${{ number_format($tax, 2) }} in taxes</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Checkout Button -->
                            <button onclick="proceedToCheckout()" class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold py-4 px-6 rounded-xl hover:from-green-600 hover:to-emerald-600 transition-all duration-200 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center space-x-3 mt-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span>Proceed to Checkout</span>
                            </button>
                            
                            <!-- Continue Shopping -->
                            <a href="{{ route('visitor.products.index') }}" class="block w-full text-center border border-gray-300 text-gray-700 font-medium py-3 px-6 rounded-xl hover:bg-gray-50 transition-colors duration-200 mt-4">
                                Continue Shopping
                            </a>
                            
                            <!-- Security Badges -->
                            <div class="pt-6 border-t border-gray-100">
                                <div class="grid grid-cols-3 gap-4 text-center">
                                    <div class="flex flex-col items-center p-2">
                                        <svg class="w-6 h-6 text-green-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                        <span class="text-xs font-medium text-gray-600">Secure</span>
                                    </div>
                                    <div class="flex flex-col items-center p-2">
                                        <svg class="w-6 h-6 text-blue-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        <span class="text-xs font-medium text-gray-600">SSL</span>
                                    </div>
                                    <div class="flex flex-col items-center p-2">
                                        <svg class="w-6 h-6 text-purple-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs font-medium text-gray-600">24/7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Need Help? -->
                    <div class="mt-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Need Help?</h3>
                        <p class="text-gray-600 mb-4">Our customer support is here to help you with any questions.</p>
                        <div class="space-y-2">
                            <a href="#" class="flex items-center text-blue-600 hover:text-blue-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>+1 (555) 123-4567</span>
                            </a>
                            <a href="#" class="flex items-center text-blue-600 hover:text-blue-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>support@example.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recently Viewed -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Recently Viewed</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i = 1; $i <= 4; $i++)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-4 bg-gradient-to-br from-gray-50 to-blue-50 aspect-square flex items-center justify-center">
                        <span class="text-4xl">📱</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Product {{ $i }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-blue-600">${{ number_format(rand(500, 2000), 2) }}</span>
                            <button class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        @else
        <!-- Empty Cart State -->
        <div class="text-center py-16">
            <div class="text-gray-400 mb-6">
                <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-700 mb-4">Your cart is empty</h2>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">Looks like you haven't added any items to your cart yet. Start shopping to discover amazing products!</p>
            <div class="space-x-4">
                <a href="{{ route('visitor.products.index') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold px-8 py-3 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Start Shopping</span>
                </a>
                <a href="/" class="inline-flex items-center space-x-2 border border-gray-300 text-gray-700 font-medium px-8 py-3 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Return Home</span>
                </a>
            </div>
        </div>
        @endif
    </div>

    <script>
        // Cart Functions
        function updateQuantity(itemId, change) {
            // In real app, make AJAX call to update cart
            console.log(`Updating item ${itemId} by ${change}`);
            
            // Show loading state
            const button = event.target.closest('button');
            const originalContent = button.innerHTML;
            button.innerHTML = `
                <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            `;
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                button.innerHTML = originalContent;
                button.disabled = false;
                
                // Reload page to show updated cart
                window.location.reload();
            }, 500);
        }
        
        function removeItem(itemId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                // In real app, make AJAX call to remove item
                console.log(`Removing item ${itemId}`);
                
                // Show loading state
                const button = event.target;
                const originalContent = button.innerHTML;
                button.innerHTML = 'Removing...';
                button.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Reload page to show updated cart
                    window.location.reload();
                }, 500);
            }
        }
        
        function clearCart() {
            if (confirm('Are you sure you want to clear your entire cart?')) {
                // In real app, make AJAX call to clear cart
                console.log('Clearing cart');
                
                // Simulate API call
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            }
        }
        
        function proceedToCheckout() {
            // In real app, redirect to checkout page
            console.log('Proceeding to checkout');
            
            // Show loading state
            const button = event.target;
            const originalContent = button.innerHTML;
            button.innerHTML = `
                <svg class="w-6 h-6 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Processing...
            `;
            button.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Redirect to checkout
                window.location.href = '/checkout';
            }, 1000);
        }
    </script>

    <style>
        /* Custom styles */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .sticky {
            position: sticky;
        }
        
        /* Smooth transitions */
        button, a, input {
            transition: all 0.2s ease;
        }
        
        /* Hover effects */
        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</x-visitor-layout>