@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Penjualan</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Pilih Produk</h1>
        </div>

        <form action="#" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="border rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="https://via.placeholder.com/150" alt="Produk"
                        class="w-40 h-40 object-cover rounded-lg mb-4">
                    <h2 class="text-xl font-semibold mb-1">Nama Produk</h2>
                    <p class="text-gray-600 mb-1">Stok 0</p>
                    <p class="mb-2 font-semibold text-gray-800">Rp. 0</p>

                    <div class="flex items-center space-x-4">
                        <button type="button" class="px-3 py-1 bg-gray-200 rounded font-bold text-lg"
                            onclick="kurang('1')">-</button>

                        <input type="number" id="jumlah_1" name="jumlah[1]"
                            value="0" min="0" max="0"
                            class="w-12 text-center border rounded" readonly>

                        <button type="button"
                            class="px-3 py-1 text-white font-bold text-lg rounded bg-gray-300 cursor-not-allowed"
                            disabled
                            onclick="tambah('1', 0)">
                            +
                        </button>
                    </div>

                    <p class="mt-4 text-sm text-gray-700">Sub Total <strong>Rp. <span
                                id="subtotal_1">0</span></strong></p>
                </div>
            </div>

            <div class="text-right mt-6">
                <button type="submit" onclick="cekProdukDipilih()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Selanjutnya
                </button>
            </div>
        </form>
    </div>

    <script>
        function tambah(id, stok) {
            let input = document.getElementById('jumlah_' + id);
            let val = parseInt(input.value);
            if (val < stok) {
                input.value = val + 1;
                hitungSubtotal(id);
            }
        }

        function kurang(id) {
            let input = document.getElementById('jumlah_' + id);
            let val = parseInt(input.value);
            if (val > 0) {
                input.value = val - 1;
                hitungSubtotal(id);
            }
        }

        function hitungSubtotal(id) {
            // Harga statis sementara
            const harga = {
                1: 0
            };
            let input = document.getElementById('jumlah_' + id);
            let subtotal = document.getElementById('subtotal_' + id);
            let jumlah = parseInt(input.value);
            subtotal.innerText = (jumlah * harga[id]).toLocaleString('id-ID');
        }

        function cekProdukDipilih() {
            const inputs = document.querySelectorAll('input[name^="jumlah"]');
            let total = 0;

            inputs.forEach(input => {
                total += parseInt(input.value);
            });

            if (total === 0) {
                alert('Silakan pilih minimal 1 produk terlebih dahulu.');
            } else {
                document.querySelector('form').submit();
            }
        }
    </script>
@endsection
