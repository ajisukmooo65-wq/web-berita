<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | {{ config('app.name', 'Laravel') }}</title>

    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" type="module" defer></script>
    @endif
</head>
<body class="bg-light admin-shell">
    <div class="d-flex min-vh-100">
        <aside class="admin-sidebar bg-white border-end shadow-sm d-flex flex-column">
            <div class="sidebar-brand px-4 py-4 border-bottom">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none d-flex align-items-center gap-2">
                    <div class="fs-4 fw-bold text-primary">NewsPortal</div>
                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary">Admin</span>
                </a>
            </div>
            <div class="px-3 py-4">
                <div class="small text-uppercase text-muted mb-3">Workspace</div>
                <nav class="nav flex-column gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link rounded d-flex align-items-center justify-content-between px-3 py-2 {{ request()->routeIs('admin.dashboard') ? 'active bg-primary bg-opacity-10 text-primary fw-semibold' : 'text-secondary' }}">
                        <span>Dashboard</span>
                        <span class="badge bg-primary bg-opacity-15 text-primary rounded-pill">New</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="nav-link rounded px-3 py-2 {{ request()->routeIs('admin.users.*') ? 'active bg-primary bg-opacity-10 text-primary fw-semibold' : 'text-secondary' }}">Users</a>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link rounded px-3 py-2 {{ request()->routeIs('admin.categories.*') ? 'active bg-primary bg-opacity-10 text-primary fw-semibold' : 'text-secondary' }}">Categories</a>
                    <a href="{{ route('admin.articles.index') }}" class="nav-link rounded px-3 py-2 {{ request()->routeIs('admin.articles.*') ? 'active bg-primary bg-opacity-10 text-primary fw-semibold' : 'text-secondary' }}">Articles</a>
                </nav>
            </div>
            <div class="mt-auto px-3 pb-4">
                <div class="small text-muted mb-1">Logged in as</div>
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <div class="text-muted small">{{ auth()->user()->email }}</div>
            </div>
        </aside>

        <div class="admin-content flex-grow-1 d-flex flex-column">
            <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 px-lg-4 py-3">
                <div class="container-fluid px-0">
                    <button class="btn btn-outline-secondary d-lg-none me-2" id="sidebarToggle" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button>
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <span class="badge rounded-pill bg-soft-primary text-primary">Premium</span>
                        <div class="text-muted">Modern admin interface for the news portal.</div>
                    </div>

                    <div class="ms-auto d-flex align-items-center gap-3">
                        <div class="d-none d-md-flex align-items-center gap-2 text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
                                <path d="M4 .5a.5.5 0 0 1 .5.5V2h7V1a.5.5 0 0 1 1 0V2h.5A1.5 1.5 0 0 1 14 3.5V4h-12v-.5A1.5 1.5 0 0 1 3.5 2H4V1a.5.5 0 0 1 .5-.5zM1 5h14v8.5A1.5 1.5 0 0 1 13.5 15h-11A1.5 1.5 0 0 1 1 13.5V5zm1 1v7.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V6H2z"/>
                            </svg>
                            <span class="small">{{ now()->format('l, d M Y') }}</span>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow-1 p-3 p-lg-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function () {
            document.querySelector('.admin-sidebar')?.classList.toggle('show');
        });
    </script>

    @stack('scripts')
</body>
</html>
