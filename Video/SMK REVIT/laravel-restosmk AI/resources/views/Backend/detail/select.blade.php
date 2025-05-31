@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-12">
        <div class="card admin-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-receipt me-2"></i>Data Order Detail</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->tglorder }}</td>
                                <td>{{ $detail->menu }}</td>
                                <td>{{ number_format($detail->harga) }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>{{ number_format($detail->jumlah * $detail->harga) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $details->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection