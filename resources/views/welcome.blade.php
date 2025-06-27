<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-g">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KitaNikah - Undangan Pernikahan Digital Elegan & Interaktif</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased">

    <header class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-50 transition-all duration-300">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="font-serif text-2xl font-bold text-gray-900">KitaNikah</a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-gray-600 hover:text-sienna-600 transition-colors duration-300">Fitur</a>
                <a href="#designs" class="text-gray-600 hover:text-sienna-600 transition-colors duration-300">Desain</a>
                <a href="#pricing" class="text-gray-600 hover:text-sienna-600 transition-colors duration-300">Harga</a>
            </div>
            <a href="{{ route('pilih-template') }}" class="main-button bg-sienna-600 hover:bg-sienna-700 hover:shadow-lg text-white font-bold py-2 px-6 rounded-lg">Buat Undangan</a>
        </nav>
    </header>

    <main>
        <section class="hero-bg text-white py-28 md:py-40 relative">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-4" data-aos="fade-up">Bagikan Cerita Bahagia Anda</h1>
                <p class="text-lg md:text-xl max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="200">Buat undangan pernikahan digital yang elegan, interaktif, dan lebih dari sekadar pengumuman biasa.</p>
                <a href="#designs" class="main-button bg-white text-sienna-600 font-bold py-3 px-8 rounded-lg text-lg hover:bg-gray-200" data-aos="zoom-in" data-aos-delay="400">Jelajahi Desain</a>
            </div>
        </section>

        <section id="features" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-3">Dirancang untuk Momen Sempurna</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Fitur lengkap untuk mempermudah persiapan dan memberikan pengalaman terbaik bagi tamu Anda.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center p-6 bg-gray-50 rounded-lg shadow-md feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-sienna-600 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center mb-4"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg></div><h3 class="text-xl font-bold mb-2">RSVP Online</h3><p class="text-gray-600">Tamu dapat konfirmasi kehadiran dengan mudah, dan Anda mendapatkan rekapitulasi real-time.</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-lg shadow-md feature-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-sienna-600 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center mb-4"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg></div><h3 class="text-xl font-bold mb-2">Amplop Digital</h3><p class="text-gray-600">Berikan kemudahan bagi tamu untuk mengirimkan hadiah langsung ke rekening atau e-wallet Anda.</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-lg shadow-md feature-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-sienna-600 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center mb-4"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div><h3 class="text-xl font-bold mb-2">Galeri Cerita</h3><p class="text-gray-600">Bagikan momen pre-wedding dan perjalanan cinta Anda dalam timeline dan galeri yang indah.</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-lg shadow-md feature-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-sienna-600 text-white w-16 h-16 rounded-full mx-auto flex items-center justify-center mb-4"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L15.232 5.232z"></path></svg></div><h3 class="text-xl font-bold mb-2">Buku Tamu Digital</h3><p class="text-gray-600">Abadikan doa dan ucapan dari teman dan keluarga langsung di halaman undangan Anda.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="designs" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-3">Desain yang Mewakili Anda</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Pilih tema yang paling sesuai dengan kepribadian dan cerita cinta Anda.</p>
                </div>
                
                <div class="splide" id="design-carousel" aria-label="Contoh Desain Undangan" data-aos="fade-up" data-aos-delay="200">
                    <div class="splide__track">
                        <ul class="splide__list">

                            @foreach ($designThemes as $theme)
                            <li class="splide__slide p-4">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden group design-card h-full flex flex-col">
                                    
                                    {{-- Bagian Atas Kartu (Gambar atau Warna Default) --}}
                                    <div class="h-64 w-full">
                                        @if ($theme['image_url'])
                                            {{-- JIKA GAMBAR ADA: Tampilkan gambar --}}
                                            <img src="{{ $theme['image_url'] }}" alt="{{ $theme['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            {{-- JIKA GAMBAR KOSONG: Tampilkan div dengan warna default --}}
                                            <div class="w-full h-full flex items-center justify-center p-4" style="background-color: {{ $theme['default_color'] }};">
                                                <h3 class="font-serif text-3xl text-white/80 text-center">{{ $theme['title'] }}</h3>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Bagian Bawah Kartu (Deskripsi) --}}
                                    <div class="p-6 flex-grow">
                                        <h3 class="text-xl font-bold">{{ $theme['title'] }}</h3>
                                        <p class="text-gray-600 mt-2">{{ $theme['description'] }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="pricing" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-3">Pilih Paket Terbaik Anda</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Harga transparan tanpa biaya tersembunyi. Satu harga untuk semua kebahagiaan.</p>
                </div>
                <div class="grid lg:grid-cols-3 gap-8 max-w-5xl mx-auto items-start">
                    <div class="border rounded-lg p-8 flex flex-col pricing-card bg-gray-50" data-aos="fade-right" data-aos-delay="200">
                        <h3 class="text-2xl font-bold text-center">Basic</h3>
                        <p class="text-gray-500 text-center mt-2">Untuk mencoba fitur kami</p>
                        <div class="text-center my-6"><span class="text-4xl font-bold">Gratis</span></div>
                        <ul class="space-y-4 text-gray-600 flex-grow mb-8">
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>5 Template Dasar</li>
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>Hitung Mundur Acara</li>
                            <li class="flex items-center text-gray-400"><span class="text-red-500 mr-3">✗</span>Tanpa RSVP Online</li>
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>Dengan Watermark KitaNikah</li>
                        </ul>
                        <a href="#" class="main-button mt-auto w-full text-center bg-gray-200 text-gray-800 font-bold py-3 px-6 rounded-lg hover:bg-gray-300">Mulai Gratis</a>
                    </div>
                    <div class="popular-plan rounded-lg p-8 flex flex-col shadow-xl pricing-card" data-aos="fade-up">
                        <span class="popular-badge">PALING POPULER</span>
                        <h3 class="text-2xl font-bold text-center">Premium</h3>
                        <p class="text-gray-500 text-center mt-2">Semua yang Anda butuhkan</p>
                        <div class="text-center my-6"><span class="text-4xl font-bold text-sienna-600">Rp 199rb</span><span class="text-gray-500"> /sekali bayar</span></div>
                        <ul class="space-y-4 text-gray-600 flex-grow mb-8">
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>25+ Template Premium</li>
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>RSVP & Manajemen Tamu</li>
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>Galeri Foto & Cerita</li>
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>Tanpa Watermark</li>
                        </ul>
                        <a href="#" class="main-button mt-auto w-full text-center bg-sienna-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-sienna-700">Pilih Premium</a>
                    </div>
                    <div class="border rounded-lg p-8 flex flex-col pricing-card bg-gray-50" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="text-2xl font-bold text-center">Platinum</h3>
                        <p class="text-gray-500 text-center mt-2">Fitur paling lengkap</p>
                        <div class="text-center my-6"><span class="text-4xl font-bold">Rp 349rb</span><span class="text-gray-500"> /sekali bayar</span></div>
                        <ul class="space-y-4 text-gray-600 flex-grow mb-8">
                            <li class="flex items-center"><span class="text-green-500 mr-3">✓</span>Semua Fitur Premium</li>
                            <li class="flex items-center font-bold"><span class="text-green-500 mr-3">✓</span>Fitur Amplop Digital</li>
                            <li class="flex items-center font-bold"><span class="text-green-500 mr-3">✓</span>Buku Tamu Digital</li>
                            <li class="flex items-center font-bold"><span class="text-green-500 mr-3">✓</span>Dukungan Prioritas</li>
                        </ul>
                        <a href="#" class="main-button mt-auto w-full text-center bg-gray-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-900">Pilih Platinum</a>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="bg-sienna-50 py-20">
            <div class="container mx-auto px-6 text-center" data-aos="zoom-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Mulai Merangkai Momen Anda Hari Ini</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mb-8">Hanya butuh beberapa menit untuk membuat undangan yang akan dikenang selamanya. Coba sekarang, gratis!</p>
                <a href="#pricing" class="main-button bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-8 rounded-lg text-lg">Ciptakan Undangan Anda</a>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-6 text-center">
            <p class="font-serif text-xl mb-2">KitaNikah</p>
            <p class="text-gray-400">&copy; {{ date('Y') }} KitaNikah. Dibuat dengan ❤ di Indonesia untuk hari bahagiamu.</p>
        </div>
    </footer>
    
</body>
</html>