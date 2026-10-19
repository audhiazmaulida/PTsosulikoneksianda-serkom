<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Solusi Koneksi Anda')</title>
    <meta name="description" content="@yield('description', 'PT Solusi Koneksi Anda - Penyedia solusi teknologi informasi dan jaringan untuk bisnis Anda')">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased">

    @include('layouts.partials.navbar')
    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    @stack('scripts')
</body>
</html>