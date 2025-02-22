<x-layout>
    <x-sidebar></x-sidebar>
    <div class="pt-28 px-10 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <h1 class="text-2xl font-semibold text-gray-900">Pelanggan</h1>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <a href="{{ route('tambah.pelanggan') }}"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Tambah
                        Pelanggan</a>
                </div>
                <div class="flex items-center">
                    <input type="text" class="border-2 border-gray-200 rounded-md p-2" placeholder="Cari Pelanggan">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md ml-2">Cari</button>
                </div>
            </div>
            <div class="mt-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border-2 border-gray-200 p-2">No</th>
                            <th class="border-2 border-gray-200 p-2">Nama</th>
                            <th class="border-2 border-gray-200 p-2">Alamat</th>
                            <th class="border-2 border-gray-200 p-2">No. Telp</th>
                            <th class="border-2 border-gray-200 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-2 border-gray-200 p-2">1</td>
                            <td class="border-2 border-gray-200 p-2">John Doe</td>
                            <td class="border-2 border-gray-200 p-2">Jl. Kenangan No. 1</td>
                            <td class="border-2 border-gray-200 p-2">08123456789</td>
                            <td class="border-2 border-gray-200 p-2">
                                <a href=""
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded-md">Edit</a>
                                <a href=""
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-md">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
