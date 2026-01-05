@extends('user.layouts')

@section('content')

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Informasi Gaji</h1>
        <p class="text-gray-500">
            Hai <b>{{ ucfirst(session('username')) }}</b>, berikut adalah rincian gaji Anda.
        </p>
        <small class="text-gray-400">{{ date('d F Y') }}</small>
    </div>

    <!-- Salary Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Gaji Bulan Ini</h2>
        @if($salary_now)
            <div class="text-3xl font-bold text-green-600">
                Rp. {{ number_format($salary_now->amount) }},-
            </div>
            <div class="text-sm text-gray-500 mt-1">
                Periode: {{ $salary_now->month }} {{ $salary_now->year }}
            </div>
        @else
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">
                            Belum ada data gaji untuk bulan ini.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- History Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-800">Riwayat Penggajian</h3>
        </div>

        @if($salary_month->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bulan
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($salary_month as $salary)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salary->month }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $salary->year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Rp.
                                    {{ number_format($salary->amount) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-6 text-center text-gray-500">
                Belum ada riwayat gaji.
            </div>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ url('user/home') }}"
            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

@endsection