<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPUS PGRI') }} - Dashboard</title>

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

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> {{ $message }}
                </div>
            @endif

            <!-- Page Header -->
            @if (isset($header))
                <div class="dashboard-header">
                    {{ $header }}
                </div>
            @endif

            <!-- Page Content -->
            {{ $slot }}
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYd7+2N0K5cCaeXRJrH15S0jwGRaT1nY9X9JVo9" crossorigin="anonymous"></script>
    </body>
</html>
