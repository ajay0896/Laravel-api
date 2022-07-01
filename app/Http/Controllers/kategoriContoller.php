<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriContoller extends Controller
{
    public function index()
    {
        $data = Kategori::all();

        return response([
            $data
        ]);

    }

    public function show(Kategori $kategori)
    {
        return response([
            $kategori
        ]);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response([
            'berhasil hapus kateori'
        ]);
    }

    public function store(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
            'nama'=>'required',
        ]);

        Kategori::create($data);

        return response([
            'berhasil tambah kategori'
        ], 201);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
            'nama'=>'required',
        ]);

        $kategori->update($data);

        return response([
            'berhasil update kategori'
        ]);
    }
}
