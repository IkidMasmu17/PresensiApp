@extends('layouts.admin')

@section('content')

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ url('salary') }}"
                class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition mb-2">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Salary
            </a>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Salary Record</h1>
            <p class="text-slate-500 mt-1">Sesuaikan rincian gaji karyawan untuk periode tertentu.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ url('salary/' . $salary->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <!-- User Selection -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">For Employee</label>
                        <select name="user_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $salary->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Month Selection -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Payment Month</label>
                        <select name="month"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer text-capitalize">
                            @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                <option value="{{ $month }}" {{ $salary->month == $month ? 'selected' : '' }}>{{ $month }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Year Selection -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Payment Year</label>
                        <select name="year"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer">
                            @for($year = (int) date('Y'); 1900 <= $year; $year--)
                                <option value="{{ $year }}" {{ $salary->year == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Salary Amount (IDR)</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none group-focus-within:text-indigo-600 transition">
                                <span class="text-gray-500 font-bold">Rp</span>
                            </div>
                            <input type="number" name="amount" value="{{ $salary->amount }}" placeholder="0"
                                class="w-full pl-12 pr-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition font-bold text-gray-900">
                        </div>
                        @error('amount')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-8 flex items-center justify-end space-x-3 border-t border-gray-100">
                    <a href="{{ url('salary') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-10 py-2.5 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 transition shadow-lg shadow-indigo-100">
                        Update Salary Record
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection