<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restoran SMK - Kuliner Lezat & Berkualitas</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="container">
        <!-- Header & Navigation -->
        <div class="mt-2">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><img style="width: 100px" src="{{ asset('gambar/logo.png') }}" alt="Restoran SMK Logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto gap-3">
                            @if (session()->has('cart'))
                            <li class="nav-item">
                                <a href="{{ url('cart') }}" class="d-flex align-items-center">
                                    <i class="fas fa-shopping-cart me-2"></i> Cart
                                    <span class="badge bg-primary ms-2">
                                        @php
                                            $count = count(session('cart'));
                                            echo $count;
                                        @endphp
                                    </span>
                                </a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="#" class="d-flex align-items-center">
                                    <i class="fas fa-shopping-cart me-2"></i> Cart
                                </a>
                            </li>
                            @endif

                            @if (session()->missing('idpelanggan'))
                                <li class="nav-item">
                                    <a href="{{ url('register') }}">
                                        <i class="fas fa-user-plus me-2"></i> Register
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url ('login') }}">
                                        <i class="fas fa-sign-in-alt me-2"></i> Login
                                    </a>
                                </li>
                            @endif

                            @if(session()->has('idpelanggan'))
                            <li class="nav-item">
                                <a href="#" class="d-flex align-items-center">
                                    <i class="fas fa-user me-2"></i> {{ session('idpelanggan')['email'] }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('logout') }}">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="row mt-4">
            <!-- Sidebar Categories -->
            <div class="col-md-3 col-lg-2">
                <div class="category-sidebar">
                    <h5 class="mb-3 fw-bold">Kategori Menu</h5>
                    <ul class="list-group">
                        @foreach ($kategoris as $kategori)
                            <li class="list-group-item">
                                <a href="{{ url('show/'.$kategori->idkategori) }}">
                                    <i class="fas fa-utensils me-2"></i> {{ $kategori->kategori }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-md-9 col-lg-10">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 py-4 text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>Restoran SMK menyajikan makanan berkualitas dengan harga terjangkau untuk semua kalangan.</p>
                </div>
                <div class="col-md-4">
                    <h5>Jam Operasional</h5>
                    <p>Senin - Jumat: 08:00 - 22:00<br>Sabtu - Minggu: 10:00 - 23:00</p>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Pendidikan No. 123, Kota SMK</p>
                    <p><i class="fas fa-phone me-2"></i> (021) 123-4567</p>
                </div>
            </div>
            <div class="mt-4">
                <p>&copy; {{ date('Y') }} Restoran SMK. All rights reserved.</p>
            </div>
        </footer>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>