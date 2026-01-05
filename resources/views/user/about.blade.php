@extends('user.layouts')

@section('content')

    <!-- Header -->
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
        <p class="text-gray-500">Informasi data diri karyawan.</p>
    </div>

    <!-- Profile Card -->
    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

            <!-- Header Banner & Avatar -->
            <div class="relative h-32 bg-gradient-to-r from-blue-500 to-indigo-600">
                <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2">
                    <div class="rounded-full p-1.5 bg-white shadow-md">
                        <div
                            class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-2xl font-bold border-4 border-white">
                            <!-- Auto Initials from Name -->
                            {{ substr(strtoupper($user->name), 0, 1) }}
                        </div>
                        <!-- If user has photo, logic would handle it here. Fallback to Initials. -->
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div class="pt-12 pb-8 px-6 text-center">
                <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>

                <div class="mt-4 flex justify-center space-x-3">
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                        Karyawan Aktif
                    </span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                        {{ $user->role_id == 1 ? 'Administrator' : 'Staff' }}
                    </span>
                </div>

                <!-- Detail Grid -->
                <div class="mt-8 grid grid-cols-2 gap-4 text-left border-t border-gray-100 pt-6">
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">Username</label>
                        <p class="text-gray-700 font-medium">{{ $user->username ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">Bergabung
                            Sejak</label>
                        <p class="text-gray-700 font-medium">{{ date('d M Y', strtotime($user->created_at)) }}</p>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-wider font-semibold">Auth Type</label>
                        <p class="text-gray-700 font-medium">
                            @if($user->github_id)
                                <span class="inline-flex items-center">
                                    <svg class="h-4 w-4 mr-1 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                    GitHub
                                </span>
                            @else
                                Email/Password
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Action -->
                <div class="mt-8">
                    <a href="{{ url('user/logout') }}"
                        class="block w-full py-2 px-4 border border-red-300 rounded-md text-sm font-medium text-red-700 bg-white hover:bg-red-50 focus:outline-none transition">
                        Logout
                    </a>
                </div>

            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ url('user/home') }}"
                class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

    </div>

@endsection