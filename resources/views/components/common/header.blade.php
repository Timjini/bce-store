<header class="w-full flex justify-between items-center px-4 md:px-8 py-4 bg-bce-blue/90 backdrop-blur top-0 z-50">
    <!-- Logo Section -->
    <a href="/" class="flex items-center space-x-3">
        <img src="{{ asset('public/images/bcelogo.png') }}" alt="BCE Logo" class="h-8 md:h-10">
        <span class="text-sm italic opacity-80 hidden sm:block text-white">sine scientia ars nihil est</span>
    </a>

    <!-- Desktop Search Bar -->
    <div class="flex-1 mx-4 md:mx-6 max-w-xl hidden md:block">
        <form action="{{ route('visitor.products.index') }}" method="GET" class="w-full">
            <input
                type="text"
                name="search"
                placeholder="Search for products..."
                value="{{ request('search') }}"
                class="w-full border rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </form>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex space-x-6 text-sm uppercase tracking-wide text-white">
        <a href="/products" class="hover:text-bce-accent transition">Products</a>
    </nav>
    {{var_dump(session()->all())}}
    <!-- Right Section Actions -->
    <div class="flex items-center space-x-4">
        <!-- Desktop Cart Button -->
        <a href="{{route('visitor.cart.show')}}" class="hidden md:block relative flex items-center text-gray-100 hover:text-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-3 h-3 flex items-center justify-center">
                {{-- {{ session('cart') ? count(session('cart')) : 0 }} --}}
            </span>
        </a>

        <!-- Desktop User Button -->
        @auth
            <a href="{{ route('dashboard') }}" class="hidden md:flex text-gray-100 hover:text-gray-200 items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>
        @else
            <a href="{{ route('login') }}" class="hidden md:block text-gray-100 hover:text-gray-200">Login</a>
        @endauth

        <!-- Mobile Search Button -->
        <button x-data @click="$dispatch('open-mobile-search')" class="md:hidden text-white p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>

        <!-- Mobile Menu Button (Burger) -->
        <button 
            wire:click="$dispatch('toggleMobileMenu', null, { global: true })"
            class="md:hidden text-white p-2 focus:outline-none"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

    </div>

    <!-- Mobile Search Bar (Hidden by default) -->
    <div 
        x-data="{ open: false }" 
        x-show="open" 
        x-on:open-mobile-search.window="open = true"
        x-on:click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute top-full left-0 right-0 bg-white shadow-lg p-4 z-50 md:hidden"
        style="display: none;"
    >
        <form action="{{ route('visitor.products.index') }}" method="GET" class="flex space-x-2">
            <input
                type="text"
                name="search"
                placeholder="Search for products..."
                value="{{ request('search') }}"
                class="flex-1 border rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button type="button" @click="open = false" class="p-3 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </form>
    </div>
</header>

<!-- Mobile Menu Component -->
<livewire:mobile-menu />


<script>
    // Listen for menu state changes to update body class
    window.addEventListener('menuStateChanged', function(e) {
        if (e.detail.isOpen) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            Livewire.emit('toggleMobileMenu');
        }
    });
</script>