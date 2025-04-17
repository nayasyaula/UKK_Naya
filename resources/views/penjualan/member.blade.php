@extends('layouts.app')

@section('title', 'Member')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Penjualan</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Data Member</h1>
        </div>

        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            {{-- Kiri: Card Produk --}}
            <div>
                <h2 class="text-lg font-semibold mb-3">Detail Produk yang Dibeli</h2>
                <div class="border rounded p-4 space-y-3 bg-white shadow">
                    <div class="flex justify-between border-b pb-2">
                        <div>
                            <p class="font-medium">Produk A</p>
                            <p class="text-sm text-gray-600">
                                Harga: Rp 10.000 <br>
                                Qty: 2
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold">Subtotal: Rp 20.000</p>
                        </div>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <div>
                            <p class="font-medium">Produk B</p>
                            <p class="text-sm text-gray-600">
                                Harga: Rp 15.000 <br>
                                Qty: 1
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold">Subtotal: Rp 15.000</p>
                        </div>
                    </div>
                    <div class="flex justify-between pt-3 text-lg font-bold">
                        <span>Total Harga</span>
                        <span>Rp 35.000</span>
                    </div>
                </div>
            </div>

            {{-- Kanan: Form Member --}}
            <div class="space-y-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block font-semibold mb-1">Nama Member</label>
                        <input type="text" name="nama" value="John Doe" readonly
                            class="border px-4 py-2 rounded w-full bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Nomor Telepon</label>
                        <input type="text" name="telp" value="081234567890" readonly
                            class="border px-4 py-2 rounded w-full bg-gray-100">
                    </div>
                </div>

                <input type="hidden" name="total_harga" value="35000">
                <input type="hidden" name="total_bayar" value="35000">

                <input type="hidden" name="orders[0][product_id]" value="1">
                <input type="hidden" name="orders[0][quantity]" value="2">
                <input type="hidden" name="orders[0][subtotal]" value="20000">

                <input type="hidden" name="orders[1][product_id]" value="2">
                <input type="hidden" name="orders[1][quantity]" value="1">
                <input type="hidden" name="orders[1][subtotal]" value="15000">

                {{-- Gunakan Point --}}
                <div>
                    <label class="block font-semibold mb-2">Gunakan Point?</label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="poin_dipakai" class="mr-2">
                        Gunakan 50 point
                    </label>
                </div>

                {{-- Tombol Submit --}}
                <div class="text-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                        Selesaikan Pembelian
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
