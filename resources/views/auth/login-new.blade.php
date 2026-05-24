<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - SIPUS PGRI Cibinong</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-oQAYd8DyQCBbgIK+Y6vrnqU3H6FYk4FaORh7j8MN3H4P9+MqA0EsID7FdS73Ao8G" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo -->
            <div class="login-logo">
                <i class="bi bi-book-fill"></i>
                <div class="login-title">SIPUS PGRI</div>
                <div class="login-subtitle">Sistem Informasi Perpustakaan Sekolah</div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email" style="color: #1e293b; font-weight: 600;">Email</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="email"
                        placeholder="Masukkan email Anda"
                        class="form-control @error('email') is-invalid @enderror"
                    >
                    @error('email')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" style="color: #1e293b; font-weight: 600;">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        placeholder="Masukkan password Anda"
                        class="form-control @error('password') is-invalid @enderror"
                    >
                    @error('password')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group mb-3">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                    >
                    <label for="remember_me" style="color: #64748b; font-weight: 500;">
                        Ingat saya
                    </label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn">
                    <i class="bi bi-box-arrow-in-right"></i> MASUK
                </button>
            </form>

            <!-- Footer -->
            <div style="text-align: center; margin-top: 2rem; color: #64748b; font-size: 0.9rem;">
                <p style="margin: 0;">
                    <i class="bi bi-info-circle"></i>
                    SIPUS PGRI Cibinong © 2026
                </p>
            </div>
        </div>
    </div>
</body>
</html>
