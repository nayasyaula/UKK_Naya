@extends('layouts.app')

@section('title', 'Struk')

@section('content')
<div class="px-6 py-6">
    <!-- Header & Breadcrumb -->
    <div class="text-sm text-gray-500 flex items-center space-x-2 mb-4">
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Pembayaran</span>
    </div>

    <h1 class="text-3xl font-bold text-gray-900 mb-6">Pembayaran</h1>

    <!-- Buttons -->
    <div class="mb-4 flex space-x-2">
        <a href="{{ route('sale.pdf', $penjualan->id) }}" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded font-medium">Unduh</a>
        <a href="{{ route('sales.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded font-medium">Kembali</a>
    </div>

    <!-- Invoice Container -->
    <div class="bg-white rounded-lg shadow p-6">
        <!-- Info Section -->
        <div class=" text-sm text-gray-600 mb-4  text-right">
            <div>
                <p><strong>Invoice -</strong> #{{ $penjualan->id }}</p>
                <p>{{ $penjualan->created_at->format('d F Y') }}</p>
            </div>
        </div>

        <!-- Product Table -->
        <div class="overflow-x-auto border-t border-b py-4 my-4">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="text-left">
                    <tr class="border-b">
                        <th class="py-2">Product</th>
                        <th class="py-2 text-right">Harga</th>
                        <th class="py-2 text-center">Quantity</th>
                        <th class="py-2 text-right">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan->detailPenjualans as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2">{{ $item->product->name }}</td>
                        <td class="py-2 text-right">Rp {{ number_format($item->price_pcs, 0, ',', '.') }}</td>
                        <td class="py-2 text-center">{{ $item->qty }}</td>
                        <td class="py-2 text-right">Rp {{ number_format($item->sub_total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer Info -->
        <div class="grid grid-cols-4 bg-gray-100 rounded text-sm text-gray-600 mt-6">
            <div class="p-3">
                <p class="text-xs uppercase text-gray-400">Poin Digunakan</p>
                <p class="text-xl font-bold">{{ $penjualan->poin_used ?? 0 }}</p>
            </div>
            <div class="p-3">
                <p class="text-xs uppercase text-gray-400">Kasir</p>
                <p class="text-xl font-bold">{{ auth()->user()->name }}</p>
            </div>
            <div class="p-3">
                <p class="text-xs uppercase text-gray-400">Total Bayar</p>
                <p class="text-xl font-bold">Rp {{ number_format($penjualan->total_pay, 0, ',', '.') }}</p>
            </div>
            <div class="p-3">
                <p class="text-xs uppercase text-gray-400">Kembalian</p>
                <p class="text-xl font-bold">Rp {{ number_format($penjualan->amount, 0, ',', '.') }}</p>
            </div>
            <div class="bg-gray-800 text-white p-4 flex flex-col justify-center items-end rounded-r">
                <p class="text-xs uppercase">Total</p>
                <p class="text-2xl font-bold">Rp {{ number_format($penjualan->total_price, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
