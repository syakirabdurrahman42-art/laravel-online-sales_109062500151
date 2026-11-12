@extends('layouts.admin')
@section('title','Tambah Produk')
@section('content')
<h1>Tambah Produk</h1>
<div class="card">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
        @csrf
        @include('admin.products._form')
    </form>
</div>
@endsection