<div>
   @if($this->isOpen)
    <!-- Mobile Menu Overlay -->
    <div class="fixed inset-0 z-50">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" wire:click="closeMenu"></div>
        
        <!-- Menu Panel -->
        <div class="absolute right-0 top-0 h-full w-80 bg-white shadow-xl transform transition-transform duration-300 ease-in-out">
            <!-- Menu Header -->
            <div class="flex items-center justify-between p-6 border-b">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('public/images/bcelogo.png') }}" alt="BCE Logo" class="h-8">
                    <span class="text-sm italic opacity-80 text-gray-700">sine scientia ars nihil est</span>
                </div>
                <button wire:click="closeMenu" class="p-2 hover:bg-gray-100 rounded-full transition">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Menu Content -->
            <div class="p-6 overflow-y-auto" style="height: calc(100vh - 80px)">
                <!-- Search Bar (Mobile) -->
                <form action="{{ route('visitor.products.index') }}" method="GET" class="mb-6">
                    <input
                        type="text"
                        name="search"
                        placeholder="Search for products..."
                        value="{{ request('search') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </form>
                
                <!-- Navigation Links -->
                <nav class="space-y-1 mb-8">
                    <a href="/" wire:click="closeMenu" class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium text-gray-900">Home</span>
                    </a>
                    
                    <a href="/products" wire:click="closeMenu" class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span class="font-medium text-gray-900">Products</span>
                    </a>
                    
                    <a href="#" wire:click="closeMenu" class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium text-gray-900">About</span>
                    </a>
                    
                    <a href="#" wire:click="closeMenu" class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium text-gray-900">Contact</span>
                    </a>
                </nav>
                
                <!-- Cart Section -->
                <div class="mb-8">
                    <a href="/cart" wire:click="closeMenu" class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                                    {{-- {{ session('cart') ? count(session('cart')) : 0 }} --}}
                                </span>
                            </div>
                            <span class="font-medium text-gray-900">Shopping Cart</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                
                <!-- Auth Section -->
                <div class="pt-6 border-t border-gray-200">
                    @auth
                        <a href="{{ route('dashboard') }}" wire:click="closeMenu" class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="font-medium text-gray-900">My Account</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" wire:click="closeMenu" class="flex items-center space-x-3 w-full p-3 hover:bg-gray-50 rounded-lg transition text-left">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="font-medium text-gray-900">Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" wire:click="closeMenu" class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="font-medium text-gray-900">Login / Register</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endif
</div>