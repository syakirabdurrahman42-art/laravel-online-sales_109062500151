@extends('layouts.admin')
@section('title','Ekspedisi')
@section('content')
<h1>Layanan Ekspedisi</h1>

<div class="card">
    <form method="POST" action="{{ route('admin.shipping.store') }}">
        @csrf
        <div class="row">
            <label>Kurir
                <input class="input" name="courier" required>
            </label>
            <label>Layanan
                <input class="input" name="service" required>
            </label>
            <label>Estimasi
                <input class="input" name="eta">
            </label>
            <label>Biaya
                <input class="input" type="number" name="cost" min="0" required>
            </label>
            <label>
                <input type="checkbox" name="is_active" value="1" checked> Aktif
            </label>
            <button class="btn">Tambah</button>
        </div>
    </form>
</div>

<div class="card">
    <table>
        <tr>
            <th>Kurir</th>
            <th>Layanan</th>
            <th>ETA</th>
            <th>Biaya</th>
            <th>Status</th>
            <th></th>
        </tr>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->courier }}</td>
                <td>{{ $service->service }}</td>
                <td>{{ $service->eta }}</td>
                <td>Rp{{ number_format($service->cost,0,',','.') }}</td>
                <td>{{ $service->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.shipping.destroy',$service) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Nonaktifkan</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection