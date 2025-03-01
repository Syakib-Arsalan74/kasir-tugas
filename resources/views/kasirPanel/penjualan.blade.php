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
                <h1 class="text-2xl font-semibold text-gray-900">Penjualan</h1>
                <div class="flex items-center">
                    <a
                        class="bg-green-500 hover:bg-green-600 text-white p-1 sm:p-2 text-xs sm:text-base hover:cursor-pointer rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-Width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-Linecap="round" stroke-Linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <span class="sr-only">Download Pdf</span>
                    </a>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center mt-4">
                    <input type="text" class="text-xs border-1 border-gray-200 rounded-md sm:p-2"
                        placeholder="Cari History Penjualan">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-md ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-Linecap="round" stroke-Linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
                <form class="flex items-center mt-4">
                    <select id="filter"
                        class="text-xs bg-gray-50 border border-gray-300 text-gray-900 rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ml-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>All</option>
                        <option value="Admin">Newest</option>
                        <option value="Kasir">Oldest</option>
                    </select>
                </form>
            </div>
            <div class="mt-4">
                <form action="" method="post" class="grid gap-3 sm:grid-cols-6">
                    @csrf
                    <div>
                        <label for="pelanggan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Pelangan
                            :</label>
                        <select id="pelanggan" name="pelanggan_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->namaPelanggan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-start-6">
                        <label for="kasir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kasir
                            Saat ini
                            :</label>
                        <input type="username" name="user_id" id="kasir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $user }}" readonly>
                    </div>
                    <div class="col-span-4 row-span-6 mt-2 ">
                        <h1 class="text-xl font-bold mb-4">Pembelian :</h1>
                        <div
                            class="p-4 border-2 border-gray-200 rounded-md dark:border-gray-700 overflow-x-auto text-xs sm:text-base">
                            <label for="produk" class="block mb-2 text-sm font-medium text-gray-900">Masukan
                                Produk :</label>
                            <div class="grid grid-cols-3">
                                <div class="mb-2">
                                    <select id="pilihProduk" name="produk"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}"
                                                data-stok="{{ $produk->stok }}">
                                                {{ $produk->namaProduk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2 col-start-4">
                                    <button type="button" id="tambahProduk"
                                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
                                        Produk</button>
                                </div>
                            </div>
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-center">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Produk
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Harga
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            stok
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="produkList">
                                    {{-- diisi otomatis --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-span-2 row-span-6 mt-2">
                        <h1 class="text-xl font-bold mb-4">Pembayaran :</h1>
                        <div
                            class="p-2 border-2 border-gray-200 rounded-md dark:border-gray-700 overflow-x-auto text-xs sm:text-base">
                            <div>
                                <p class="m-1">Total Biaya :</p>
                                <input type="text" id="total-biaya" name="totalHarga"
                                    class="w-full h-full text-xs border-1 border-gray-200 rounded-sm sm:p-3"
                                    value="" readonly>
                            </div>
                            <p class="m-1">Bayar :</p>
                            <div class="mt-2">
                                <input type="number" id="input-bayar"
                                    class="w-full h-full text-xs border-1 border-gray-200 rounded-sm sm:p-3"
                                    placeholder="Uang Pembayaran">
                            </div>
                            <p class="m-1">Total Kembalian :</p>
                            <div
                                class="flex justify-between p-2 mt-2 border-1 border-gray-200 rounded-sm dark:border-gray-700 overflow-x-auto text-xs sm:text-base">
                                <p>Rp</p>
                                <p id="total-kembalian"></p>
                            </div>
                            <div class="my-2">
                                <button type="submit"
                                    class="text-white w-full h-full inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Add new Transaksi
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-4">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-center">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pelanggan
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cashier
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($penjualan as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->pelanggan->namaPelanggan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    Rp. {{ number_format($item->total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->user->username }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->created_at->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('penjualan.show', $item->id) }}"
                                        class="text-blue-600 hover:text-blue-900">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var totalBiaya = parseFloat($('#total-biaya').val());

            function calculateKembalian() {
                var bayar = parseFloat($('#input-bayar').val().replace('.', '').replace(',', '.'));
                var kembalian = 0;
                if (!isNaN(bayar)) {
                    kembalian = bayar - totalBiaya;
                }
                $('#total-kembalian').text(kembalian >= 0 ? kembalian.toFixed(2).replace('.', ',') : '0,00');
            }
            $('#input-bayar').on('input', function() {
                setTimeout(calculateKembalian, 0);
            });
            $('#input-bayar').on('keypress', function(event) {
                if (event.which === 13) {
                    event.preventDefault();
                }
            });
        });

        $(document).ready(function() {
            var totalBiaya = 0;

            // Fungsi untuk menambah produk ke tabel
            $('#tambahProduk').on('click', function() {
                var selectedOption = $('#pilihProduk option:selected');
                var produkId = selectedOption.val();
                var produkNama = selectedOption.text();
                var produkHarga = parseFloat(selectedOption.data('harga'));
                var produkStok = parseInt(selectedOption.data('stok'));
                var quantity = 1; // Default quantity

                // Cek apakah produk sudah ada di tabel
                var existingRow = $('#produkList tr[data-id="' + produkId + '"]');
                if (existingRow.length > 0) {
                    // Jika produk sudah ada, tambahkan quantity
                    var existingQuantity = parseInt(existingRow.find('.quantity').text());
                    existingRow.find('.quantity').text(existingQuantity + 1);

                    // Update total harga untuk produk yang ditambahkan
                    var newTotalHarga = produkHarga * (existingQuantity + 1);
                    existingRow.find('.total-harga').text('Rp. ' + newTotalHarga.toLocaleString('id-ID'));

                    // Update total biaya
                    totalBiaya += produkHarga; // Tambah harga produk
                } else {
                    // Hitung total harga untuk produk yang ditambahkan
                    var totalHarga = produkHarga * quantity;

                    // Tambahkan produk ke tabel
                    $('#produkList').append(`
                <tr data-id="${produkId}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${$('#produkList tr').length + 1}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${produkNama}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp. ${produkHarga.toLocaleString('id-ID')}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 quantity">${quantity}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${produkStok}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button type="button" class="text-red-600 hover:text-red-900" onclick="removeProduct(this)">Delete</button>
                    </td>
                </tr>
            `);

                    // Update total biaya
                    totalBiaya += totalHarga; // Tambah total harga produk
                }

                // Update total biaya di input
                $('#total-biaya').val(totalBiaya.toLocaleString('id-ID'));
            });

            // Fungsi untuk menghitung kembalian
            function calculateKembalian() {
                var bayar = parseFloat($('#input-bayar').val().replace('.', '').replace(',', '.'));
                var kembalian = 0;

                // Hitung kembalian jika bayar valid
                if (!isNaN(bayar)) {
                    kembalian = bayar - totalBiaya; // Ganti totalBiaya dengan totalBiaya yang benar
                }

                // Tampilkan kembalian
                $('#total-kembalian').text(kembalian >= 0 ? kembalian.toFixed(2).replace('.', ',') : '0,00');
            }

            // Event listener untuk input bayar
            $('#input-bayar').on('input', function() {
                setTimeout(calculateKembalian, 0); // Menjalankan fungsi secara asynchronous
            });

            // Fungsi untuk menghapus produk dari tabel
            window.removeProduct = function(button) {
                var row = $(button).closest('tr');
                var quantity = parseInt(row.find('.quantity').text());
                var hargaPerUnit = parseFloat(row.find('td:nth-child(3)').text().replace('Rp. ', '').replace(
                    '.', '').replace(',', '.')); // Ambil harga per unit
                var totalHarga = hargaPerUnit * quantity; // Hitung total harga untuk quantity yang ada

                totalBiaya -= totalHarga; // Kurangi total biaya
                $('#total-biaya').val(totalBiaya.toLocaleString('id-ID')); // Update total biaya
                row.remove(); // Hapus baris dari tabel
            };
        });
    </script>
</x-layout>
