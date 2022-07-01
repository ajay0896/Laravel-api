<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $data = produk::with('kategori')->get();

        return response([
            'data' => $data
        ]);

    }

    public function show(produk $produk)
    {
        return response([
            'produk' => $produk
        ]);
    }

    public function destroy(produk $produk)
    {
        $produk->delete();

        return response([
            'message'=>'berhasil hapus data'
        ]);
    }

    public function store(Request $request, produk $produk)
    {
        $data = $request->validate([
            'nama'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required',
            'kategori_id'=>'required|exists:kategoris,id'
        ]);

        produk::create($data);

        return response([
            'message'=>'berhasil tambah produk'
        ], 201);
    }

    public function update(Request $request, produk $produk)
    {
        $data = $request->validate([
            'nama'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required',
            'kategori_id'=>'required|exists:kategoris,id'
        ]);

        $produk->update($data);

        return response([
            'message'=>'berhasil update produk'
        ]);
    }
}
