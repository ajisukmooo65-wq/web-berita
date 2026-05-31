<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'News Portal'))</title>

    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" type="module" defer></script>
    @endif
</head>
<body class="bg-light">
    <header class="bg-white shadow-sm border-bottom">
        <div class="container py-3 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
            <a href="{{ route('front.home') }}" class="text-decoration-none text-dark d-flex align-items-center gap-2">
                <span class="fs-4 fw-bold text-primary">NewsPortal</span>
            </a>
            <nav class="nav gap-3">
                <a class="nav-link text-secondary" href="{{ route('front.home') }}">Home</a>
                <a class="nav-link text-secondary" href="{{ route('front.news.index') }}">News</a>
                <a class="nav-link text-secondary" href="{{ route('front.about') }}">About</a>
                <a class="nav-link text-secondary" href="{{ route('front.contact') }}">Contact</a>
            </nav>
            <div class="d-flex align-items-center gap-2">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary btn-sm">Admin</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-secondary btn-sm" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="py-5">
        @yield('content')
    </main>

    <footer class="bg-white border-top py-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <span class="text-muted">© {{ date('Y') }} {{ config('app.name', 'News Portal') }}. All rights reserved.</span>
            <div class="d-flex gap-3 text-muted small">
                <a href="{{ route('front.about') }}" class="text-muted text-decoration-none">About</a>
                <a href="{{ route('front.contact') }}" class="text-muted text-decoration-none">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>
