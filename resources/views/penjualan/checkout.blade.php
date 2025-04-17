@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container mx-auto px-6 py-6">
        <nav class="text-sm text-gray-500 mb-4">
            <a href="#" class="hover:underline">Home</a> / <span class="text-gray-700 font-medium">Penjualan</span>
        </nav>

        <form action="#" method="POST">
            @csrf
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/2 bg-white p-6 rounded shadow">
                    <h1 class="text-xl font-semibold text-gray-900 mb-4">Produk yang dipilih</h1>

                    <div class="flex justify-between items-center text-gray-800 mb-1">
                        <div class="text-sm font-medium">Nama Produk</div>
                        <div class="text-sm font-semibold">Rp. 0</div>
                    </div>
                    <div class="text-sm text-gray-500 mb-4">
                        Rp. 0 x 0
                    </div>

                    <input type="hidden" name="orders[0][product_id]" value="">
                    <input type="hidden" name="orders[0][quantity]" value="">
                    <input type="hidden" name="orders[0][subtotal]" value="">

                    <div class="flex justify-between items-center mt-6 border-t pt-4 text-gray-700 font-semibold text-lg">
                        <span>Total Harga</span>
                        <span>Rp. 0</span>
                    </div>

                    <input type="hidden" name="total_price" value="0">
                </div>

                <div class="md:w-1/2 bg-white p-6 rounded shadow space-y-4">
                    <div>
                        <label class="block font-semibold mb-2">Apakah Member? <span class="text-red-500">*</span></label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="is_member" value="1" required onclick="togglePhone(true)">
                                <span>Ya</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="is_member" value="0" onclick="togglePhone(false)">
                                <span>Bukan</span>
                            </label>
                        </div>
                    </div>

                    <div class="hidden" id="phone_field">
                        <label for="number_telephone" class="block font-semibold mb-1">Nomor Telepon Member <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="number_telephone" id="number_telephone"
                            class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    </div>

                    <div>
                        <label for="total_paid" class="block font-semibold mb-1">Total Bayar <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="total_paid" id="total_paid" required
                            class="w-full border px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-300"
                            oninput="formatRupiah(this); validatePayment();">
                        <p id="error-text" class="text-red-500 text-sm mt-1 hidden">Jumlah bayar kurang</p>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" id="submit-btn" disabled
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow transition opacity-50 cursor-not-allowed">
                            Lanjutkan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function togglePhone(isShown) {
            const phoneField = document.getElementById('phone_field');
            const input = document.getElementById('number_telephone');
            if (isShown) {
                phoneField.classList.remove('hidden');
                input.setAttribute('required', true);
            } else {
                phoneField.classList.add('hidden');
                input.removeAttribute('required');
            }
        }

        function formatRupiah(el) {
            let angka = el.value.replace(/[^,\d]/g, '');
            let split = angka.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            el.value = 'Rp ' + rupiah + (split[1] !== undefined ? ',' + split[1] : '');
        }

        const totalPrice = 0;
        const inputPaid = document.getElementById('total_paid');
        const errorText = document.getElementById('error-text');
        const submitBtn = document.getElementById('submit-btn');

        function unformatRupiah(value) {
            return parseInt(value.replace(/[^0-9]/g, ''), 10);
        }

        function validatePayment() {
            const paid = unformatRupiah(inputPaid.value);
            if (paid >= totalPrice) {
                errorText.classList.add('hidden');
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                errorText.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }
    </script>
@endsection
