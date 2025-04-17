<aside class="w-64 bg-white shadow-lg p-5">
    <div class="flex items-center gap-2 mb-3">
        <img src="{{ asset('image/cash.png') }}" alt="Cash Logo" class="w-12 h-12">
        <h1 class="text-2xl font-bold text-blue-600">Cashly</h1>
    </div>
    <nav class="mt-5">
        <ul>
            <li class="mb-2">
                <a href="#"
                    class="flex items-center p-3 rounded-lg
                    {{ request()->routeIs('dashboard.admin') || request()->routeIs('dashboard.petugas') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    <i class="fi fi-rr-home mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('product.index') }}"
                    class="flex items-center p-3 rounded-lg
                   {{ request()->routeIs('produk.index') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    <i class="fi fi-rr-box mr-3"></i>
                    Produk
                </a>
            </li>
            <li class="mb-2">
                <a href="#"
                    class="flex items-center p-3 rounded-lg
                   {{ request()->routeIs('penjualan.index') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    <i class="fi fi-rr-shopping-cart mr-3"></i>
                    Pembelian
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('user.index') }}"
                    class="flex items-center p-3 rounded-lg
           {{ request()->routeIs('user.index') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    <i class="fi fi-rr-user mr-3"></i>
                    User
                </a>
            </li>
        </ul>
    </nav>
</aside>
