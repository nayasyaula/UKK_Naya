@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Produk</span>
        </nav>

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-3">
            <h1 class="text-3xl font-bold text-gray-800">Produk</h1>
            <a href="{{ route('product.create') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">Tambah Produk
            </a>
            @auth
                @if (Auth::user()->role === 'admin')
                @endif
            @endauth
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-300 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-xl overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-gray-700">#</th>
                        <th class="px-6 py-4 text-gray-700"></th>
                        <th class="px-6 py-4 text-gray-700">Name</th>
                        <th class="px-6 py-4 text-gray-700">Price</th>
                        <th class="px-6 py-4 text-center text-gray-700">Stock</th>
                        <th class="px-6 py-4 text-center text-gray-700"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $index => $produk)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ $produk->image_url }}" alt="{{ $produk->name }}"
                                    class="w-full h-auto max-w-[100px] object-cover rounded shadow">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $produk->name }}</td>
                            <td class="px-6 py-4 text-gray-700">Rp{{ number_format($produk->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-center text-gray-700">{{ $produk->stock }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center flex-wrap gap-2">
                                    <a href="{{ route('product.edit', $produk->id) }}"
                                        class="bg-yellow-400 text-white px-4 py-1.5 rounded-md hover:bg-yellow-500 transition text-sm">
                                        Edit
                                    </a>
                                    <button
                                        onclick="openModal({{ $produk->id }}, '{{ $produk->name }}', {{ $produk->stock }})"
                                        class="bg-blue-500 text-white px-4 py-1.5 rounded-md hover:bg-blue-600 transition text-sm">
                                        Update Stok
                                    </button>
                                    <form action="{{ route('product.destroy', $produk->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-1.5 rounded-md hover:bg-red-600 transition text-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalUpdateStok"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 hidden z-50 transition">
        <div id="modalContent"
            class="bg-white w-full max-w-md rounded-xl shadow-xl transform scale-95 opacity-0 transition-all duration-200">
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800">Update Stok Produk</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>
            <form id="updateStokForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" id="produkNama" class="w-full p-3 border rounded bg-gray-100 text-gray-800"
                        readonly>

                    <label class="block text-sm font-medium text-gray-700 mt-4 mb-1">Stok</label>
                    <input type="number" name="stock" id="produkStok" class="w-full p-3 border rounded" required>
                </div>
                <div class="flex justify-end px-6 py-4 border-t">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 ml-2">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, name, stock) {
            document.getElementById("produkNama").value = name;
            document.getElementById("produkStok").value = stock;
            document.getElementById("updateStokForm").action = "/product/" + id + "/stock" ;

            const modal = document.getElementById("modalUpdateStok");
            const modalContent = document.getElementById("modalContent");
            modal.classList.remove("hidden");
            setTimeout(() => {
                modal.classList.add("opacity-100");
                modalContent.classList.remove("scale-95", "opacity-0");
                modalContent.classList.add("scale-100", "opacity-100");
            }, 50);
        }

        function closeModal() {
            const modal = document.getElementById("modalUpdateStok");
            const modalContent = document.getElementById("modalContent");
            modalContent.classList.remove("scale-100", "opacity-100");
            modalContent.classList.add("scale-95", "opacity-0");
            setTimeout(() => {
                modal.classList.remove("opacity-100");
                modal.classList.add("hidden");
            }, 200);
        }
    </script>
@endsection
