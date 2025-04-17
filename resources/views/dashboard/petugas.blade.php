@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Penjualan</span>
        </nav>

        <div >
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Dashboard</h1>
            <p class="text-lg text-gray-600">Selamat Datang, Petugas!</p>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-8">

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 text-center shadow-inner">
                <div class="text-gray-600 text-sm font-medium mb-2">Total Penjualan Hari Ini</div>
                <div class="text-5xl font-extrabold text-blue-600 mb-2">1</div>
                <p class="text-gray-500 text-sm">Jumlah total penjualan yang terjadi hari ini.</p>
            </div>

            <div class="text-right text-gray-400 text-xs mt-6">
                Terakhir diperbarui: 12 April 2025
            </div>
        </div>
    </div>
@endsection
