@extends('layout.app')
@section('title', 'Kelola Product')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-3">
        <h1>Kelola Produk</h1>
        <div>
            <a href="{{route('product.create')}}" class="btn btn-primary fw-semibold">+ Tambah Product</a>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if (count($products)>0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" style="width: 20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="">
                    <img src="storage/img/{{$product->gambar}}" alt="{{$product->gambar}}" style="width: 100px;">
                </td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->harga_jual }}</td>
                <td>{{ $product->stok }}</td>
                <td>{{ $product->deskripsi }}</td>
                <td>
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('product.destroy', $product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-danger">Barang Tidak Tersedia!</div>
    @endif
</div>
@endsection
