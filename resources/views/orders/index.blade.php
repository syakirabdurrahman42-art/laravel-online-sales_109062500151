@extends('layouts.app')
@section('title','Pesanan Saya')
@section('content')
<h1>Pesanan Saya</h1>

<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->code }}</td>
                <td>{{ $order->ordered_at->format('d-m-Y H:i') }}</td>
                <td>Rp{{ number_format($order->grand_total,0,',','.') }}</td>
                <td>{{ strtoupper($order->status) }}</td>
                <td><a href="{{ route('orders.show',$order) }}">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<div style="margin-top:18px">{{ $orders->links() }}</div>
@endsection