@extends('layout.app')
@section('title', 'Edit Barang')
@section('content')
<div class="container">
    <h1 class="my-3">Edit Barang</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif
    <form action="{{route('product.store')}}" method="POST" class="" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="namaBrg" class="form-label">Nama Barang</label>
        <input type="text" name="namaBrg" class="form-control" value="{{old('namaBrg', $products->nama)}}">
    </div>
    <div class="mb-2">
        <label for="gambarBrg" class="form-label">Gambar Barang</label>
        <input type="file" accept="image/*" name="gambarBrg" class="form-control" value="{{old('gambarBrg', $products->gambar)}}">
    </div>
    <div class="mb-2">
        <label for="hargaBrg" class="form-label">Harga Barang</label>
        <input type="number" name="hargaBrg" class="form-control" value="{{old('hargaBrg', $products->harga_jual)}}">
    </div>
    <div class="mb-2">
        <label for="deskripsiBrg" class="form-label">Deskripsi Barang</label>
        <textarea class="form-control" name="deskripsiBrg" rows="3">{{old('deskripsiBrg', $products->deskripsi)}}</textarea>
    </div>
    <div class="mb-2">
        <label for="stokBrg" class="form-label">Stok Barang</label>
        <input type="number" name="stokBrg" class="form-control" value="{{old('stokBrg', $products->stok)}}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection