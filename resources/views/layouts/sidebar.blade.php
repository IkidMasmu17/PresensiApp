<!-- Sidebar -->
<aside x-data="{ open: true }" :class="open ? 'w-64' : 'w-20'"
    class="flex flex-col h-screen transition-all duration-300 bg-slate-900 text-white shadow-xl fixed lg:static z-50">

    <!-- Sidebar - Brand -->
    <div class="flex items-center justify-center h-20 border-b border-slate-800 px-4 whitespace-nowrap overflow-hidden">
        <a href="{{ url('dashboard') }}" class="flex items-center space-x-3">
            <div class="p-2 bg-indigo-500 rounded-lg">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span x-show="open" class="text-xl font-bold tracking-tight"
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100">
                PresensiApp
            </span>
        </a>
    </div>

    <!-- Nav Items -->
    <div class="flex-grow overflow-y-auto px-4 py-6 space-y-1">

        <!-- Dashboard -->
        <a href="{{ url('dashboard') }}"
            class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'dashboard') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span x-show="open" class="ml-3 font-medium text-sm">Dashboard</span>
        </a>

        <!-- Divider -->
        <div x-show="open" class="pt-4 pb-2">
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-3">Management</p>
        </div>

        @if(session('role_id') == 1)
            <!-- Admin Items -->
            <a href="{{ url('user') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'user') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Users</span>
            </a>

            <a href="{{ url('attendance') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'attendance') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Attendance</span>
            </a>

            <a href="{{ url('role') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'role') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Roles</span>
            </a>

            <a href="{{ url('concession') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'concession') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Concession</span>
            </a>

            <a href="{{ url('salary') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'salary') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Salary</span>
            </a>
        @endif

        @if(session('role_id') == 2)
            <!-- User Specific Items -->
            <a href="{{ url('salary') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'salary') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Salary</span>
            </a>
            <a href="{{ url('attendance') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'attendance') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Report Attendance</span>
            </a>
        @endif

        @if(session('role_id') == 3)
            <!-- Manager Specific Items -->
            <a href="{{ url('attendance') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'attendance') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Report Attendance</span>
            </a>
            <a href="{{ url('concession') }}"
                class="flex items-center p-3 rounded-lg transition-colors {{ (request()->segment(1) == 'concession') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span x-show="open" class="ml-3 font-medium text-sm">Report Concession</span>
            </a>
        @endif
    </div>

    <!-- Sidebar - Footer (Logout) -->
    <div class="p-4 border-t border-slate-800">
        <a href="{{ url('logout') }}"
            class="flex items-center p-3 rounded-lg text-slate-400 hover:bg-red-500/10 hover:text-red-500 transition-colors">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span x-show="open" class="ml-3 font-medium text-sm">Logout</span>
        </a>
    </div>
</aside>