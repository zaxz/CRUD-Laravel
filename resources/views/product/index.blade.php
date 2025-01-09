@extends('layout.app')
@section('title', 'Kelola Product')
@section('content')
<div class="container">
    <h1>peler</h1>
    <a href="{{route('product.create')}}" class="btn btn-primary ">Tambah Product</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Stock</th>
                <th scope="col" >Action</th>
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
                <td>{{ $product->harga }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Del</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
