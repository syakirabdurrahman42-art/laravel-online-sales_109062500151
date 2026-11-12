@extends('layouts.admin')
@section('title','Edit Produk')
@section('content')
<h1>Edit Produk</h1>
<div class="card">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update',$product) }}">
        @csrf
        @method('PUT')
        @include('admin.products._form')
    </form>
</div>
@endsection