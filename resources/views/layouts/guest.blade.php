<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPUS PGRI Cibinong') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-oQAYd8DyQCBbgIK+Y6vrnqU3H6FYk4FaORh7j8MN3H4P9+MqA0EsID7FdS73Ao8G" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body class="login-page">
        <div class="login-layout d-flex align-items-center justify-content-center min-vh-100 px-3">
            {{ $slot }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYd7+2N0K5cCaeXRJrH15S0jwGRaT1nY9X9JVo9" crossorigin="anonymous"></script>
    </body>
</html>
