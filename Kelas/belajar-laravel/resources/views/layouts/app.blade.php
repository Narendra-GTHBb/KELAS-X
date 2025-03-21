<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Website Statis</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">Website Statis</div>
            <nav class="nav">
                <a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('profile') }}" class="{{ Request::routeIs('profile') ? 'active' : '' }}">Profil</a>
                <a href="{{ route('departments') }}" class="{{ Request::routeIs('departments') ? 'active' : '' }}">Jurusan</a>
                <a href="{{ route('contact') }}" class="{{ Request::routeIs('contact') ? 'active' : '' }}">Kontak</a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Website Statis Laravel. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>