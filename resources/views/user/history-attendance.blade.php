@extends('user.layouts')

@section('content')

    <!-- Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Riwayat Kehadiran</h1>
            <p class="text-gray-500">7 Aktivitas Terakhir</p>
        </div>
        <div class="text-sm text-gray-400">
            {{ date('d F Y') }}
        </div>
    </div>

    <!-- History Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($histories as $history)
                        <!-- Determine Status Logic -->
                        @php
                            $isConcession = in_array($history->present_at, ['cuti', 'sakit', 'izin']);
                            $status = $isConcession ? ucfirst($history->present_at) : 'Hadir';
                            $date = \Carbon\Carbon::parse($history->created_at);

                            // Icon & Color Logic
                            if ($isConcession) {
                                $badgeColor = 'bg-yellow-100 text-yellow-800';
                                $icon = '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                            } else {
                                $badgeColor = 'bg-green-100 text-green-800';
                                $icon = '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                            }
                        @endphp

                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeColor }}">
                                    {!! $icon !!}
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $date->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $date->format('H:i') }} WIB
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $history->description ?? '-' }}
                            </td>
                        </tr>
                    @endforeach

                    @if(count($histories) == 0)
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                                Belum ada riwayat aktivitas.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
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

@endsection