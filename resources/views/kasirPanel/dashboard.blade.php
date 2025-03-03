<x-layout>
    <x-sidebar></x-sidebar>
    <div class="pt-28 px-10 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <h1 class="text-2xl mb-5 font-semibold text-gray-900">Dashboard</h1>
            <!-- component -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <div class="min-w-0 rounded-lg shadow-sm overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-center">
                        <div
                            class="p-3 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Pelangan
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $pelanggan }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="min-w-0 rounded-lg shadow-sm overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-center">
                        <div
                            class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Pembayaran
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="min-w-0 rounded-lg shadow-sm overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-center">
                        <div
                            class="p-3 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Produk
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{ $produk }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="min-w-0 rounded-lg shadow-sm overflow-hidden bg-white dark:bg-gray-800">
                    <div class="p-4 flex items-center">
                        <div
                            class="p-3 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total transaksi
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 sm:grid-cols-2">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Monthly Sales Activity</div>
                    <canvas class="p-10" id="chartLine"></canvas>
                </div>
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Daily Sales Activity</div>
                    <canvas class="p-10" id="chartBar"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        const labels = ["January", "February", "March", "April", "May", "June"];
        const data = {
            labels: labels,
            datasets: [{
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configLineChart = {
            type: "line",
            data,
            options: {},
        };

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );
        const labelsBarChart = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
        ];
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "My First dataset",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>
</x-layout>
