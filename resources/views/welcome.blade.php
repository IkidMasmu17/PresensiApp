<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi Online - Sekolah Modern</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-20 top-0 left-0 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    <span class="font-bold text-xl tracking-tight text-gray-900">Absensi Online</span>
                </div>

                <!-- Menu (Desktop) -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Tentang</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Fitur</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition">Kontak</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-700 hover:text-blue-600 font-medium px-4 py-2">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-full shadow-lg transition transform hover:scale-105">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-gradient-to-br from-blue-50 to-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center">

            <!-- Text Content -->
            <div class="lg:w-1/2 text-center lg:text-left mt-12 lg:mt-0 z-10">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    Kelola Kehadiran <br>
                    <span class="text-blue-600">Lebih Mudah & Modern</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-lg mx-auto lg:mx-0">
                    Sistem absensi digital untuk sekolah masa kini. Pantau kehadiran siswa dan guru secara realtime,
                    akurat, dan transparan.
                </p>
                <div class="flex justify-center lg:justify-start gap-4">
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-blue-700 transition transform hover:-translate-y-1">Mulai
                        Sekarang</a>
                    <a href="#features"
                        class="bg-white text-gray-700 font-bold py-3 px-8 rounded-full shadow border border-gray-200 hover:bg-gray-50 transition">Pelajari
                        Lebih Lanjut</a>
                </div>
            </div>

            <!-- Illustration/Image -->
            <div class="lg:w-1/2 w-full flex justify-center relative">
                <!-- Decorative Blobs -->
                <div
                    class="absolute top-0 right-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-2000">
                </div>

                <!-- Main Image/Icon (SVG for now) -->
                <svg class="w-full max-w-md h-auto drop-shadow-2xl relative z-10" viewBox="0 0 400 300" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect x="50" y="50" width="300" height="200" rx="20" fill="white" stroke="#E2E8F0"
                        stroke-width="4" />
                    <rect x="50" y="50" width="300" height="40" rx="20" fill="#3B82F6" />
                    <circle cx="90" cy="70" r="5" fill="white" opacity="0.5" />
                    <circle cx="70" cy="70" r="5" fill="white" opacity="0.5" />
                    <rect x="80" y="120" width="140" height="15" rx="4" fill="#E2E8F0" />
                    <rect x="80" y="150" width="100" height="15" rx="4" fill="#E2E8F0" />
                    <rect x="250" y="120" width="60" height="60" rx="10" fill="#DBEAFE" />
                    <path d="M265 150L275 160L295 140" stroke="#2563EB" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Fitur Unggulan</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Semua yang Anda Butuhkan
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Optimalkan manajemen administrasi sekolah dengan fitur lengkap kami.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Real-time Data</h3>
                    <p class="text-gray-600">Data kehadiran siswa dan guru tersimpan langsung ke server saat itu juga.
                        Tanpa delay.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Akses Multi-Device</h3>
                    <p class="text-gray-600">Akses sistem dari smartphone, tablet, atau komputer. Fleksibel untuk guru
                        di kelas.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8 hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Laporan Otomatis</h3>
                    <p class="text-gray-600">Generate laporan kehadiran bulanan atau semester dalam format PDF hanya
                        dengan sekali klik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h4 class="text-2xl font-bold mb-4">Absensi Online</h4>
                    <p class="text-gray-400 max-w-sm">
                        Membangun ekosistem pendidikan digital yang lebih efisien dan transparan untuk masa depan
                        Indonesia.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Link Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Bantuan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-400"><svg class="w-4 h-4 mr-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg> support@sekolah.id</li>
                        <li class="flex items-center text-gray-400"><svg class="w-4 h-4 mr-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg> (021) 1234-5678</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
                &copy; {{ date('Y') }} Absensi Online. All rights reserved.
            </div>
        </div>
    </footer>

    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }

        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</body>

</html>