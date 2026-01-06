@extends('layouts.admin')

@section('content')

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ url('role') }}"
                class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition mb-2">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Roles
            </a>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Role</h1>
            <p class="text-slate-500 mt-1">Perbarui nama atau keterangan jabatan karyawan.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-lg bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ url('role/' . $role->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700">Role Name</label>
                    <input type="text" name="name" value="{{ old('name', $role->name ?? $role->role_name) }}"
                        placeholder="e.g. Lead Developer"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    @error('name')
                        <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex items-center justify-end space-x-3 border-t border-gray-100">
                    <a href="{{ url('role') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-2.5 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 transition shadow-lg shadow-indigo-100">
                        Update Role
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection