<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Petugas - SIPUS PGRI</title>

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
                <i class="bi bi-pencil"></i> Edit Data Petugas
            </h1>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-lg-8">
                <div class="form-card">
                    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- NIP -->
                        <div class="mb-3">
                            <label for="nip" class="form-label">
                                <i class="bi bi-credit-card"></i> NIP
                            </label>
                            <input 
                                type="text" 
                                id="nip" 
                                name="nip" 
                                value="{{ old('nip', $petugas->nip) }}" 
                                class="form-control @error('nip') is-invalid @enderror" 
                                required
                            >
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                <i class="bi bi-person"></i> Nama
                            </label>
                            <input 
                                type="text" 
                                id="nama" 
                                name="nama" 
                                value="{{ old('nama', $petugas->nama) }}" 
                                class="form-control @error('nama') is-invalid @enderror" 
                                required
                            >
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                            <label for="jk" class="form-label">
                                <i class="bi bi-gender-ambiguous"></i> Jenis Kelamin
                            </label>
                            <select id="jk" name="jk" class="form-control @error('jk') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('jk', $petugas->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jk', $petugas->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                            <label for="telepon" class="form-label">
                                <i class="bi bi-telephone"></i> Telepon
                            </label>
                            <input 
                                type="text" 
                                id="telepon" 
                                name="telepon" 
                                value="{{ old('telepon', $petugas->telepon) }}" 
                                class="form-control @error('telepon') is-invalid @enderror"
                            >
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Perbarui
                            </button>
                            <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYd7+2N0K5cCaeXRJrH15S0jwGRaT1nY9X9JVo9" crossorigin="anonymous"></script>
</body>
</html>
