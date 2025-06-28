<div>
    {{-- Notifikasi baru yang dikontrol oleh Alpine.js dan Event Livewire --}}
    <div x-data="{ show: false, message: '' }"
        @invitation-saved.window="
            message = $event.detail.message; 
            show = true; 
            setTimeout(() => show = false, 5000)
        "
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-5 right-5 bg-green-600 text-white py-3 px-5 rounded-lg shadow-lg z-50"
        style="display: none;">
        <span x-text="message"></span>
    </div>

    <div class="flex h-screen bg-gray-100">

        <!-- Panel Kiri: Form Editor -->
        <aside class="w-1/3 h-screen bg-white shadow-lg flex flex-col editor-panel overflow-y-auto">
            <div class="p-6 border-b border-gray-200 sticky top-0 bg-white z-10">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold font-serif">Editor Undangan</h2>
                        <p class="text-sm text-gray-500">Template: <span class="font-semibold text-sienna-600">{{ $template_title }}</span></p>
                    </div>
                    <a href="{{ route('pilih-template') }}" class="text-sm text-gray-600 hover:text-sienna-600">&larr; Kembali</a>
                </div>
            </div>

            <div class="flex-grow p-6 space-y-4">
                
                <div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
                    <button class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
                        <span>1. Info Mempelai</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="accordion-content">
                        <div class="p-4 border-t border-gray-200 space-y-4">
                            <div>
                                <label for="groom_nickname" class="text-sm font-medium">Nama Panggilan Pria</label>
                                <input id="groom_nickname" type="text" placeholder="Contoh: Budi" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-sienna-600 focus:border-transparent" data-target="groom-nickname-preview" wire:model="groom_nickname">
                            </div>
                            <div>
                                <label for="bride_nickname" class="text-sm font-medium">Nama Panggilan Wanita</label>
                                <input id="bride_nickname" type="text" placeholder="Contoh: Ani" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="bride-nickname-preview" wire:model="bride_nickname">
                            </div>
                        </div>
                    </div>
                </div>

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
                                <input id="akad_date" type="date" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="akad-date-preview" wire:model="akad_date">
                            </div>
                            <div>
                                <label for="akad_time" class="text-sm font-medium">Waktu</label>
                                <input id="akad_time" type="time" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="akad-time-preview" wire:model="akad_time">
                            </div>
                            <div>
                                <label for="akad_location" class="text-sm font-medium">Lokasi</label>
                                <textarea id="akad_location" placeholder="Contoh: Masjid Istiqlal, Jakarta" rows="2" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="akad-location-preview" wire:model="akad_location"></textarea>
                            </div>
                            <hr>
                            <h4 class="font-semibold">Resepsi</h4>
                            <div>
                                <label for="resepsi_date" class="text-sm font-medium">Tanggal</label>
                                <input id="resepsi_date" type="date" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="resepsi-date-preview" wire:model="resepsi_date">
                            </div>
                            <div>
                                <label for="resepsi_time" class="text-sm font-medium">Waktu</label>
                                <input id="resepsi_time" type="time" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="resepsi-time-preview" wire:model="resepsi_time">
                            </div>
                            <div>
                                <label for="resepsi_location" class="text-sm font-medium">Lokasi</label>
                                <textarea id="resepsi_location" placeholder="Contoh: Gedung Balai Kartini, Jakarta" rows="2" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="resepsi-location-preview" wire:model="resepsi_location"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
                    <button class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
                        <span>3. Galeri Foto & Cerita</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="accordion-content">
                    <div class="p-4 border-t border-gray-200 space-y-4">
                        <div>
                            <label for="love_story" class="text-sm font-medium">Cerita Cintamu</label>
                            <textarea id="love_story" placeholder="Ceritakan bagaimana kalian bertemu..." rows="5" class="input-field w-full mt-1 p-2 border border-gray-300 rounded-md" data-target="love-story-preview" wire:model="love_story"></textarea>
                        </div>
                        <div>
                            <label for="photo_upload" class="text-sm font-medium">Upload Foto Utama</label>
                            <div class="mt-1">
                                <input id="photo_upload" type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sienna-600 file:text-white hover:file:bg-sienna-700" accept="image/*" wire:model="main_photo">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="p-6 border-t border-gray-200 sticky bottom-0 bg-white z-10">
                <div class="flex justify-between">
                    @auth
                        {{-- TAMPILAN UNTUK PENGGUNA YANG SUDAH LOGIN --}}
                        {{-- Nanti tombol ini bisa dihubungkan dengan method Livewire --}}
                        <button type="button" class="text-center bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300" wire:click="saveDraft">
                            Simpan Draft
                        </button>
                        <button type="button" class="text-center bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300" wire:click="publish">
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
                {{-- Tambahkan wire:ignore.self untuk mencegah Livewire merender ulang iframe ini --}}
                <iframe id="preview-iframe" class="w-full h-full rounded-lg" wire:ignore.self></iframe>
            </div>
        </main>
    </div>
</div>

@push('scripts')
<script>
    function getPreviewHtml() {
        return document.getElementById('preview-iframe')?.contentWindow?.document.documentElement.outerHTML || '';
    }
    function sendHtmlToBackend(status) {
        Livewire.dispatch('save-invitation', { 
            status: status, 
            html: getPreviewHtml() 
        });
    }

    // Menggunakan event 'livewire:navigated' yang lebih andal untuk komponen full-page
    document.addEventListener('livewire:navigated', () => {
        const previewIframe = document.getElementById('preview-iframe');
        if (!previewIframe) return;

        // Template dasar iframe
        const previewTemplate = `
            <!DOCTYPE html>
                <html lang="id">
                    <head>
                        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
                        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
                        <style> body { font-family: 'Montserrat', sans-serif; background-color: #EAE0D5; color: #5D4037; padding: 2rem; } .font-serif { font-family: 'Playfair Display', serif; } .font-script { font-family: 'Dancing Script', cursive; } .card { background-color: rgba(255,255,255,0.7); } </style>
                    </head>
                    <body>
                        <div class="max-w-2xl mx-auto text-center">
                            <p class="text-lg">The Wedding Of</p>
                            <h1 id="groom-nickname-preview" class="font-script text-6xl mt-4"></h1>
                            <h1 id="" class="font-script text-6xl mt-4">&</h1>
                            <h1 id="bride-nickname-preview" class="font-script text-6xl my-4"></h1>
                            <img id="main-photo-preview" src="" alt="Wedding Photo" class="w-full rounded-lg shadow-lg my-8">
                            <p id="love-story-preview" class="text-sm italic my-8"></p>
                            <div class="grid md:grid-cols-2 gap-8 my-10">
                                <div class="card p-6 rounded-lg shadow-md">
                                    <h3 class="font-serif text-2xl font-bold">Akad Nikah</h3>
                                    <p id="akad-date-preview" class="mt-4"></p>
                                    <p id="akad-time-preview" class="mt-2"></p>
                                    <p id="akad-location-preview" class="mt-2 text-xs"></p>
                                </div>
                                <div class="card p-6 rounded-lg shadow-md">
                                    <h3 class="font-serif text-2xl font-bold">Resepsi</h3>
                                    <p id="resepsi-date-preview" class="mt-4"></p>
                                    <p id="resepsi-time-preview" class="mt-2"></p>
                                    <p id="resepsi-location-preview" class="mt-2 text-xs"></p>
                                </div>
                            </div>
                            <p class="text-xs mt-10">Dibuat dengan ❤ oleh KitaNikah</p>
                        </div>
                    </body>
                </html>
        `;
        
        previewIframe.srcdoc = previewTemplate;

        // Fungsi yang akan dijalankan untuk mengupdate SEMUA preview
        function updateAllPreview() {
            const previewDoc = previewIframe.contentWindow?.document;
            if (!previewDoc) return;

            // Update semua field teks
            document.querySelectorAll('.input-field[data-target]').forEach(input => {
                const targetElement = previewDoc.getElementById(input.dataset.target);
                if (targetElement) {
                    let value = input.value;
                    let displayValue = value.trim() || '....';
                    
                    if (value && input.type === 'date') {
                        try {
                            displayValue = new Date(value).toLocaleDateString('id-ID', { timeZone: 'UTC', weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                        } catch (e) {}
                    } else if (value && input.type === 'time') {
                        const timeWithoutSeconds = value.substring(0, 5);
                        displayValue = `Pukul ${timeWithoutSeconds} WIB`;
                    }
                    targetElement.innerText = displayValue;
                }
            });

            // Update gambar
            const photoInput = document.getElementById('photo_upload');
            const photoPreview = previewDoc.getElementById('main-photo-preview');
            const existingPhotoPath = @json($existing_photo_path);

            if (photoInput && photoInput.files[0]) {
                // Prioritas 1: Jika ada file BARU yang dipilih di form, tampilkan itu.
                const reader = new FileReader();
                reader.onload = e => { if(photoPreview) photoPreview.src = e.target.result; };
                reader.readAsDataURL(photoInput.files[0]);
            } else if (existingPhotoPath) {
                // Prioritas 2: Jika tidak ada file baru, dan ada data dari DB, tampilkan foto dari DB.
                if(photoPreview) photoPreview.src = `/storage/${existingPhotoPath}`;
            } else {
                // Prioritas 3: Jika tidak ada keduanya, tampilkan placeholder.
                if(photoPreview) photoPreview.src = 'https://placehold.co/600x400/BFB5A9/FFFFFF?text=Foto+Anda';
            }
        }

        // Jalankan saat iframe selesai dimuat untuk mengisi data awal
        previewIframe.onload = () => {
            updateAllPreview();
            
            // Tambahkan listener ke setiap input untuk live update
            document.querySelectorAll('.input-field').forEach(input => {
                input.addEventListener('input', updateAllPreview);
            });

            // Listener HANYA untuk input file
            document.getElementById('photo_upload')?.addEventListener('change', updateAllPreview);
        };
    });
</script>
@endpush
