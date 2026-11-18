@extends('layouts.app')
@section('title','Checkout')
@section('content')
<h1>Checkout</h1>

<div class="grid" style="grid-template-columns:1.4fr 1fr">
    <div class="card">
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <label>Nama Penerima
                <input class="input" name="recipient_name" value="{{ old('recipient_name', auth()->user()->name) }}" required>
            </label>

            <label>No. Telepon
                <input class="input" name="phone" value="{{ old('phone') }}" required>
            </label>

            <label>Alamat
                <textarea class="input" rows="4" name="address" required>{{ old('address') }}</textarea>
            </label>

            <label>Ekspedisi
                <select name="shipping_service_id" required>
                    <option value="">Pilih ekspedisi</option>
                    @foreach($shippingServices as $service)
                        <option value="{{ $service->id }}" @selected(old('shipping_service_id') == $service->id)>{{ $service->courier }} - {{ $service->service }} ({{ $service->eta }}) - Rp{{ number_format($service->cost,0,',','.') }}</option>
                    @endforeach
                </select>
            </label>

            <button class="btn">Buat Pesanan</button>
        </form>
    </div>

    <div class="card">
        <h3>Ringkasan</h3>
        @foreach($items as $item)
            <p>{{ $item['product']->name }} x {{ $item['quantity'] }} = Rp{{ number_format($item['lineTotal'],0,',','.') }}</p>
        @endforeach
        <hr>
        <strong>Subtotal Rp{{ number_format($subtotal,0,',','.') }}</strong>
        <p class="muted">Ongkir ditambahkan sesuai ekspedisi yang dipilih.</p>
    </div>
</div>
@endsection