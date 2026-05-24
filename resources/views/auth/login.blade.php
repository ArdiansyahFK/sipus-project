<x-guest-layout>
    <div class="login-card">
        <div class="login-logo">
            <i class="bi bi-book-half"></i>
        </div>
        <h2 class="login-title">SIPUS PGRI Cibinong</h2>
        <p class="login-subtitle">Sistem Informasi Perpustakaan Sekolah</p>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope"></i></span>
                    <input id="email" class="form-control border-start-0" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com" />
                </div>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock"></i></span>
                    <input id="password" class="form-control border-start-0" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" />
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary w-100 login-btn">
                <i class="bi bi-box-arrow-in-right"></i> Masuk
            </button>
        </form>
    </div>
</x-guest-layout>
