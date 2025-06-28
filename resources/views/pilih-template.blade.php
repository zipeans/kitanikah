<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Template - KitaNikah</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #F9FAFB;
        }
        h1, h2, h3, .font-serif {
            font-family: 'Playfair Display', serif;
        }
        .filter-button.active {
            background-color: #A0522D;
            color: white;
            border-color: #A0522D;
        }
        .template-card {
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
        }
        .template-card.hide-card {
            opacity: 0;
            transform: scale(0.9);
            height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
            border: 0;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header dengan Logika Otentikasi -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-serif text-2xl font-bold text-gray-900">KitaNikah</a>
            
            <div class="flex items-center space-x-4">
                @auth
                    {{-- TAMPILAN JIKA PENGGUNA SUDAH LOGIN --}}
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2 text-sm font-medium text-gray-600 hover:text-sienna-600">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="open" @click.away="open = false" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                             style="display: none;">
                            
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                            <div class="border-t border-gray-100"></div>
                            <!-- Form untuk Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Keluar
                                </a>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- TAMPILAN JIKA PENGGUNA BELUM LOGIN --}}
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-sienna-600 transition duration-300">Login</a>
                    <a href="{{ route('register') }}" class="bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Daftar</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-6 py-16">
        <!-- Judul Halaman -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-3 font-serif">Pilih Template Impianmu</h1>
            <p class="text-gray-600 max-w-xl mx-auto">Setiap desain dirancang untuk menceritakan kisah unikmu. Mulai dari sini dan buat undangan yang tak terlupakan.</p>
        </div>

        <!-- Filter Section -->
        <div class="mb-10">
            <div class="flex flex-wrap items-center justify-center gap-2 md:gap-4" id="filter-container">
                <button data-filter="Semua" class="filter-button active text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">Semua</button>
                <button data-filter="Modern" class="filter-button text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">Modern</button>
                <button data-filter="Elegan" class="filter-button text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">Elegan</button>
                <button data-filter="Floral" class="filter-button text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">Floral</button>
                <button data-filter="Nusantara" class="filter-button text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">Nusantara</button>
            </div>
        </div>

        <!-- Galeri Template -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="template-gallery">
            @foreach ($templates as $template)
            <div class="template-card group relative overflow-hidden rounded-lg shadow-md cursor-pointer" data-categories="{{ implode(' ', $template['categories']) }}">
                <div class="h-[500px] w-full">
                    @if ($template['image_url'])
                        <img src="{{ $template['image_url'] }}" alt="Template {{ $template['title'] }}" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center p-4 transform transition-transform duration-500 group-hover:scale-110" style="background-color: {{ $template['default_color'] }};">
                            <h3 class="font-serif text-3xl text-white/80 text-center drop-shadow-md">{{ $template['title'] }}</h3>
                        </div>
                    @endif
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-60 transition-all duration-300 flex flex-col items-center justify-center p-4 text-white opacity-0 group-hover:opacity-100">
                    <h3 class="font-serif text-2xl font-bold mb-4 text-center">{{ $template['title'] }}</h3>
                    <div class="space-x-2">
                        <a href="#" class="bg-white text-gray-800 font-bold py-2 px-5 rounded-lg text-sm hover:bg-gray-200">Lihat Preview</a>
                        <a href="{{ route('editor.create', ['template_title' => $template['title']]) }}" class="bg-sienna-600 text-white font-bold py-2 px-5 rounded-lg text-sm hover:bg-sienna-700">Pilih</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10 mt-16">
        <div class="container mx-auto px-6 text-center">
            <p class="font-serif text-xl mb-2">KitaNikah</p>
            <p>&copy; {{ date('Y') }} KitaNikah. Dibuat dengan ❤ di Indonesia untuk hari bahagiamu.</p>
        </div>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterContainer = document.getElementById('filter-container');
            const gallery = document.getElementById('template-gallery');
            const templateCards = gallery.querySelectorAll('.template-card');

            if (!filterContainer) return;

            filterContainer.addEventListener('click', function(event) {
                if (!event.target.classList.contains('filter-button')) {
                    return;
                }
                
                filterContainer.querySelector('.active').classList.remove('active');
                event.target.classList.add('active');

                const selectedFilter = event.target.dataset.filter;

                templateCards.forEach(card => {
                    const categories = card.dataset.categories;
                    
                    if (selectedFilter === 'Semua' || categories.includes(selectedFilter)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
