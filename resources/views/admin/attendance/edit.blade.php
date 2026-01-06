@extends('layouts.admin')

@section('content')

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ url('attendance') }}"
                class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition mb-2">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Attendance
            </a>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Attendance</h1>
            <p class="text-slate-500 mt-1">Perbarui catatan kehadiran karyawan secara manual.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ url('attendance/' . $attendance->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- User Selection -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Select Employee</label>
                        <select name="user_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $attendance->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Present At -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Presence Date</label>
                        <div class="relative">
                            <input type="date" name="present_at"
                                value="{{ date('Y-m-d', strtotime($attendance->present_at)) }}"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>
                        @error('present_at')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Description / Note</label>
                        <textarea name="description" rows="3" placeholder="Notes about this attendance..."
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">{{ $attendance->description }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex items-center justify-end space-x-3 border-t border-gray-100">
                    <a href="{{ url('attendance') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-2.5 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 transition shadow-lg shadow-indigo-100">
                        Update Record
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection