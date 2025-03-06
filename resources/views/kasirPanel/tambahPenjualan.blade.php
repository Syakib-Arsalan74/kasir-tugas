<x-layout>
    <x-sidebar></x-sidebar>
    <div class="pt-28 px-10 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 overflow-x-auto text-xs sm:text-base">
            <h1 class="text-2xl font-semibold text-gray-900">Penjualan</h1>
            <div class="mt-4">
                <form action="{{ route('tambah.penjualan') }}" method="post" class="grid gap-3 sm:grid-cols-6">
                    @csrf
                    <div>
                        <label for="pelanggan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Pelangan
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
                        <input type="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $user->username }}" readonly>
                        <input type="hidden" name="user_id" id="kasir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $user->id }}" readonly>
                    </div>
                    <div class="col-span-4 row-span-6 mt-2 ">
                        <h1 class="text-xl font-bold mb-4">Pembelian :</h1>
                        <div
                            class="p-4 border-2 border-gray-200 rounded-md dark:border-gray-700 overflow-x-auto text-xs sm:text-base">
                            <label for="produk" class="block mb-2 text-sm font-medium text-gray-900">Masukan
                                Produk :</label>
                            <div class="grid grid-cols-3">
                                <div class="mb-2">
                                    <select id="pilihProduk"
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
                                <input type="number" id="total-biaya" name="totalHarga"
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
                                <button type="submit" id="addNewTransaksi"
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
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var totalBiaya = 0;

            // Fungsi untuk menghitung kembalian
            function calculateKembalian() {
                var bayar = parseFloat($('#input-bayar').val().replace('.', '').replace(',', '.'));
                var kembalian = 0;
                if (!isNaN(bayar)) {
                    kembalian = bayar - totalBiaya;
                }
                $('#total-kembalian').text(kembalian >= 0 ? kembalian.toFixed(2).replace('.', ',') : '0,00');
            }

            // Event untuk menambah produk
            $('#tambahProduk').on('click', function() {
                var selectedOption = $('#pilihProduk option:selected');
                var produkId = selectedOption.val();
                var produkNama = selectedOption.text();
                var produkHarga = parseFloat(selectedOption.data('harga'));
                var produkStok = parseInt(selectedOption.data('stok'));
                var quantity = 1;
                var existingRow = $('#produkList tr[data-id="' + produkId + '"]');

                if (existingRow.length > 0) {
                    var existingQuantity = parseInt(existingRow.find('.quantity').text());
                    existingRow.find('.quantity').text(existingQuantity + 1);
                    var newTotalHarga = produkHarga * (existingQuantity + 1);
                    existingRow.find('.total-harga').text('Rp. ' + newTotalHarga.toLocaleString('id-ID'));
                    totalBiaya += produkHarga;
                } else {
                    var totalHarga = produkHarga * quantity;
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
                    totalBiaya += totalHarga;
                }

                // Update total biaya
                $('#total-biaya').val(totalBiaya.toLocaleString('id-ID'));
                calculateKembalian();
            });

            // Event untuk menghitung kembalian saat input bayar berubah
            $('#input-bayar').on('input', function() {
                calculateKembalian();
            });

            // Fungsi untuk menghapus produk
            window.removeProduct = function(button) {
                var row = $(button).closest('tr');
                var quantity = parseInt(row.find('.quantity').text());
                var hargaPerUnit = parseFloat(row.find('td:nth-child(3)').text().replace('Rp. ', '').replace(
                    '.', '').replace(',', '.'));
                var totalHarga = hargaPerUnit * quantity;

                totalBiaya -= totalHarga;
                $('#total-biaya').val(totalBiaya.toLocaleString('id-ID'));
                row.remove();
                calculateKembalian(); // Panggil untuk menghitung kembalian setelah menghapus produk
            };
        });
    </script>
</x-layout>
