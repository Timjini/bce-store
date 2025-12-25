<div wire:key="add-to-cart-{{ $productId }}">
    @if($inCart)
        <!-- Already in cart - show quantity controls -->
        <div class="flex items-center space-x-3">
            <button wire:click="removeFromCart" 
                    wire:loading.attr="disabled"
                    class="w-10 h-10 rounded-full border border-red-300 text-red-600 flex items-center justify-center hover:bg-red-50 transition-colors">
                <svg wire:loading.remove wire:target="removeFromCart" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                </svg>
                <svg wire:loading wire:target="removeFromCart" class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>
            
            <span class="text-lg font-bold text-gray-900 w-8 text-center">{{ $cartQuantity }}</span>
            
            <button wire:click="addToCart" 
                    wire:loading.attr="disabled"
                    class="w-10 h-10 rounded-full border border-green-300 text-green-600 flex items-center justify-center hover:bg-green-50 transition-colors">
                <svg wire:loading.remove wire:target="addToCart" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <svg wire:loading wire:target="addToCart" class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>
            
            <span class="text-sm text-green-600 font-medium ml-2">In Cart</span>
        </div>
    @else
        <!-- Add to Cart Button -->
        <button wire:click="addToCart" 
                wire:loading.attr="disabled"
                class="btn-add-to-cart w-full text-white font-medium py-2.5 px-4 rounded-lg flex items-center justify-center transition-all duration-200 hover:shadow-lg">
            <svg wire:loading.remove wire:target="addToCart" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <svg wire:loading wire:target="addToCart" class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span wire:loading.remove wire:target="addToCart">Add to Cart</span>
            <span wire:loading wire:target="addToCart">Adding...</span>
        </button>
    @endif
</div>
