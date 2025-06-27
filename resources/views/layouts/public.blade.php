<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman akan diambil dari view yang menggunakannya --}}
    <title>@yield('title', 'KitaNikah')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Tempat untuk style khusus per halaman --}}
    @stack('styles')
</head>
<body class="text-gray-800">

    {{-- INI ADALAH PERUBAHAN KUNCI --}}
    {{-- Livewire akan menyuntikkan konten komponen ke dalam slot ini --}}
    {{ $slot }}

    {{-- Tempat untuk script khusus per halaman --}}
    @stack('scripts')
    @livewireScripts 
</body>
</html>
