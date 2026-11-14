@extends('layouts.app')
@section('title','Produk')
@section('content')
<h1>Katalog Produk</h1>

<div class="card">
    <form method="GET" class="row">
        <label style="flex:2">Cari
            <input class="input" name="q" value="{{ request('q') }}" placeholder="Nama atau SKU">
        </label>

        <label style="flex:1">Kategori
            <select name="category">
                <option value="">Semua</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </label>

        <label>Harga min
            <input class="input" type="number" name="min_price" value="{{ request('min_price') }}">
        </label>

        <label>Harga max
            <input class="input" type="number" name="max_price" value="{{ request('max_price') }}">
        </label>

        <label>Urutkan
            <select name="sort">
                <option value="">Terbaru</option>
                <option value="price_asc" @selected(request('sort') === 'price_asc')>Harga termurah</option>
                <option value="price_desc" @selected(request('sort') === 'price_desc')>Harga termahal</option>
                <option value="name" @selected(request('sort') === 'name')>Nama</option>
            </select>
        </label>

        <label>
            <input type="checkbox" name="ready" value="1" @checked(request('ready'))> Stok tersedia
        </label>

        <button class="btn">Filter</button>
    </form>
</div>

<div class="grid">
    @forelse($products as $product)
        <article class="card">
            @if($product->image)
                <img class="thumb" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
            @else
                <div class="thumb"></div>
            @endif
            <h3>{{ $product->name }}</h3>
            <div class="muted">{{ $product->category->name }}</div>
            <p class="price">Rp{{ number_format($product->price,0,',','.') }}</p>
            <p>Stok: {{ $product->stock }}</p>
            <a class="btn" href="{{ route('shop.show',$product->slug) }}">Lihat Detail</a>
        </article>
    @empty
        <p>Tidak ada produk.</p>
    @endforelse
</div>

<div style="margin-top:20px">{{ $products->links() }}</div>
@endsection