    <div class="flex justify-between items-center px-6 py-4">
        <!-- Page Title -->
        <h1 class="text-xl font-semibold text-gray-800">
            
        </h1>
        
        <!-- Right side items -->
        <div class="flex items-center space-x-4">
            <!-- Notification Bell -->
            <div class="relative">
                <x-dynamic-icon
                        :name="'bell'"
                        class="
                            w-6 h-6 
                            {{-- {{ $isActive 
                                ? 'text-gray-900' 
                                : 'text-gray-500 group-hover:text-gray-700' 
                            }} --}}
                            transition-colors
                        "
                    />
            </div>
            
            <!-- User Profile Dropdown (optional) -->
            <div class="flex items-center space-x-3 hidden">
                <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-sm font-medium text-gray-700">A</span>
                </div>
                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
