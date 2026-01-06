@extends('layouts.admin')

@section('content')

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ url('concession') }}"
                class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition mb-2">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Concession
            </a>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Concession</h1>
            <p class="text-slate-500 mt-1">Perbarui status atau alasan izin karyawan.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ url('concession/' . $concession->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- User Selection -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Employee Name</label>
                        <select name="user_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $concession->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Reason Selection -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Reason / Category</label>
                        <select name="reason"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer">
                            <option value="sakit" {{ $concession->reason == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="izin" {{ $concession->reason == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="cuti" {{ $concession->reason == 'cuti' ? 'selected' : '' }}>Cuti</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Detailed Description</label>
                        <textarea name="description" rows="4" placeholder="Notes about this request..."
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">{{ $concession->description }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex items-center justify-end space-x-3 border-t border-gray-100">
                    <a href="{{ url('concession') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-2.5 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 transition shadow-lg shadow-indigo-100">
                        Update Concession
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection