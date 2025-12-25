 <x-visitor-layout>
                
                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Our Products</h1>
                    <p class="text-gray-600">Discover our premium selection of products</p>
                    
                    <!-- Search Bar -->
                    <div class="mt-6 max-w-md">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="product-search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search for products...">
                        </div>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div class="product-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                    <div class="product-card bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Product Image -->
                        <div class="product-image">
                            <!-- Placeholder for actual product image -->
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50">
                                <div class="text-center">
                                    <div class="text-4xl mb-2">🛒</div>
                                    <div class="text-gray-500 text-sm">Product Image</div>
                                </div>
                            </div>
                            <!-- In a real app, you would use: -->
                            <!-- <img src="{{ $product->image_url }}" alt="{{ $product->name }}"> -->
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-2">
                                <h2 class="text-xl font-bold text-gray-800">{{ $product->name }}</h2>
                                <div class="price-tag">${{ number_format($product->price, 2) }}</div>
                            </div>
                            
                            <p class="text-gray-600 mb-4 description-truncate">{{ $product->description }}</p>
                            
                            <!-- Rating (Optional) -->
                            <div class="flex items-center mb-5">
                                <div class="flex text-yellow-400">
                                    <!--{{$stars = 5 }}-->
                                    @for($i = 0; $i < 5 ; $i++)
                                    <x-common.dynamic-icon name="star"/>
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-500 text-sm">(4.5)</span>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex space-x-3">
                                <livewire:add-to-cart-button :product-id="$product->id" />

                                
                                <button class="btn-buy-now flex-1 text-white font-medium py-2.5 px-4 rounded-lg flex items-center justify-center">
                                     <x-common.dynamic-icon name="bag"/>
                                    Buy Now
                                </button>
                            </div>
                            
                            <!-- Quick View Link -->
                            <div class="mt-4 text-center">
                                <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                                    <x-common.dynamic-icon name="eye"/>
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="inline-flex rounded-md shadow">
                        <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-blue-600 hover:bg-gray-50">1</a>
                        <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                        <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                        <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
                
                <!-- Empty State (For demonstration) -->
                <div id="no-products-message" class="hidden mt-12 text-center">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-700 mb-2">No products found</h3>
                    <p class="text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
                </div>
                
                   <script>
            // Simple search functionality
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('product-search');
                const productCards = document.querySelectorAll('.product-card');
                const noProductsMessage = document.getElementById('no-products-message');
                
                if (searchInput) {
                    searchInput.addEventListener('input', function(e) {
                        const searchTerm = e.target.value.toLowerCase().trim();
                        let visibleCount = 0;
                        
                        productCards.forEach(card => {
                            const productName = card.querySelector('h2').textContent.toLowerCase();
                            const productDescription = card.querySelector('p').textContent.toLowerCase();
                            
                            if (productName.includes(searchTerm) || productDescription.includes(searchTerm) || searchTerm === '') {
                                card.style.display = 'block';
                                visibleCount++;
                            } else {
                                card.style.display = 'none';
                            }
                        });
                        
                        // Show/hide no products message
                        if (visibleCount === 0 && searchTerm !== '') {
                            noProductsMessage.classList.remove('hidden');
                        } else {
                            noProductsMessage.classList.add('hidden');
                        }
                    });
                }
                
                // Add to cart button functionality
                document.querySelectorAll('.btn-add-to-cart').forEach(button => {
                    button.addEventListener('click', function() {
                        const productCard = this.closest('.product-card');
                        const productName = productCard.querySelector('h2').textContent;
                        const productPrice = productCard.querySelector('.price-tag').textContent;
                        
                        // Animation feedback
                        const originalText = this.innerHTML;
                        this.innerHTML = `
                            <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Adding...
                        `;
                        this.disabled = true;
                        
                        // Simulate API call
                        setTimeout(() => {
                            this.innerHTML = `
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Added!
                            `;
                            this.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                            this.classList.add('bg-green-500', 'hover:bg-green-600');
                            
                            // Reset after 2 seconds
                            setTimeout(() => {
                                this.innerHTML = originalText;
                                this.disabled = false;
                                this.classList.remove('bg-green-500', 'hover:bg-green-600');
                                this.classList.add('bg-blue-500', 'hover:bg-blue-600');
                            }, 2000);
                            
                            // In a real app, you would send an AJAX request to add item to cart
                            console.log(`Added "${productName}" (${productPrice}) to cart`);
                        }, 800);
                    });
                });
                
                // Buy now button functionality
                document.querySelectorAll('.btn-buy-now').forEach(button => {
                    button.addEventListener('click', function() {
                        const productCard = this.closest('.product-card');
                        const productName = productCard.querySelector('h2').textContent;
                        
                        // Animation feedback
                        const originalText = this.innerHTML;
                        this.innerHTML = `
                            <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Processing...
                        `;
                        this.disabled = true;
                        
                        // Simulate API call
                        setTimeout(() => {
                            // In a real app, you would redirect to checkout
                            alert(`Redirecting to checkout for "${productName}"`);
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 1000);
                    });
                });
            });
         </script>
            </x-visitor-layout>