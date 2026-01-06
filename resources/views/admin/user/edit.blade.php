@extends('layouts.admin')

@section('content')

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ url('user') }}"
                class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition mb-2">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Back to Users
            </a>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit User</h1>
            <p class="text-slate-500 mt-1">Perbarui informasi data diri dan hak akses karyawan.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8">
            <form action="{{ url('user/' . $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="e.g. John Doe"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        @error('name')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            placeholder="e.g. 081234567890"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        @error('phone')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            placeholder="e.g. john@example.com"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        @error('email')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Position / Role</label>
                        <select name="role_id"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition bg-white cursor-pointer">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->name ?? $role->role_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2 space-y-1">
                        <label class="text-sm font-semibold text-gray-700">Home Address</label>
                        <textarea name="address" rows="3" placeholder="Jl. Raya No. 123..."
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="text-xs text-red-500 mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 flex items-center justify-end space-x-3 border-t border-gray-100">
                    <a href="{{ url('user') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-2.5 bg-indigo-600 rounded-xl text-sm font-bold text-white hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500/20 transition shadow-lg shadow-indigo-100">
                        Update User
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection