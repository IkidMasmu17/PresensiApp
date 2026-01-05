<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-bold text-xl text-blue-600">PresensiApp</span>
                </div>
                <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ url('user/home') }}"
                        class="{{ request()->segment(2) == 'home' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                        Dashboard
                    </a>
                    <a href="{{ url('user/history') }}"
                        class="{{ request()->segment(2) == 'history' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                        Riwayat
                    </a>
                    <a href="{{ url('user/about') }}"
                        class="{{ request()->segment(2) == 'about' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                        Profil
                    </a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="ml-3 relative">
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">Hi,
                            <b>{{ ucfirst(session('username') ?? 'User') }}</b></span>
                        <a href="{{ url('user/logout') }}"
                            class="text-sm text-red-600 hover:text-red-900 font-medium">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>