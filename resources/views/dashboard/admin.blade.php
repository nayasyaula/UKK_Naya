@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Dashboard</span>
        </nav>

        <div >
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Dashboard</h1>
            <p class="text-lg text-gray-600">Selamat Datang, Administrator!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Jumlah Penjualan per Hari</h3>
                <div id="container" class="w-full h-80"></div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Persentase Penjualan Produk</h3>
                <div id="con" class="w-full h-80"></div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection
