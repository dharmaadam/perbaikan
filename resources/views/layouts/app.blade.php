<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perbaikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow mb-4">
        <div class="container">
            {{-- Kalau login → ke dashboard, kalau belum login → ke login --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ auth()->check() ? route('admin.dashboard') : route('login.form') }}">
                <img src="{{ asset('images/logo ITcare.png') }}" alt="Logo" width="40" height="40" class="me-2 rounded">
                Aplikasi Perbaikan
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                                <a href="{{ route('barang.index') }}" class="nav-link">Barang</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengajuanperbaikan.index') }}" class="nav-link">Pengajuan</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('laporan.index') }}" class="nav-link">Laporan</a>
                            </li>
                            @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link">Manajemen User</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.teknisi.index') }}" class="nav-link">Teknisi</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pemeriksaanrutin.index') }}" class="nav-link">Pemeriksaan Rutin</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link text-danger fw-bold">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login.form') }}" class="btn btn-outline-light">Login</a>
                            </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- Konten tiap halaman --}}
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
