@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="container mx-auto p-6">
        <nav class="text-sm text-gray-500 mb-2">
            <a href="#" class="hover:underline">Home</a> / <span>Produk</span>
        </nav>
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white p-6 rounded shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama Produk -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Name<span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="w-full p-2 border rounded" value="{{ $product->name }}" required>
                    </div>

                    <!-- Upload Gambar -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Gambar Produk</label>
                        <input type="file" name="image" class="w-full p-2 border rounded" accept="image/*">
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Harga <span class="text-red-500">*</span></label>
                        <input type="text" name="price" id="harga" class="w-full p-2 border rounded" value="Rp 100.000" required>
                        <input type="hidden" name="price" id="harga_hidden" value="{{ $product->price }}">
                    </div>

                    <!-- Stok -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Stok <span class="text-red-500">*</span></label>
                        <input type="number" name="stock" class="w-full p-2 border rounded" value="{{ $product->stock }}" required>
                    </div>
                </div>

                <div class="mt-6 text-right">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow-md hover:bg-blue-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputHarga = document.getElementById('harga');
            const hiddenHarga = document.getElementById('harga_hidden');

            inputHarga.addEventListener('input', () => {
                let raw = inputHarga.value.replace(/\D/g, '');
                if (raw) {
                    inputHarga.value = 'Rp ' + parseInt(raw).toLocaleString('id-ID');
                    hiddenHarga.value = parseInt(raw);
                } else {
                    inputHarga.value = '';
                    hiddenHarga.value = '';
                }
            });
        });
    </script>
@endsection
