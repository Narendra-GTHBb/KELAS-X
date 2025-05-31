@extends('front')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="menu-header text-center">
            <h2 class="display-5 fw-bold">Menu Spesial Kami</h2>
            <p class="lead">Nikmati berbagai pilihan menu lezat dengan kualitas terbaik</p>
        </div>
    </div>

    @foreach ($menus as $menu)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-img-container">
                <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top" alt="{{ $menu->menu }}">
            </div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $menu->menu }}</h5>
                <p class="card-text flex-grow-1">{{ $menu->deskripsi }}</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                    <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary">
                        <i class="fas fa-shopping-cart me-2"></i>Beli
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $menus->links() }}
    </div>
</div>
@endsection