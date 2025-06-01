<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 text-sm">

<div class="max-w-4xl mx-auto mt-5 px-4">
    <h1 class="text-2xl font-bold mb-6 text-center text-indigo-600">Daftar Produk</h1>

    {{-- Tabel Daftar Produk --}}
    <div class="overflow-x-auto border border-gray-300 rounded-md shadow-sm mb-5">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="uppercase bg-indigo-100 text-indigo-800">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Produk</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nama as $index => $item)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-indigo-50' }} hover:bg-indigo-100">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $item }}</td>
                    <td class="px-4 py-2">{{ $desc[$index] }}</td>
                    <td class="px-4 py-2">{{ $harga[$index] }}</td>
                    <td class="px-4 py-2 space-y-2">
                        <form action="{{ route('produk.delete', $id[$index]) }}" method="POST" onsubmit="return confirm('Hapus produk {{ $item }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 w-full">
                                Delete
                            </button>
                        </form>

                        <button type="button"
                                onclick="toggleEditForm({{ $id[$index] }})"
                                class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 w-full">
                            Edit
                        </button>
                        
                        <form id="edit-form-{{ $id[$index] }}"
                              action="{{ route('produk.update', $id[$index]) }}"
                              method="POST"
                              class="hidden space-y-2 mt-2">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="nama" value="{{ $item }}" required class="border rounded px-2 py-1 w-full" placeholder="Nama">
                            <input type="text" name="deskripsi" value="{{ $desc[$index] }}" required class="border rounded px-2 py-1 w-full" placeholder="Deskripsi">
                            <input type="number" name="harga" value="{{ $harga[$index] }}" required class="border rounded px-2 py-1 w-full" placeholder="Harga">
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 w-full">
                                Simpan
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Form Tambah Produk --}}
    <h2 class="text-xl text-center font-semibold mb-4 text-indigo-700">Form Tambah Produk</h2>
    <form method="POST" action="{{ route('produk.simpan') }}" class="space-y-4 bg-white p-6 rounded-md shadow-md border mb-10">
        @csrf
        <div>
            <label for="nama" class="block mb-1 font-medium">Nama Produk:</label>
            <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
        </div>

        <div>
            <label for="deskripsi" class="block mb-1 font-medium">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required></textarea>
        </div>

        <div>
            <label for="harga" class="block mb-1 font-medium">Harga Produk:</label>
            <input type="number" id="harga" name="harga" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Simpan</button>
    </form>
</div>

{{-- JavaScript untuk Toggle Form Update --}}
<script>
    function toggleEditForm(id) {
        const form = document.getElementById('edit-form-' + id);
        form.classList.toggle('hidden');
    }
</script>

</body>
</html>
