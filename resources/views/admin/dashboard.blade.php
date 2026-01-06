@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 space-y-4 md:space-y-0">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Overview</h1>
            <p class="text-slate-500 mt-1">Selamat datang di panel kendali utama PresensiApp.</p>
        </div>
        <div class="flex space-x-3">
            <button
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                <svg class="h-4 w-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Generate Report
            </button>
            <button
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Create Task
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- Users Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center transition hover:shadow-md">
            <div class="p-4 bg-blue-50 rounded-xl text-blue-600">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div class="ml-5">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Users</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $users }}</h3>
            </div>
        </div>

        <!-- Concessions Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center transition hover:shadow-md">
            <div class="p-4 bg-amber-50 rounded-xl text-amber-600">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </div>
            <div class="ml-5">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Concessions</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $concessions }}</h3>
            </div>
        </div>

        <!-- Attendance Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center transition hover:shadow-md">
            <div class="p-4 bg-emerald-50 rounded-xl text-emerald-600">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-5">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Attendances</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $attendances }}</h3>
            </div>
        </div>

        <!-- Roles Card -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center transition hover:shadow-md">
            <div class="p-4 bg-indigo-50 rounded-xl text-indigo-600">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09m8.19.828c.196.12.398.228.605.322m.967-1.127c.322.067.643.125.967.173m-10.14-1.24a5.5 5.5 0 1110.14 0M12 7v4" />
                </svg>
            </div>
            <div class="ml-5">
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Roles</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $roles }}</h3>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

        <!-- Attendance Trend Chart -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-bold text-slate-800">Attendance Trends</h4>
                <div class="flex space-x-1">
                    <span class="w-3 h-3 bg-indigo-500 rounded-full"></span>
                    <span class="w-3 h-3 bg-indigo-200 rounded-full"></span>
                </div>
            </div>
            <div class="p-6">
                <canvas id="attendanceTrendChart" height="280"></canvas>
            </div>
        </div>

        <!-- Distribution Pie Chart -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-bold text-slate-800">User Roles</h4>
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="p-6 flex flex-col items-center">
                <div class="w-full max-w-[220px]">
                    <canvas id="roleDistributionChart"></canvas>
                </div>
                <div class="mt-8 w-full space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center text-gray-500"><span
                                class="w-3 h-3 bg-indigo-500 rounded-full mr-2"></span> Admin</span>
                        <span class="font-bold text-gray-900">10%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center text-gray-500"><span
                                class="w-3 h-3 bg-emerald-500 rounded-full mr-2"></span> Staff</span>
                        <span class="font-bold text-gray-900">75%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center text-gray-500"><span
                                class="w-3 h-3 bg-amber-400 rounded-full mr-2"></span> Guest</span>
                        <span class="font-bold text-gray-900">15%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Content Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100">
                <h4 class="font-bold text-slate-800">Recent Attendance</h4>
            </div>
            <div class="p-0">
                <ul class="divide-y divide-gray-100">
                    <li class="px-6 py-4 flex items-center hover:bg-gray-50 transition">
                        <div
                            class="h-10 w-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold shrink-0">
                            JD</div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-900">John Doe <span
                                    class="text-xs font-normal text-gray-400">marked as</span> <span
                                    class="text-emerald-600 font-bold">Present</span></p>
                            <p class="text-xs text-gray-500">2 minutes ago • Office HQ</p>
                        </div>
                    </li>
                    <li class="px-6 py-4 flex items-center hover:bg-gray-50 transition">
                        <div
                            class="h-10 w-10 rounded-full bg-amber-50 flex items-center justify-center text-amber-600 font-bold shrink-0">
                            AS</div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-900">Alice Smith <span
                                    class="text-xs font-normal text-gray-400">requested</span> <span
                                    class="text-amber-600 font-bold">Concession</span></p>
                            <p class="text-xs text-gray-500">15 minutes ago • Mobile App</p>
                        </div>
                    </li>
                    <li class="px-6 py-4 flex items-center hover:bg-gray-50 transition">
                        <div
                            class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 font-bold shrink-0">
                            BK</div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-900">Bob Knight <span
                                    class="text-xs font-normal text-gray-400">marked as</span> <span
                                    class="text-emerald-600 font-bold">Present</span></p>
                            <p class="text-xs text-gray-500">1 hour ago • QR Scan</p>
                        </div>
                    </li>
                </ul>
                <div class="px-6 py-4 bg-gray-50 text-center">
                    <a href="{{ url('attendance') }}"
                        class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition">View All Activity
                        &rarr;</a>
                </div>
            </div>
        </div>

        <!-- System Status -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col items-center justify-center text-center">
            <div class="p-5 bg-indigo-600 rounded-3xl shadow-lg shadow-indigo-200 mb-6">
                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900">System High Perfomance</h3>
            <p class="text-gray-500 mt-2 max-w-xs">Aplikasi Anda berjalan dengan optimal. Semua sensor dan integrasi QR
                aktif.</p>
            <div class="mt-8 flex space-x-2">
                <span class="flex h-3 w-3 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Active Server</span>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        // Attendance Trend Chart
        const ctxTrend = document.getElementById('attendanceTrendChart').getContext('2d');
        new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Presence',
                    data: [65, 59, 80, 81, 56, 40, 30],
                    fill: true,
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderColor: 'rgb(99, 102, 241)',
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: 'rgb(99, 102, 241)',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, border: { display: false } },
                    x: { grid: { display: false }, border: { display: false } }
                }
            }
        });

        // Role Distribution Chart
        const ctxRole = document.getElementById('roleDistributionChart').getContext('2d');
        new Chart(ctxRole, {
            type: 'doughnut',
            data: {
                labels: ['Admin', 'Staff', 'Guest'],
                datasets: [{
                    data: [10, 75, 15],
                    backgroundColor: ['#6366f1', '#10b981', '#fbbf24'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
@endpush