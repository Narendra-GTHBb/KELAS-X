@extends('front')

@section('content')

@if (session('cart'))
<div class="cart-container">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="cart-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja</h2>
                <a class="btn btn-danger" href="{{ url('batal') }}">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
            </div>
        </div>
    </div>

    @php
        $no=1;
        $total = 0;
    @endphp

    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('cart') as $idmenu=>$menu)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $menu['menu'] }}</td>
                                <td>Rp {{ number_format($menu['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <div class="quantity-control d-flex align-items-center">
                                        <a href="{{ url('kurang/'.$menu['idmenu']) }}" class="btn btn-sm btn-outline-secondary">-</a>
                                        <span class="mx-2">{{ $menu['jumlah'] }}</span>
                                        <a href="{{ url('tambah/'.$menu['idmenu']) }}" class="btn btn-sm btn-outline-secondary">+</a>
                                    </div>
                                </td>
                                <td>Rp {{ number_format($menu['jumlah'] * $menu['harga'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ url('hapus/'.$menu['idmenu']) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        @php
                            $total = $total + ($menu['jumlah'] * $menu['harga']);
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-active">
                            <td colspan="4" class="text-end fw-bold">Total Pembayaran</td>
                            <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ url('checkout') }}">
            <i class="fas fa-check-circle me-2"></i>Checkout
        </a>
    </div>
</div>

@else
<div class="empty-cart text-center py-5">
    <i class="fas fa-shopping-cart fa-5x mb-4 text-muted"></i>
    <h3>Keranjang Belanja Kosong</h3>
    <p class="lead">Silakan tambahkan menu ke keranjang terlebih dahulu</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
        <i class="fas fa-utensils me-2"></i>Lihat Menu
    </a>
</div>
<script>
    // Redirect after 3 seconds if cart is empty
    setTimeout(function() {
        window.location.href="/";
    }, 3000);
</script>
@endif

@endsection