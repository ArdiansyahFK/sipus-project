<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPUS-PGRI') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-oQAYd8DyQCBbgIK+Y6vrnqU3H6FYk4FaORh7j8MN3H4P9+MqA0EsID7FdS73Ao8G" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body class="min-h-screen bg-slate-100 text-slate-900 antialiased" x-data="{ mobileOpen: false }">
        <div class="min-h-screen">
            @include('partials.sidebar')
            @include('partials.navbar')
            <main class="lg:ml-64 pt-24 pb-10 px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-7xl">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
