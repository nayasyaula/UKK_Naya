@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Penjualan</span>
        </nav>

        <!-- Header & Add Button -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
            <h1 class="text-3xl font-bold text-gray-800">Data Penjualan</h1>
            <a href="#" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                Tambah Penjualan
            </a>
        </div>

        <!-- Export Button -->
        <div class="mb-4">
            <a href="#" onclick="showExportAlert(); return false;"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
                Export Penjualan (.xlsx)
            </a>
        </div>

        <!-- Filter & Search -->
        <form method="GET" action="#" class="mb-4 flex flex-col sm:flex-row sm:justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="text-sm">Tampilkan</span>
                <select name="entries" class="border rounded px-2 py-1 text-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-sm">entri</span>
            </div>

            <div class="flex items-center gap-2">
                <label for="search" class="text-sm">Cari:</label>
                <input type="text" name="search" id="search" class="border rounded px-2 py-1 text-sm">
            </div>
        </form>

        <!-- Tabel Penjualan -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-200 text-sm text-gray-700">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Nama Pelanggan</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Total Harga</th>
                        <th class="px-6 py-3">Dibuat Oleh</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">2025-04-16</td>
                        <td class="px-6 py-4">Rp. 250.000</td>
                        <td class="px-6 py-4">Admin</td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button onclick="openModal('modal-1')"
                                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-xs">
                                Lihat
                            </button>
                            <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-xs">
                                Unduh Bukti
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-6 py-4">
                <span class="text-sm text-gray-600">Menampilkan 1 dari 1 data</span>
            </div>
        </div>

        <!-- Modal Detail Penjualan -->
        <div id="modal-1" class="fixed inset-0 z-50 flex items-center justify-center hidden">
            <div class="fixed inset-0 bg-black bg-opacity-50" onclick="closeModal('modal-1')"></div>

            <div class="bg-white w-full max-w-xl mx-4 p-6 rounded-md shadow-lg relative">
                <button onclick="closeModal('modal-1')"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl font-bold">&times;</button>

                <h2 class="text-lg font-semibold mb-4">Detail Penjualan</h2>
                <hr class="mb-4">

                <div class="flex justify-between text-sm text-gray-700 mb-4">
                    <div>
                        <p><strong>Member Status:</strong> Member</p>
                        <p><strong>No. HP:</strong> 08123456789</p>
                        <p><strong>Poin Member:</strong> 20</p>
                    </div>
                    <div class="text-right">
                        <p><strong>Bergabung Sejak:</strong> 01 Januari 2024</p>
                    </div>
                </div>

                <table class="w-full text-sm text-gray-700 mb-4">
                    <thead class="border-b font-semibold">
                        <tr>
                            <th class="py-2 text-left">Nama Produk</th>
                            <th class="py-2 text-center">Qty</th>
                            <th class="py-2 text-right">Harga</th>
                            <th class="py-2 text-right">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2">Produk A</td>
                            <td class="py-2 text-center">2</td>
                            <td class="py-2 text-right">Rp. 100.000</td>
                            <td class="py-2 text-right">Rp. 200.000</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">Produk B</td>
                            <td class="py-2 text-center">1</td>
                            <td class="py-2 text-right">Rp. 50.000</td>
                            <td class="py-2 text-right">Rp. 50.000</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-right font-semibold text-base mb-2">
                    Total: Rp. 250.000
                </div>

                <div class="text-xs text-gray-500 text-center mb-4">
                    <p>Dibuat pada : 2025-04-16 10:30:00</p>
                    <p>Oleh : Admin</p>
                </div>

                <div class="text-right">
                    <button onclick="closeModal('modal-1')"
                        class="px-4 py-1 bg-gray-600 text-white text-sm rounded hover:bg-gray-700">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function showExportAlert() {
            alert("Anda tidak memiliki akses.");
        }
    </script>
@endsection
