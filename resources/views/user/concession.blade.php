@extends('user.layouts')

@section('content')

    <!-- Header -->
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800">Form Pengajuan Izin</h1>
        <small class="text-gray-400">{{ date('d F Y') }}</small>
    </div>

    <!-- Form Card -->
    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ url('user/concession') }}" method="POST" class="space-y-6">
            @CSRF

            <!-- Reason Input -->
            <div>
                <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Alasan Tidak Hadir</label>
                <select id="reason" name="reason"
                    class="block w-full px-4 py-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition">
                    <option value="cuti">Cuti</option>
                    <option value="sakit">Sakit</option>
                    <option value="izin">Izin</option>
                </select>
            </div>

            <!-- Description Input -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Keterangan Lengkap</label>
                <textarea id="description" name="description" rows="4"
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"
                    placeholder="Contoh: Saya sedang tidak enak badan dan butuh istirahat..."></textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition transform hover:-translate-y-0.5">
                    Kirim Pengajuan
                </button>
            </div>
        </form>
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

@endsection