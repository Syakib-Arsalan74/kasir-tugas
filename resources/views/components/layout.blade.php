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
    <script>
        const pelangganAlert = document.getElementById("alert-pelanggan");
        const btnPelangganAlert = document.getElementById("btn-alert-pelanggan");
        btnPelangganAlert.addEventListener("click", function() {
            pelangganAlert.classList.add("hidden");
        });
    </script>
</body>

</html>
