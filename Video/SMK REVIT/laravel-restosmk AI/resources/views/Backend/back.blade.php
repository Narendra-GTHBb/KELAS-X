<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - Restoran SMK</title>
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
<body class="admin-body">
    <div class="container">
        <!-- Admin Header -->
        <div class="mt-4">
            <nav class="navbar navbar-expand-lg admin-header">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-utensils fa-2x me-3 text-white"></i>
                        <h2 class="mb-0">Admin Panel</h2>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="adminNavbar">
                        <ul class="navbar-nav ms-auto gap-4">
                            <li class="nav-item">
                                <span class="d-flex align-items-center">
                                    <i class="fas fa-user me-2"></i>{{ Auth::user()->email }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="d-flex align-items-center">
                                    <i class="fas fa-user-shield me-2"></i>Level: {{ Auth::user()->level }}
                                </span>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/logout') }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="row mt-4">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 mb-4">
                <div class="admin-nav">
                    <h5 class="mb-3 border-bottom pb-2">Menu Navigasi</h5>
                    <ul class="list-group">
                        @if (Auth::user()->level == 'admin')
                        <li class="list-group-item">
                            <a href="{{ url('admin/user') }}" class="d-flex align-items-center">
                                <i class="fas fa-users me-2"></i>User Management
                            </a>
                        </li>
                        @endif

                        @if (Auth::user()->level == 'kasir')
                        <li class="list-group-item">
                            <a href="{{ url('admin/order') }}" class="d-flex align-items-center">
                                <i class="fas fa-shopping-cart me-2"></i>Order
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('admin/orderdetail') }}" class="d-flex align-items-center">
                                <i class="fas fa-receipt me-2"></i>Order Detail
                            </a>
                        </li>
                        @endif

                        @if (Auth::user()->level == 'manager')
                        <li class="list-group-item">
                            <a href="{{ url('admin/kategori') }}" class="d-flex align-items-center">
                                <i class="fas fa-tags me-2"></i>Kategori
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url ('admin/menu') }}" class="d-flex align-items-center">
                                <i class="fas fa-utensils me-2"></i>Menu
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('admin/pelanggan') }}" class="d-flex align-items-center">
                                <i class="fas fa-user-friends me-2"></i>Pelanggan
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('admin/order') }}" class="d-flex align-items-center">
                                <i class="fas fa-shopping-cart me-2"></i>Order
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('admin/orderdetail') }}" class="d-flex align-items-center">
                                <i class="fas fa-receipt me-2"></i>Order Detail
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-md-9 col-lg-10">
                <div class="admin-content">
                    @yield('admincontent')
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 py-3 text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Restoran SMK Admin Panel. All rights reserved.</p>
        </footer>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>