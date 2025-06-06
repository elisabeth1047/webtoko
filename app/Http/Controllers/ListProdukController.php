<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::all();
        $nama = $desc = $harga = $id = [];

        foreach ($data as $produk) {
            $nama[] = $produk->nama;
            $desc[] = $produk->deskripsi;
            $harga[] = $produk->harga;
            $id[] = $produk->id;
        }

        return view('list_produk', compact('nama', 'desc', 'harga', 'id'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:1',
        ]);

        $produk = new Produk;
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function delete($id){
        $produk = Produk::where('id', $id)->first();
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
            }else{
                return redirect()->back()->with('error', 'Produk tidak ditemukan.');
            }
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric|min:1',
    ]);

    $produk = Produk::find($id);

    if (!$produk) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    $produk->nama = $request->input('nama');
    $produk->deskripsi = $request->input('deskripsi');
    $produk->harga = $request->input('harga');
    $produk->save();

    return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
}


    
}
