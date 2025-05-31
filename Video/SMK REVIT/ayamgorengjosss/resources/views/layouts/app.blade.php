<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Ayam Goreng JOSS') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== MODERN AYAM GORENG JOSS STYLING ===== */
        
        /* Base Styles & Variables */
        :root {
            /* Primary color palette - warm, appetizing colors */
            --primary: #E65100;         /* Deep orange - main brand color */
            --primary-light: #FF8A65;   /* Light orange */
            --primary-dark: #BF360C;    /* Dark orange/brown */
            
            /* Secondary colors */
            --secondary: #8D6E63;       /* Warm brown */
            --secondary-light: #BCAAA4; /* Light brown */
            
            /* Accent colors */
            --accent: #FFCC80;          /* Light amber */
            --accent-bright: #FFD54F;   /* Bright amber for highlights */
            
            /* Neutral colors */
            --white: #FFFFFF;
            --off-white: #FFF8E1;       /* Cream color for backgrounds */
            --light-gray: #F5F5F5;
            --medium-gray: #E0E0E0;
            --dark-gray: #616161;
            --black: #212121;
            
            /* Functional colors */
            --success: #43A047;
            --warning: #FFA000;
            --error: #D32F2F;
            --info: #1976D2;
            
            /* Typography */
            --font-family: 'Poppins', sans-serif;
            --h1-size: 2.5rem;
            --h2-size: 2rem;
            --h3-size: 1.5rem;
            --body-size: 1rem;
            --small-size: 0.875rem;
            
            /* Spacing */
            --spacing-xs: 0.25rem;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
            --spacing-xxl: 3rem;
            
            /* Effects */
            --border-radius-sm: 4px;
            --border-radius-md: 8px;
            --border-radius-lg: 16px;
            --border-radius-xl: 24px;
            --border-radius-round: 50%;
            
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.14);
            --shadow-xl: 0 12px 24px rgba(0, 0, 0, 0.16);
            
            --transition-fast: 0.2s ease;
            --transition-normal: 0.3s ease;
            --transition-slow: 0.5s ease;
        }
        
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: var(--font-family);
            font-size: var(--body-size);
            line-height: 1.6;
            color: var(--black);
            background-color: var(--off-white);
            overflow-x: hidden;
        }
        
        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition-normal);
        }
        
        ul, ol {
            list-style: none;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        button, input, select, textarea {
            font-family: inherit;
            font-size: inherit;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--light-gray);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-light);
            border-radius: var(--border-radius-md);
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }
        
        /* Layout */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--spacing-lg);
        }
        
        .main-content {
            min-height: calc(100vh - 70px);
        }
        
        /* ===== HEADER & NAVIGATION ===== */
        .header {
            position: sticky;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: var(--white);
            box-shadow: var(--shadow-md);
        }
        
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: var(--spacing-md) 0;
            position: relative;
        }
        
        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary);
            border-radius: var(--border-radius-round);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
            box-shadow: var(--shadow-sm);
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 0.5px;
        }
        
        .logo-text span {
            color: var(--secondary);
            font-weight: 700;
        }
        
        /* Navigation */
        .nav-container {
            display: flex;
            align-items: center;
            gap: var(--spacing-xl);
        }
        
        .nav-list {
            display: flex;
            gap: var(--spacing-md);
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: var(--spacing-sm) var(--spacing-md);
            color: var(--dark-gray);
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }
        
        .nav-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: var(--primary);
            transition: width var(--transition-normal);
            border-radius: var(--border-radius-sm);
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        .nav-link:hover:before {
            width: 70%;
        }
        
        .nav-link.active {
            color: var(--primary);
        }
        
        .nav-link.active:before {
            width: 70%;
        }
        
        /* Special Nav Items */
        .nav-link.promo {
            color: var(--primary);
            font-weight: 600;
            animation: pulse 2s infinite;
        }
        
        .nav-link.promo:after {
            content: 'HOT';
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--error);
            color: var(--white);
            font-size: 0.6rem;
            padding: 2px 5px;
            border-radius: var(--border-radius-sm);
        }
        
        .nav-link.cart {
            position: relative;
        }
        
        .cart-icon {
            font-size: 1.2rem;
            margin-right: var(--spacing-xs);
        }
        
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--primary);
            color: var(--white);
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: var(--border-radius-round);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        /* User Menu */
        .user-menu {
            position: relative;
        }
        
        .user-menu-toggle {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-sm) var(--spacing-md);
            background-color: var(--light-gray);
            border-radius: var(--border-radius-lg);
            cursor: pointer;
            transition: var(--transition-normal);
        }
        
        .user-menu-toggle:hover {
            background-color: var(--medium-gray);
        }
        
        .user-avatar {
            width: 30px;
            height: 30px;
            background-color: var(--primary-light);
            border-radius: var(--border-radius-round);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
        }
        
        .user-name {
            font-weight: 500;
            max-width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .dropdown-icon {
            font-size: 0.8rem;
            transition: var(--transition-normal);
        }
        
        .user-menu.active .dropdown-icon {
            transform: rotate(180deg);
        }
        
        .user-dropdown {
            position: absolute;
            top: calc(100% + var(--spacing-sm));
            right: 0;
            background-color: var(--white);
            border-radius: var(--border-radius-md);
            min-width: 200px;
            box-shadow: var(--shadow-lg);
            padding: var(--spacing-sm) 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition-normal);
            z-index: 100;
        }
        
        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
            padding: var(--spacing-sm) var(--spacing-md);
            color: var(--dark-gray);
            transition: var(--transition-fast);
        }
        
        .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }
        
        .dropdown-icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }
        
        .dropdown-divider {
            height: 1px;
            background-color: var(--medium-gray);
            margin: var(--spacing-xs) 0;
        }
        
        .dropdown-item.logout {
            color: var(--error);
        }
        
        /* Auth Buttons */
        .auth-buttons {
            display: flex;
            gap: var(--spacing-sm);
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: var(--spacing-sm) var(--spacing-lg);
            border-radius: var(--border-radius-md);
            font-weight: 600;
            transition: var(--transition-normal);
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
        }
        
        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            z-index: 1001;
        }
        
        .mobile-toggle span {
            display: block;
            width: 100%;
            height: 3px;
            background-color: var(--primary);
            border-radius: var(--border-radius-sm);
            transition: var(--transition-normal);
        }
        
        .mobile-toggle.active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }
        
        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        
        .mobile-toggle.active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }
        
        /* Animations */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .mobile-toggle {
                display: flex;
            }
            
            .nav-container {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 400px;
                height: 100vh;
                background-color: var(--white);
                flex-direction: column;
                align-items: flex-start;
                justify-content: flex-start;
                padding: 80px var(--spacing-lg) var(--spacing-lg);
                box-shadow: var(--shadow-xl);
                transition: right var(--transition-slow);
                z-index: 1000;
                gap: var(--spacing-xl);
            }
            
            .nav-container.active {
                right: 0;
            }
            
            .nav-list {
                flex-direction: column;
                width: 100%;
            }
            
            .nav-item {
                width: 100%;
            }
            
            .nav-link {
                padding: var(--spacing-md) 0;
                width: 100%;
                border-bottom: 1px solid var(--medium-gray);
            }
            
            .nav-link:before {
                display: none;
            }
            
            .auth-buttons {
                width: 100%;
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
            
            .user-menu {
                width: 100%;
            }
            
            .user-menu-toggle {
                width: 100%;
                justify-content: space-between;
            }
            
            .user-dropdown {
                position: static;
                width: 100%;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                margin-top: var(--spacing-sm);
                display: none;
            }
            
            .user-menu.active .user-dropdown {
                display: block;
            }
            
            /* Overlay for mobile menu */
            .menu-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: var(--transition-normal);
            }
            
            .menu-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }
        
        @media (max-width: 576px) {
            .logo-text {
                font-size: 1.2rem;
            }
            
            .nav-container {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <header class="header">
            <div class="container">
                <nav class="navbar">
                    <a href="{{ url('/') }}" class="logo">
                        <div class="">
                            <img width="80px" src="gambar/logoayam.png" alt="">
                        </div>
                        <div class="logo-text">Ayam Goreng <span>JOSSSS</span></div>
                    </a>
                    
                    <div class="mobile-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    
                    <div class="nav-container">
                        <ul class="nav-list">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                    <i class="fas fa-home"></i> Beranda
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('menu') }}" class="nav-link {{ request()->is('menu*') ? 'active' : '' }}">
                                    <i class="fas fa-utensils"></i> Menu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('cart') }}" class="nav-link cart {{ request()->is('cart*') ? 'active' : '' }}">
                                    <i class="fas fa-shopping-cart cart-icon"></i> Keranjang
                                    <span class="cart-count">0</span>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a href="{{ url('contact') }}" class="nav-link {{ request()->is('contact*') ? 'active' : '' }}">
                                    <i class="fas fa-envelope"></i> Kontak
                                </a>
                            </li>
                        </ul>
                        
                        @if(!session()->has('user_id'))
                            <div class="auth-buttons">
                                <a href="{{ url('login') }}" class="btn btn-outline">Login</a>
                                <a href="{{ url('register') }}" class="btn btn-primary">Daftar</a>
                            </div>
                        @else
                            <div class="user-menu">
                                <div class="user-menu-toggle">
                                    <div class="user-avatar">
                                        {{ substr(session('user_name', Auth::user()->name), 0, 1) }}
                                    </div>
                                    <div class="user-name">{{ session('user_name', Auth::user()->name) }}</div>
                                    <i class="fas fa-chevron-down dropdown-icon"></i>
                                </div>
                                <div class="user-dropdown">
                                    <a href="{{ url('profile') }}" class="dropdown-item">
                                        <i class="fas fa-user dropdown-icon"></i>
                                        <span>Profil Saya</span>
                                    </a>
                                    <a href="{{ route('orders.index') }}" class="dropdown-item">
                                        <i class="fas fa-shopping-bag dropdown-icon"></i>
                                        <span>Pesanan Saya</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ url('logout') }}" class="dropdown-item logout">
                                        <i class="fas fa-sign-out-alt dropdown-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </header>
        
        <div class="menu-overlay"></div>
        
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileToggle = document.querySelector('.mobile-toggle');
            const navContainer = document.querySelector('.nav-container');
            const menuOverlay = document.querySelector('.menu-overlay');
            
            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    this.classList.toggle('active');
                    navContainer.classList.toggle('active');
                    menuOverlay.classList.toggle('active');
                    document.body.classList.toggle('no-scroll');
                });
            }
            
            if (menuOverlay) {
                menuOverlay.addEventListener('click', function() {
                    mobileToggle.classList.remove('active');
                    navContainer.classList.remove('active');
                    menuOverlay.classList.remove('active');
                    document.body.classList.remove('no-scroll');
                });
            }
            
            // User dropdown on mobile
            const userMenuToggle = document.querySelector('.user-menu-toggle');
            const userMenu = document.querySelector('.user-menu');
            
            if (userMenuToggle && window.innerWidth < 992) {
                userMenuToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    userMenu.classList.toggle('active');
                });
            }
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (userMenu && !userMenu.contains(e.target) && window.innerWidth < 992) {
                    userMenu.classList.remove('active');
                }
            });
            
            // Update cart count (example)
            function updateCartCount() {
                // This would typically be an AJAX call to get the current cart count
                const cartCount = document.querySelector('.cart-count');
                if (cartCount) {
                    // For demo purposes, we'll just set a random number
                    const count = Math.floor(Math.random() * 5);
                    cartCount.textContent = count;
                    
                    // Hide the count if it's zero
                    if (count === 0) {
                        cartCount.style.display = 'none';
                    } else {
                        cartCount.style.display = 'flex';
                    }
                }
            }
            
            // Call once on page load
            updateCartCount();
        });
    </script>
</body>

</html>