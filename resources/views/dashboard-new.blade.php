<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIPUS PGRI - Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-oQAYd8DyQCBbgIK+Y6vrnqU3H6FYk4FaORh7j8MN3H4P9+MqA0EsID7FdS73Ao8G" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="main-content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <i class="bi bi-check-circle"></i> {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-circle"></i> {{ $message }}
            </div>
        @endif

        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1 class="dashboard-title">
                <i class="bi bi-speedometer2"></i> Dashboard
            </h1>
            <p class="dashboard-subtitle">Selamat Datang di SIPUS PGRI Cibinong</p>
        </div>

        <!-- Statistics Row -->
        <div class="row">
            <!-- Total Buku -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card blue">
                    <div class="stat-icon blue">
                        <i class="bi bi-collection-fill"></i>
                    </div>
                    <div class="stat-number">{{ $totalBooks }}</div>
                    <div class="stat-label">Total Buku</div>
                </div>
            </div>

            <!-- Total Siswa -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card green">
                    <div class="stat-icon green">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-number">{{ $totalStudents }}</div>
                    <div class="stat-label">Total Siswa</div>
                </div>
            </div>

            <!-- Total Peminjaman -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card yellow">
                    <div class="stat-icon yellow">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="stat-number">{{ $totalBorrowings }}</div>
                    <div class="stat-label">Total Peminjaman</div>
                </div>
            </div>

            <!-- Buku Dipinjam -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card red">
                    <div class="stat-icon red">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="stat-number">{{ $borrowedBooks }}</div>
                    <div class="stat-label">Sedang Dipinjam</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="table-container">
                    <h5 class="mb-3">
                        <i class="bi bi-lightning"></i> Aksi Cepat
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Buku
                        </a>
                        <a href="{{ route('students.create') }}" class="btn btn-primary">
                            <i class="bi bi-person-plus"></i> Tambah Siswa
                        </a>
                        <a href="{{ route('borrowings.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Input Peminjaman
                        </a>
                        <a href="{{ route('categories.create') }}" class="btn btn-secondary">
                            <i class="bi bi-tag"></i> Tambah Kategori
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYd7+2N0K5cCaeXRJrH15S0jwGRaT1nY9X9JVo9" crossorigin="anonymous"></script>
</body>
</html>
