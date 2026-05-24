<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Detail Petugas - SIPUS PGRI</title>

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
        <!-- Header -->
        <div class="dashboard-header mb-4">
            <h1 class="dashboard-title">
                <i class="bi bi-person-badge"></i> Detail Data Petugas
            </h1>
        </div>

        <!-- Detail Card -->
        <div class="row">
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="mb-4">
                        <h3 class="mb-3">{{ $petugas->nama }}</h3>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-credit-card"></i> NIP</label>
                            <p>{{ $petugas->nip }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</label>
                            <p>
                                <span class="badge" style="background-color: #2563eb; color: white;">
                                    {{ $petugas->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-telephone"></i> Telepon</label>
                        <p>{{ $petugas->telepon ?? '-' }}</p>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">
                        <a href="{{ route('petugas.edit', $petugas->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
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
