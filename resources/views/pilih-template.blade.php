<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Template - KitaNikah</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .filter-button.active {
            background-color: #A0522D;
            color: white;
            border-color: #A0522D;
        }
        .template-card {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .card-hidden {
            opacity: 0;
            transform: scale(0.95);
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-serif text-2xl font-bold text-gray-900">KitaNikah</a>

            <div class="flex items-center space-x-4">
                @auth
                    {{-- ===== PANEL PENGGUNA YANG LEBIH MENARIK ===== --}}
                    <div x-data="{ open: false }" class="relative">
                        {{-- Tombol Avatar Pengguna --}}
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="text-sm font-medium text-gray-600 hover:text-sienna-600">{{ Auth::user()->name }}</span>
                            {{-- Avatar Placeholder --}}
                            <div class="w-8 h-8 rounded-full bg-sienna-200 text-sienna-700 flex items-center justify-center font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 z-50 border"
                            style="display: none;">

                            <div class="px-4 py-3 border-b">
                                <p class="text-sm leading-5">Masuk sebagai</p>
                                <p class="text-sm font-medium leading-5 text-gray-900 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                {{-- Ikon Dashboard --}}
                                <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M4 6h16M4 18h16" /></svg>
                                Dashboard
                            </a>
                            <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                {{-- Ikon Profil --}}
                                <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Profil
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    {{-- Ikon Keluar --}}
                                    <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    Keluar
                                </a>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Tampilan jika belum login --}}
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-sienna-600 transition duration-300">Login</a>
                    <a href="{{ route('register') }}" class="hidden sm:inline-block bg-gray-800 hover:bg-black text-white font-bold py-2 px-6 rounded-lg transition duration-300">Daftar</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-3 font-serif">Pilih Template Impianmu</h1>
            <p class="text-gray-600 max-w-xl mx-auto">Setiap desain dirancang untuk menceritakan kisah unikmu.</p>
        </div>

        <div class="mb-10">
            <div class="flex flex-wrap items-center justify-center gap-2 md:gap-4" id="filter-container">
                {{-- Tombol "Semua" selalu ada --}}
                <button data-filter="Semua" class="filter-button active text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">Semua</button>

                {{-- Loop melalui kategori dari database untuk membuat tombol filter --}}
                @foreach ($categories as $category)
                    <button data-filter="{{ $category }}" class="filter-button text-sm md:text-base font-semibold px-4 py-2 border border-gray-300 rounded-full transition duration-300 hover:bg-gray-200">{{ $category }}</button>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="template-gallery">
            @foreach ($templates as $template)
            <div class="template-card group relative overflow-hidden rounded-lg shadow-md cursor-pointer" data-category="{{ $template->category }}">
                <div class="h-[500px] w-full">
                    <img src="{{ asset('storage/'.$template->thumbnail_path) }}" alt="Template {{ $template->title }}" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-60 transition-all duration-300 flex flex-col items-center justify-center p-4 text-white opacity-0 group-hover:opacity-100">
                    <h3 class="font-serif text-2xl font-bold mb-4 text-center">{{ $template->title }}</h3>
                    <div class="space-x-2">
                        <a href="{{ route('template.preview', ['template' => $template->id]) }}" target="_blank" class="bg-white text-gray-800 font-bold py-2 px-5 rounded-lg text-sm hover:bg-gray-200">Lihat Preview</a>
                        {{-- DEBUGGING: Add a dd() here to see the generated URL --}}
                        <a href="{{ route('editor.create', ['template_slug' => $template->slug]) }}"
                           class="bg-sienna-600 text-white font-bold py-2 px-5 rounded-lg text-sm hover:bg-sienna-700">
                           Pilih {{ $template->slug }}
                           {{-- You can temporarily add this to see the generated URL in the HTML source --}}
                           {{-- {{ dd(route('editor.create', ['template_slug' => $template->slug])) }} --}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-10 mt-16">
        {{-- Kode footer Anda tidak perlu diubah --}}
    </footer>

    {{-- Logika JavaScript untuk filter tidak perlu diubah --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterContainer = document.getElementById('filter-container');
            const gallery = document.getElementById('template-gallery');
            if (!filterContainer || !gallery) return;
            const templateCards = gallery.querySelectorAll('.template-card');
            filterContainer.addEventListener('click', function(event) {
                if (!event.target.matches('.filter-button')) return;
                filterContainer.querySelector('.active').classList.remove('active');
                event.target.classList.add('active');
                const selectedFilter = event.target.dataset.filter;
                templateCards.forEach(card => {
                    const cardCategory = card.dataset.category;
                    if (selectedFilter === 'Semua' || cardCategory === selectedFilter) {
                        card.classList.remove('card-hidden');
                    } else {
                        card.classList.add('card-hidden');
                    }
                });
            });
        });
    </script>
</body>
</html>
