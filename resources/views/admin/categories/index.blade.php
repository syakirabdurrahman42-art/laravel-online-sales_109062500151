@extends('layouts.admin')
@section('title','Kategori')
@section('content')
<h1>Kategori</h1>

<div class="card">
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <label>Nama Kategori
            <input class="input" name="name" required>
        </label>
        <button class="btn">Tambah</button>
    </form>
</div>

<div class="card">
    <div class="table-scroll">
        <table>
            <tr>
                <th>Nama</th>
                <th>Jumlah Produk</th>
                <th>Aksi</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <form class="row" method="POST" action="{{ route('admin.categories.update',$category) }}">
                            @csrf
                            @method('PUT')
                            <input class="input" style="max-width:240px" name="name" value="{{ $category->name }}">
                            <button class="btn">Simpan</button>
                        </form>
                    </td>
                    <td>{{ $category->products_count }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.categories.destroy',$category) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection