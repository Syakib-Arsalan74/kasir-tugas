<x-layout>
    <x-sidebar></x-sidebar>
    @if (session('status'))
        <div class="pt-28 px-10 sm:ml-64 relative z-50" id="alert-pelanggan">
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('status') }}
                </div>
                <button type="button" id="btn-alert-pelanggan"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div class="pt-28 px-10 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 overflow-x-auto text-xs sm:text-base">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-900">List Produk</h1>
                <div class="flex items-center">
                    <a data-modal-target="add-modal" data-modal-toggle="add-modal"
                        class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 sm:px-4 sm:py-2 text-xs sm:text-base hover:cursor-pointer rounded-md">New
                        Data</a>
                </div>
            </div>
            <form>
                <div class="flex items-center mt-4">
                    <input type="text" class="text-xs border-1 border-gray-200 rounded-md sm:p-2"
                        placeholder="Cari Produk" name="search">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-md ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-Linecap="round" stroke-Linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </form>
            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($products as $product)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <img src="{{ asset('storage/' . $product->gambarProduk) }}" alt="{{ $product->namaProduk }}"
                            class="w-64 h-48 object-cover">
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->namaProduk }}</h5>
                            </a>
                            <div class="flex items-center justify-between mt-2">
                                <span
                                    class="text-1xl font-bold text-gray-900 dark:text-white">Rp.{{ number_format($product->harga, 0, ',', '.') }}</span>
                                <div class="flex items-center">
                                    <a href="{{ route('edit.product', $product->id) }}" data-modal-target="edit-modal"
                                        data-modal-toggle="edit-modal"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-1 py-1 rounded-md mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-Linecap="round" stroke-Linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        <span class="sr-only">Edit</span>
                                    </a>
                                    <form action="{{ route('hapus.product', $product->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button onclick="return confirm('are you sure')" type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-1 py-1 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-Linecap="round" stroke-Linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <span class="text-xs">Stok barang : {{ $product->stok }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>

<!-- Main modal -->
<div id="add-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Data Produk
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="add-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('tambah.product') }}" method="post" class="p-4 md:p-5"
                enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama produck</label>
                        <input type="text" name="namaProduk" id="namaProduk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama Produk" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="harga"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Produk</label>
                        <input type="text" name="harga" id="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Harga Produk" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="stok"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok Produk</label>
                        <input type="number" name="stok" id="stok"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan jumlah Stok Barang" required="">
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="fotoProduk">Upload file</label>
                        <input accept="image/*" name="gambarProduk"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="fotoProduk" id="fotoProduk" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="fotoProduk">Masukan foto dari
                            Produk diatas
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add new Produk
                </button>
            </form>
        </div>
    </div>
</div>
