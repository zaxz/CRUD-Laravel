<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar'    => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'      => 'required',
            'deskripsi' => 'required',
            'harga'     => 'required|numeric',
            'stock'     => 'required|numeric'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/storage/img', $gambar->hashName());

        Product::create([
            'gambar'    => $gambar->hashName(),
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'stock'     => $request->stock
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
