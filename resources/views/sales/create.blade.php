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

        <form action="{{ route('sales.process.product') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($data as $produk)
                    <div class="border rounded-lg shadow p-4 flex flex-col items-center">
                        <img src="{{ $produk->image_url }}" alt="{{ $produk->name }}"
                            class="w-40 h-40 object-cover rounded-lg mb-4">
                        <h2 class="text-xl font-semibold mb-1">{{ $produk->name }}</h2>
                        <p class="text-gray-600 mb-1">Stock {{ $produk->stock }}</p>
                        <p class="mb-2 font-semibold text-gray-800">Rp. {{ number_format($produk->price, 0, ',', '.') }}</p>

                        <div class="flex items-center space-x-4">
                            <button type="button" class="px-3 py-1 bg-gray-200 rounded font-bold text-lg"
                                onclick="kurang('{{ $produk->id }}')">-</button>

                            <input type="number" id="jumlah_{{ $produk->id }}" name="jumlah[{{ $produk->id }}]"
                                value="0" min="0" max="{{ $produk->stock }}"
                                class="w-12 text-center border rounded" readonly>

                            <button type="button"
                                class="px-3 py-1 text-white font-bold text-lg rounded
                                {{ $produk->stock == 0 ? 'bg-gray-300 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-600' }}"
                                {{ $produk->stock == 0 ? 'disabled' : '' }}
                                onclick="tambah('{{ $produk->id }}', {{ $produk->stock }})">
                                +
                            </button>
                        </div>

                        <p class="mt-4 text-sm text-gray-700">Sub Total <strong>Rp. <span
                                    id="subtotal_{{ $produk->id }}"></span></strong></p>
                    </div>
                @endforeach
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
        function tambah(id, stock) {
            let input = document.getElementById('jumlah_' + id);
            let val = parseInt(input.value);
            if (val < stock) {
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
            let input = document.getElementById('jumlah_' + id);
            let harga = @json($data->pluck('price', 'id'));
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
