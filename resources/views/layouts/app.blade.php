<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Negeri 4 Bogor')</title>
    <meta name="description" content="@yield('description', 'Website resmi SMK Negeri 4 Bogor - Mewujudkan Generasi Berprestasi & Berkarakter')">

    {{-- CSRF token, dipakai nanti kalau ada form (kontak, login admin, dll) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vite akan compile app.css & app.js jadi satu file production nanti --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- CSS khusus per halaman, di-push dari masing-masing view lewat @stack --}}
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased">

    @include('layouts.partials.navbar')
    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    {{-- JS khusus per halaman --}}
    @stack('scripts')
</body>
</html>