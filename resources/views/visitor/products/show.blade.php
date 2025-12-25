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
                    <span class="ml-2 font-medium text-gray-700">{{ $product->name }}</span>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images Section -->
            <div class="space-y-4">
                <!-- Main Product Image -->
                <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl overflow-hidden shadow-lg p-8">
                    <div class="aspect-square w-full flex items-center justify-center">
                        <!-- Placeholder for product image -->
                        <div class="text-center">
                            <div class="text-8xl mb-4">📦</div>
                            <p class="text-gray-500">Product Image</p>
                            <!-- In real app: <img src="{{ $product->image_url }}" class="max-h-full max-w-full object-contain"> -->
                        </div>
                    </div>
                </div>

                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-3">
                    @for($i = 1; $i <= 4; $i++)
                    <button class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl overflow-hidden border-2 border-transparent hover:border-blue-400 transition-all duration-200 p-3">
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-2xl">🛍️</span>
                        </div>
                    </button>
                    @endfor
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="space-y-6">
                <!-- Product Header -->
                <div>
                    <!-- Category Badge -->
                    <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium mb-3">
                        Category
                    </span>
                    
                    <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $product->name }}</h1>
                    
                    <!-- Rating & Reviews -->
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex items-center">
                            <div class="flex text-yellow-400">
                                @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-600">4.5 (128 reviews)</span>
                        </div>
                        <span class="text-green-600 font-medium">
                            <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            In Stock
                        </span>
                    </div>
                </div>

                <!-- Price Display -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
                    <div class="flex items-baseline space-x-2">
                        <span class="text-5xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        <span class="text-gray-500 line-through">${{ number_format($product->price * 1.2, 2) }}</span>
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm font-bold">Save 20%</span>
                    </div>
                    <p class="text-gray-600 mt-2">Free shipping on orders over $100</p>
                </div>

                <!-- Product Description -->
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-gray-900">Description</h2>
                    <div class="prose prose-lg text-gray-700 leading-relaxed">
                        {{ $product->description }}
                    </div>
                </div>

                <!-- Features/Specifications -->
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['Feature 1', 'Feature 2', 'Feature 3', 'Feature 4'] as $feature)
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-700">{{ $feature }}</span>
                    </div>
                    @endforeach
                </div>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST" class="space-y-6 bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <label class="text-lg font-medium text-gray-900">Quantity:</label>
                            <div class="flex items-center space-x-3">
                                <button type="button" onclick="decreaseQuantity()" class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" max="99" class="w-20 text-center border-0 text-2xl font-bold focus:ring-0">
                                <button type="button" onclick="increaseQuantity()" class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center space-x-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>Add to Cart</span>
                            </button>

                            <button type="button" onclick="buyNow()" class="flex-1 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold py-4 px-8 rounded-xl hover:from-green-600 hover:to-emerald-600 transition-all duration-200 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center space-x-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span>Buy Now</span>
                            </button>
                        </div>

                        <div class="flex space-x-4">
                            <button type="button" class="flex-1 border border-gray-300 text-gray-700 font-medium py-3 px-6 rounded-xl hover:bg-gray-50 transition-colors duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span>Add to Wishlist</span>
                            </button>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="pt-6 border-t border-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                            <div class="flex flex-col items-center p-3">
                                <svg class="w-8 h-8 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm font-medium">30-Day Returns</span>
                            </div>
                            <div class="flex flex-col items-center p-3">
                                <svg class="w-8 h-8 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span class="text-sm font-medium">Secure Payment</span>
                            </div>
                            <div class="flex flex-col items-center p-3">
                                <svg class="w-8 h-8 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span class="text-sm font-medium">Warranty</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i = 1; $i <= 4; $i++)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-4 bg-gradient-to-br from-gray-50 to-blue-50 aspect-square flex items-center justify-center">
                        <span class="text-4xl">📱</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Related Product {{ $i }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-blue-600">${{ number_format(rand(500, 2000), 2) }}</span>
                            <button class="text-gray-500 hover:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8 flex justify-center">
            <a href="{{ route('visitor.products.index') }}" class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-800 font-medium px-6 py-3 border border-blue-200 rounded-xl hover:bg-blue-50 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to All Products</span>
            </a>
        </div>
    </div>

    <script>
        // Quantity controls
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.max) || 99;
            const current = parseInt(input.value) || 1;
            if (current < max) {
                input.value = current + 1;
            }
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            const min = parseInt(input.min) || 1;
            const current = parseInt(input.value) || 1;
            if (current > min) {
                input.value = current - 1;
            }
        }

        // Buy Now functionality
        function buyNow() {
            const form = document.querySelector('form');
            const quantity = document.getElementById('quantity').value;
            
            // Create a hidden input for instant checkout
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'checkout_now';
            hiddenInput.value = 'true';
            form.appendChild(hiddenInput);
            
            // Optional: Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = `
                <svg class="w-6 h-6 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Processing...
            `;
            submitBtn.disabled = true;
            
            // Submit form
            form.submit();
            
            // Reset button after 3 seconds (if submission fails)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        }

        // Thumbnail click handler
        document.querySelectorAll('[class*="bg-gradient-to-br"] button').forEach((btn, index) => {
            btn.addEventListener('click', () => {
                // In real app, this would change the main image
                console.log(`Clicked thumbnail ${index + 1}`);
                btn.classList.toggle('border-blue-400');
            });
        });
    </script>

    <style>
        /* Custom scrollbar for number input */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
        }
        
        /* Smooth transitions */
        button, a, input {
            transition: all 0.2s ease;
        }
        
        /* Focus styles */
        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
    </style>

</x-visitor-layout>