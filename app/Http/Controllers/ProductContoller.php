<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductContoller extends Controller
{
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
            'gambarBrg'    => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'namaBrg'      => 'required',
            'deskripsiBrg' => 'required',
            'hargaBrg'     => 'required|numeric|',
            'stokBrg'      => 'required|numeric|'
        ]);

        if($request->hasFile('gambarBrg')){
            $gambar = $request->file('gambarBrg')->getClientOriginalName();            
            $request->file('gambarBrg')->move(public_path('storage/img'), $gambar);
        }
        Product::create([
            'gambar'        => $gambar,
            'nama'          => $request->namaBrg,
            'deskripsi'     => $request->deskripsiBrg,
            'harga_jual'    => $request->hargaBrg,
            'stok'          => $request->stokBrg
        ]);

        return redirect()->route('product.index')->with('success','Produk Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $request->validate([
            'gambarBrg'    => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'namaBrg'      => 'required',
            'deskripsiBrg' => 'required',
            'hargaBrg'     => 'required|numeric|',
            'stokBrg'      => 'required|numeric|'
        ]);

        $products->update([
            'gambar'        => $request->gambarBrg,
            'nama'          => $request->namaBrg,
            'deskripsi'     => $request->deskripsiBrg,
            'harga_jual'    => $request->hargaBrg,
            'stok'          => $request->stokBrg
        ]);
        
        return redirect()->route('product.index')->with('success','Produk Berhasil Disimpan!');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->route('product.index')->with('success', 'Produk Berhasil Dihapus!');
    }
}
