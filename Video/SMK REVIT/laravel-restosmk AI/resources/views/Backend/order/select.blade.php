@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-12">
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Data Order</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Bayar</th>
                                <th>Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->pelanggan }}</td>
                                <td>{{ $order->tglorder }}</td>
                                <td>{{ number_format($order->total) }}</td>
                                <td>{{ number_format($order->bayar) }}</td>
                                <td>{{ number_format($order->kembali) }}</td>
                                <td>
                                    @if ($order->status == 1)
                                        <span class="badge bg-success">Sudah Bayar</span>
                                    @else
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection