@extends('user.layouts')

@section('content')

    <!-- Header Section -->
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">User Guide & Documentation</h1>
        <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">Pelajari cara menggunakan sistem presensi online
            PresensiApp dengan mudah dan cepat.</p>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">

        <!-- Tutorial Cards -->
        <div class="lg:col-span-2 space-y-8">

            <!-- Step 1 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex items-start space-x-6">
                <div
                    class="h-12 w-12 rounded-2xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xl shrink-0">
                    1</div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Melakukan Presensi QR</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Buka menu "Scan QR" di dashboard. Izinkan aplikasi mengakses kamera Anda, lalu arahkan kamera ke
                        kode QR yang tersedia di kantor. Sistem akan otomatis mencatat lokasi dan waktu kedatangan Anda.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex items-start space-x-6">
                <div
                    class="h-12 w-12 rounded-2xl bg-emerald-600 flex items-center justify-center text-white font-bold text-xl shrink-0">
                    2</div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mengajukan Izin / Sakit</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Jika Anda berhalangan hadir, gunakan menu "Pengajuan Izin". Pilih alasan (Sakit/Izin/Cuti) dan
                        berikan deskripsi singkat. Tim HRD akan meninjau pengajuan Anda segera.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex items-start space-x-6">
                <div
                    class="h-12 w-12 rounded-2xl bg-amber-500 flex items-center justify-center text-white font-bold text-xl shrink-0">
                    3</div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mengecek Slip Gaji</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Anda dapat melihat rincian gaji bulanan melalui menu "Informasi Gaji". Semua rincian akan tertera
                        secara transparan sesuai dengan data yang diinput oleh Administrator.
                    </p>
                </div>
            </div>

        </div>

        <!-- Sidebar / FAQ -->
        <div class="space-y-6">
            <div class="bg-slate-900 rounded-2xl p-6 text-white overflow-hidden relative">
                <div class="relative z-10">
                    <h4 class="font-bold text-xl mb-4">Butuh Bantuan?</h4>
                    <p class="text-slate-400 text-sm mb-6">Hubungi administrator sistem jika Anda mengalami kendala saat
                        login atau presensi.</p>
                    <a href="mailto:support@presensiapp.com"
                        class="inline-block w-full py-3 bg-white text-slate-900 rounded-xl font-bold text-center hover:bg-slate-100 transition">
                        Hubungi Support
                    </a>
                </div>
                <!-- Decorative circle -->
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-indigo-500 rounded-full opacity-20"></div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <h4 class="font-bold text-gray-900 mb-4 tracking-tight">Pertanyaan Populer</h4>
                <div class="space-y-4">
                    <details class="group border-b border-gray-100 pb-4">
                        <summary
                            class="list-none flex items-center justify-between cursor-pointer font-semibold text-sm text-gray-700">
                            Kenapa kamera QR tidak muncul?
                            <svg class="h-4 w-4 transition group-open:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <p class="mt-2 text-xs text-gray-500 leading-relaxed">Pastikan Anda telah memberikan izin
                            (Permission) pada browser untuk mengakses kamera.</p>
                    </details>
                    <details class="group border-b border-gray-100 pb-4">
                        <summary
                            class="list-none flex items-center justify-between cursor-pointer font-semibold text-sm text-gray-700">
                            Bagaimana jika saya lupa password?
                            <svg class="h-4 w-4 transition group-open:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <p class="mt-2 text-xs text-gray-500 leading-relaxed">Gunakan fitur login GitHub atau hubungi admin
                            untuk melakukan reset password akun Anda.</p>
                    </details>
                </div>
            </div>
        </div>

    </div>

@endsection