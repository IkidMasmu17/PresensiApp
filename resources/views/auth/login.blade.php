<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - PresensiApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">
        <!-- Logo / Brand -->
        <div class="text-center mb-10">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-xl shadow-indigo-100 mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09m8.19.828c.196.12.398.228.605.322m.967-1.127c.322.067.643.125.967.173m-10.14-1.24a5.5 5.5 0 1110.14 0M12 7v4" />
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Admin Central</h1>
            <p class="text-slate-500 mt-2">Selamat datang kembali, mohon autentikasi diri Anda.</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-10">

                @if(session()->has('message'))
                    <div class="mb-6 flex items-center p-4 text-sm text-red-800 border border-red-100 rounded-xl bg-red-50"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="font-medium">{{ session('message') }}</div>
                    </div>
                @endif

                <form action="{{ url('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-1">
                        <label class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-indigo-600 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                </svg>
                            </div>
                            <input type="email" name="email" required placeholder="admin@example.com"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 focus:bg-white transition outline-none">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-indigo-600 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" name="password" required placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-100 focus:border-indigo-500 focus:bg-white transition outline-none">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember"
                                class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                        </div>
                        <a href="#" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition">Lupa
                            password?</a>
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 active:scale-[0.98] transition transform">
                        Masuk ke Panel Admin
                    </button>

                    <div class="relative flex items-center justify-center py-2">
                        <div class="flex-grow border-t border-gray-100"></div>
                        <span
                            class="flex-shrink mx-4 text-gray-400 text-xs font-bold uppercase tracking-widest">Atau</span>
                        <div class="flex-grow border-t border-gray-100"></div>
                    </div>

                    <a href="{{ url('/') }}"
                        class="inline-flex w-full items-center justify-center px-4 py-3 bg-white border-2 border-gray-100 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition active:scale-[0.98]">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Kembali ke Beranda
                    </a>

                </form>
            </div>
            <div class="px-8 py-5 bg-gray-50/50 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">Belum punya akun? <a href="{{ url('register') }}"
                        class="font-bold text-indigo-600 hover:text-indigo-800 transition">Daftar Admin</a></p>
            </div>
        </div>

        <p class="mt-8 text-center text-xs text-gray-400">
            &copy; 2026 Admin PresensiApp. Built for enterprise.
        </p>
    </div>

</body>

</html>