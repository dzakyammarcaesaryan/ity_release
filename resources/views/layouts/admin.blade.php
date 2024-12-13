<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan & Penerbitan Buku - ITY Press</title>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            transition: all 0.3s;
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 10px 20px;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            border-left-color: #007bff;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
        }
        .stats-card {
            transition: transform 0.3s;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="text-center mb-4">
              <a href="{{ url('/admin/dashboard') }}">
                <img src="{{ asset('landing-page/assets/img/navbar-brand-ity.png') }}" alt="ITY Press" class="img-fluid" style="max-width: 80%; height: auto;">
            </a>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#dashboard"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link" href="{{ url('/datapenjualan') }}"><i class="fas fa-chart-line"></i> Penjualan</a>
            <a class="nav-link" href=""><i class="fas fa-book"></i> Data Buku</a>
            <a class="nav-link" href="#publishing"><i class="fas fa-print"></i> Penerbitan</a>
            <a class="nav-link" href="#authors"><i class="fas fa-users"></i> Authors</a>
            <a class="nav-link" href="#settings"><i class="fas fa-cog"></i> Pengaturan</a>
        </nav>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm">
            <div class="container-fluid">
                <span class="navbar-brand">Admin Dashboard</span>
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#profile">Profile</a></li>
                            <li><a class="dropdown-item" href="#logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content Section -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
