@extends('layouts.app')

@section('title', 'User')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">User</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">User</h1>
            <a href="{{ route('user.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium shadow transition">
                Tambah User
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full table-auto text-sm text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $item)
                        <tr>
                            <td class="px-6 py-3 text-left">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 text-left">{{ $item->email }}</td>
                            <td class="px-6 py-3 text-left">{{ $item->name }}</td>
                            <td class="px-6 py-3 text-left">{{ $item->role }}</td>
                            <td class="px-6 py-3 text-center">
                                <a href="{{ route('user.edit', $item->id) }}"
                                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium shadow transition">Edit</a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="inline-block" //
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" //
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-md text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
