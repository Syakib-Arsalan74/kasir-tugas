<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="h-full">

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
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
</body>

</html>
