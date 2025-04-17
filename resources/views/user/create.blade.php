@extends('layouts.app')

@section('title', 'User')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">User</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
            <h1 class="text-2xl font-bold mb-4">Tambah User</h1>
        </div>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-6 rounded shadow-md">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold">Email <span class="text-red-500">*</span></label>
                        <input type="text" name="email" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Role <span class="text-red-500">*</span></label>
                        <select name="role" class="w-full p-2 border rounded" required>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold">Password <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="password" class="w-full p-2 border rounded" required>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow-md hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
