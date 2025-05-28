<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 text-sm">

    <div class="max-w-6xl mx-auto mt-12 px-4">
        <h1 class="text-xl font-bold mb-4 text-center text-indigo-600">Daftar Produk</h1>

        <div class="overflow-x-auto border border-gray-300 rounded-md shadow-sm">
            <table class="w-full text-xs text-left text-gray-700">
                <thead class="uppercase bg-indigo-100 text-indigo-800">
                    <tr>
                        <th scope="col" class="px-3 py-2">No</th>
                        <th scope="col" class="px-3 py-2">Nama Produk</th>
                        <th scope="col" class="px-3 py-2">Deskripsi</th>
                        <th scope="col" class="px-3 py-2">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nama as $index => $item)
                    <tr class="{{ $index % 2 == 0 ? 'bg-indigo-50' : 'bg-white' }} hover:bg-indigo-100">
                        <td class="px-3 py-2 font-semibold text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-3 py-2">{{ $item }}</td>
                        <td class="px-3 py-2">{{ $desc[$index] }}</td>
                        <td class="px-3 py-2 text-green-600">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
