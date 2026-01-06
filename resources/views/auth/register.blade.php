<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - PresensiApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[f8fafc] flex items-center justify-center min-h-screen p-4 py-12">

    <div class="w-full max-w-lg">
        <!-- Logo / Brand -->
        <div class="text-center mb-10">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-xl shadow-indigo-100 mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09m8.19.828c.196.12.398.228.605.322m.967-1.127c.322.067.643.125.967.173m-10.14-1.24a5.5 5.5 0 1110.14 0M12 7v4" />
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Create Admin Account</h1>
            <p class="text-slate-500 mt-2">Daftarkan diri Anda untuk mengelola sistem presensi.</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-12">

                <form action="{{ url('register') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest pl-1">Nama
                                Lengkap</label>
                            <input type="text" name="name" required value="{{ old('name') }}" placeholder="John Doe"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition outline-none">
                            @error('name') <p
                                class="text-[10px] text-red-500 mt-1 font-bold italic uppercase tracking-tighter">
                            {{ $message }}</p> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest pl-1">Nomor
                                HP</label>
                            <input type="text" name="phone" required value="{{ old('phone') }}" placeholder="0812..."
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition outline-none">
                            @error('phone') <p
                                class="text-[10px] text-red-500 mt-1 font-bold italic uppercase tracking-tighter">
                            {{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest pl-1">Alamat
                                Email</label>
                            <input type="email" name="email" required value="{{ old('email') }}"
                                placeholder="admin@example.com"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition outline-none">
                            @error('email') <p
                                class="text-[10px] text-red-500 mt-1 font-bold italic uppercase tracking-tighter">
                            {{ $message }}</p> @enderror
                        </div>

                        <!-- Password -->
                        <div class="space-y-1">
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase tracking-widest pl-1">Password</label>
                            <input type="password" name="password" required placeholder="••••••••"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition outline-none">
                            @error('password') <p
                                class="text-[10px] text-red-500 mt-1 font-bold italic uppercase tracking-tighter">
                            {{ $message }}</p> @enderror
                        </div>

                        <!-- Repeat Password -->
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest pl-1">Ulangi
                                Password</label>
                            <input type="password" name="repeat_password" required placeholder="••••••••"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition outline-none">
                            @error('repeat_password') <p
                                class="text-[10px] text-red-500 mt-1 font-bold italic uppercase tracking-tighter">
                            {{ $message }}</p> @enderror
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest pl-1">Alamat
                                Domisili</label>
                            <textarea name="address" required rows="3" placeholder="Jl. Raya No. 123..."
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition outline-none">{{ old('address') }}</textarea>
                            @error('address') <p
                                class="text-[10px] text-red-500 mt-1 font-bold italic uppercase tracking-tighter">
                            {{ $message }}</p> @enderror
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 active:scale-[0.98] transition">
                        Daftar sebagai Administrator
                    </button>

                </form>
            </div>
            <div class="px-8 py-5 bg-gray-50/50 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500 font-medium">Sudah punya akun? <a href="{{ url('admin') }}"
                        class="font-bold text-indigo-600 hover:text-indigo-800 transition">Masuk di sini</a></p>
            </div>
        </div>
    </div>

</body>

</html>