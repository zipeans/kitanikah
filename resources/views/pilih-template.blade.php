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
        {{-- Kode header Anda tidak perlu diubah --}}
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
                        <a href="{{ route('editor.create', ['template_title' => $template->title]) }}" class="bg-sienna-600 text-white font-bold py-2 px-5 rounded-lg text-sm hover:bg-sienna-700">Pilih</a>
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