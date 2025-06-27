{{-- Menggunakan layout publik yang baru dibuat --}}
@extends('layouts.public')

{{-- Mengatur judul spesifik untuk halaman ini --}}
@section('title', 'Editor Undangan - KitaNikah')

{{-- Menambahkan style khusus untuk halaman ini --}}
@push('styles')
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #F9FAFB;
    }
    .font-serif {
        font-family: 'Playfair Display', serif;
    }
    .font-script {
         font-family: 'Dancing Script', cursive;
    }
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-in-out;
    }
    .editor-panel::-webkit-scrollbar {
        width: 8px;
    }
    .editor-panel::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .editor-panel::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
    }
    .editor-panel::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
</style>
@endpush


{{-- Mendefinisikan konten utama halaman --}}
@section('content')
<div class="flex h-screen bg-gray-100">

    <!-- Panel Kiri: Form Editor -->
    <aside class="w-1/3 h-screen bg-white shadow-lg flex flex-col editor-panel overflow-y-auto">
        <!-- Header Panel -->
        <div class="p-6 border-b border-gray-200 sticky top-0 bg-white z-10">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold font-serif">Editor Undangan</h2>
                    <p class="text-sm text-gray-500">Template: <span class="font-semibold text-sienna-600">{{ $template_title }}</span></p>
                </div>
                <a href="{{ route('pilih-template') }}" class="text-sm text-gray-600 hover:text-sienna-600">&larr; Kembali</a>
            </div>
        </div>

        <!-- Accordion Sections -->
        <div class="flex-grow p-6 space-y-4">
            
            <!-- Accordion 1: Info Mempelai -->
            <div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
                <button class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
                    <span>1. Info Mempelai</span>
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content">
                    <div class="p-4 border-t border-gray-200 space-y-4">
                        <div>
                            <label for="groom_nickname" class="text-sm font-medium">Nama Panggilan Pria</label>
                            <input id="groom_nickname" type="text" placeholder="Contoh: Budi" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sienna-600 focus:border-transparent" data-target="groom-nickname-preview">
                        </div>
                        <div>
                            <label for="bride_nickname" class="text-sm font-medium">Nama Panggilan Wanita</label>
                            <input id="bride_nickname" type="text" placeholder="Contoh: Ani" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="bride-nickname-preview">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion 2: Detail Acara -->
            <div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
                <button class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
                    <span>2. Detail Acara</span>
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content">
                    <div class="p-4 border-t border-gray-200 space-y-4">
                        <h4 class="font-semibold">Akad Nikah / Pemberkatan</h4>
                        <div>
                            <label for="akad_date" class="text-sm font-medium">Tanggal</label>
                            <input id="akad_date" type="date" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="akad-date-preview">
                        </div>
                         <div>
                            <label for="akad_time" class="text-sm font-medium">Waktu</label>
                            <input id="akad_time" type="time" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="akad-time-preview">
                        </div>
                         <div>
                            <label for="akad_location" class="text-sm font-medium">Lokasi</label>
                            <textarea id="akad_location" placeholder="Contoh: Masjid Istiqlal, Jakarta" rows="2" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="akad-location-preview"></textarea>
                        </div>
                        <hr>
                        <h4 class="font-semibold">Resepsi</h4>
                         <div>
                            <label for="resepsi_date" class="text-sm font-medium">Tanggal</label>
                            <input id="resepsi_date" type="date" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="resepsi-date-preview">
                        </div>
                         <div>
                            <label for="resepsi_time" class="text-sm font-medium">Waktu</label>
                            <input id="resepsi_time" type="time" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="resepsi-time-preview">
                        </div>
                         <div>
                            <label for="resepsi_location" class="text-sm font-medium">Lokasi</label>
                            <textarea id="resepsi_location" placeholder="Contoh: Gedung Balai Kartini, Jakarta" rows="2" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="resepsi-location-preview"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Accordion 3: Galeri & Cerita -->
            <div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
                <button class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
                    <span>3. Galeri Foto & Cerita</span>
                    <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="accordion-content">
                   <div class="p-4 border-t border-gray-200 space-y-4">
                       <div>
                           <label for="love_story" class="text-sm font-medium">Cerita Cintamu</label>
                           <textarea id="love_story" placeholder="Ceritakan bagaimana kalian bertemu..." rows="5" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="love-story-preview"></textarea>
                       </div>
                       <div>
                            <label for="photo_upload" class="text-sm font-medium">Upload Foto Utama</label>
                            <div class="mt-1">
                                <input id="photo_upload" type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sienna-600 file:text-white hover:file:bg-sienna-700" accept="image/*">
                            </div>
                       </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Tombol Aksi di Footer dengan Pengecekan Login -->
        <div class="p-6 border-t border-gray-200 sticky bottom-0 bg-white z-10">
            <div class="flex justify-between">
                @auth
                    {{-- TAMPILAN UNTUK PENGGUNA YANG SUDAH LOGIN --}}
                    {{-- Nanti tombol ini bisa dihubungkan dengan method Livewire --}}
                    <button type="button" class="text-center bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        Simpan Draft
                    </button>
                    <button type="button" class="text-center bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        Publikasikan
                    </button>
                @else
                    {{-- TAMPILAN UNTUK PENGGUNA YANG BELUM LOGIN (TAMU) --}}
                    <a href="{{ route('login') }}" class="text-center bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Simpan Draft</a>
                    <a href="{{ route('register') }}" class="text-center bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Publikasikan</a>
                @endauth
            </div>
        </div>
    </aside>

    <!-- Panel Kanan: Live Preview -->
    <main class="w-2/3 h-screen bg-gray-200 flex flex-col items-center justify-center p-8">
        <div class="w-full h-full bg-white rounded-lg shadow-2xl">
            <iframe id="preview-iframe" class="w-full h-full rounded-lg"></iframe>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    // --- TEMPLATE UNTUK PREVIEW ---
    const previewTemplate = `
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"><\/script>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
            <style>
                body { font-family: 'Montserrat', sans-serif; background-color: #EAE0D5; color: #5D4037; }
                .font-serif { font-family: 'Playfair Display', serif; }
                .font-script { font-family: 'Dancing Script', cursive; }
                .card { background-color: rgba(255,255,255,0.7); backdrop-filter: blur(5px); }
            </style>
        </head>
        <body class="p-8">
            <div class="max-w-2xl mx-auto text-center">
                <p class="text-lg">The Wedding Of</p>
                <h1 id="groom-nickname-preview" class="font-script text-6xl mt-4">Budi</h1>
                <h1 id="bride-nickname-preview" class="font-script text-6xl my-4">Ani</h1>
                <img id="main-photo-preview" src="https://placehold.co/600x400/BFB5A9/FFFFFF?text=Foto+Anda" alt="Wedding Photo" class="w-full rounded-lg shadow-lg my-8">
                <p id="love-story-preview" class="text-sm italic my-8">"Di sini akan tampil cerita cinta Anda yang indah..."</p>
                <div class="grid md:grid-cols-2 gap-8 my-10">
                    <div class="card p-6 rounded-lg shadow-md">
                        <h3 class="font-serif text-2xl font-bold">Akad Nikah</h3>
                        <p id="akad-date-preview" class="mt-4">Jumat, 26 Juni 2025</p>
                        <p id="akad-time-preview" class="mt-2">Pukul 09:00 WIB</p>
                        <p id="akad-location-preview" class="mt-2 text-xs">Masjid Istiqlal, Jakarta</p>
                    </div>
                    <div class="card p-6 rounded-lg shadow-md">
                         <h3 class="font-serif text-2xl font-bold">Resepsi</h3>
                        <p id="resepsi-date-preview" class="mt-4">Sabtu, 27 Juni 2025</p>
                        <p id="resepsi-time-preview" class="mt-2">Pukul 19:00 WIB</p>
                        <p id="resepsi-location-preview" class="mt-2 text-xs">Gedung Balai Kartini, Jakarta</p>
                    </div>
                </div>
                <p class="text-xs mt-10">Dibuat dengan ❤ oleh KitaNikah</p>
            </div>
        </body>
        </html>
    `;

    document.addEventListener('DOMContentLoaded', function() {
        // --- INISIALISASI PREVIEW ---
        const iframe = document.getElementById('preview-iframe');
        if (iframe) {
            iframe.srcdoc = previewTemplate;
        }

        // --- LOGIKA ACCORDION ---
        const accordionItems = document.querySelectorAll('.accordion-item');
        if (accordionItems.length > 0) {
            const firstItem = accordionItems[0];
            const firstContent = firstItem.querySelector('.accordion-content');
            const firstIcon = firstItem.querySelector('svg');
            firstContent.style.maxHeight = firstContent.scrollHeight + "px";
            firstIcon.style.transform = 'rotate(180deg)';
            
            accordionItems.forEach(item => {
                const header = item.querySelector('.accordion-header');
                header.addEventListener('click', () => {
                    const content = item.querySelector('.accordion-content');
                    const icon = item.querySelector('svg');
                    const isCurrentlyOpen = content.style.maxHeight;
                    
                    accordionItems.forEach(i => {
                        i.querySelector('.accordion-content').style.maxHeight = null;
                        i.querySelector('svg').style.transform = 'rotate(0deg)';
                    });

                    if (!isCurrentlyOpen) {
                        content.style.maxHeight = content.scrollHeight + "px";
                        icon.style.transform = 'rotate(180deg)';
                    }
                });
            });
        }

        // --- LOGIKA LIVE PREVIEW ---
        function updatePreview() {
            const inputs = document.querySelectorAll('.input-field');
            if (!iframe.contentWindow || !iframe.contentWindow.document) return;
            const previewDoc = iframe.contentWindow.document;

            inputs.forEach(input => {
                const targetId = input.dataset.target;
                const targetElement = previewDoc.getElementById(targetId);
                if (targetElement) {
                    let value = input.value.trim();
                    if(input.value) {
                        if (input.type === 'date') {
                            try {
                                const date = new Date(input.value);
                                date.setDate(date.getDate() + 1);
                                value = date.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                            } catch(e) { value = input.value; }
                        }
                        if (input.type === 'time') {
                            value = `Pukul ${input.value} WIB`;
                        }
                        targetElement.innerText = value;
                    } else {
                        targetElement.innerText = "....";
                    }
                }
            });
        }

        // Pratinjau untuk upload foto
        const photoUpload = document.getElementById('photo_upload');
        if (photoUpload) {
            photoUpload.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (!iframe.contentWindow || !iframe.contentWindow.document) return;
                        const previewDoc = iframe.contentWindow.document;
                        const photoPreview = previewDoc.getElementById('main-photo-preview');
                        if (photoPreview) {
                            photoPreview.src = e.target.result;
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
        
        if(iframe) {
            iframe.onload = function() {
                const inputs = document.querySelectorAll('.input-field');
                inputs.forEach(input => {
                    input.addEventListener('input', updatePreview);
                });
                updatePreview();
            }
        }
    });
</script>
@endpush
