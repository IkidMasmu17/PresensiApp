<!-- Topbar -->
<header class="bg-white border-b border-gray-200 h-20 flex items-center px-6 lg:px-8">
    <div class="flex-grow flex items-center">
        <!-- Sidebar Toggle (Mobile) -->
        <button @click="open = !open"
            class="p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100 lg:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Search Bar -->
        <div
            class="hidden sm:flex items-center ml-4 bg-gray-50 border border-gray-300 rounded-lg px-3 py-1.5 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:border-transparent transition">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" placeholder="Search..."
                class="bg-transparent border-none focus:ring-0 text-sm ml-2 text-gray-700 w-64">
        </div>
    </div>

    <!-- Right Side Tools -->
    <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <button class="p-2 rounded-full text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition relative">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="absolute top-2 right-2 block h-2 w-2 rounded-full bg-red-500 border-2 border-white"></span>
        </button>

        <!-- Divider -->
        <div class="h-6 w-px bg-gray-200"></div>

        <!-- User Dropdown -->
        <div x-data="{ userOpen: false }" class="relative">
            <button @click="userOpen = !userOpen" @click.away="userOpen = false"
                class="flex items-center space-x-3 p-1 rounded-full hover:bg-gray-100 transition focus:outline-none">
                <div
                    class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold border-2 border-white text-xs">
                    {{ substr(strtoupper(session('username')), 0, 1) }}
                </div>
                <span
                    class="hidden md:block text-sm font-medium text-gray-700">{{ ucfirst(session('username')) }}</span>
                <svg :class="userOpen ? 'rotate-180' : ''" class="h-4 w-4 text-gray-400 transition-transform"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="userOpen" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-48 rounded-lg shadow-xl bg-white border border-gray-100 z-50 overflow-hidden"
                style="display: none;">
                <div class="px-4 py-3 border-b border-gray-50">
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Signed in as</p>
                    <p class="text-sm font-medium text-gray-900 truncate">{{ session('username') }}</p>
                </div>
                <a href="{{ url('logout') }}"
                    class="flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                    <svg class="h-4 w-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>