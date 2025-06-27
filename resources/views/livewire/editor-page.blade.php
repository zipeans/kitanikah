<div>
    {{-- Notifikasi untuk pesan sukses --}}
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
             class="fixed top-5 right-5 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg z-50 transition-opacity duration-300">
            {{ session('message') }}
        </div>
    @endif

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
                        <button type="button" 
                                onclick="sendHtmlToBackend('draft')" 
                                class="text-center bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            Simpan Draft
                        </button>
                        <button type="button" 
                                onclick="sendHtmlToBackend('published')" 
                                class="text-center bg-sienna-600 hover:bg-sienna-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
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

    // Menggunakan event 'livewire:navigated' yang lebih andal untuk komponen full-page
    document.addEventListener('livewire:navigated', () => {
        const previewIframe = document.getElementById('preview-iframe');
        const editorForm = document.querySelector('.editor-panel'); // Mengambil form berdasarkan class

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
                    body { font-family: 'Montserrat', sans-serif; background-color: #EAE0D5; color: #5D4037; padding: 2rem; overflow-x: hidden; }
                    .font-serif { font-family: 'Playfair Display', serif; }
                    .font-script { font-family: 'Dancing Script', cursive; }
                    .card { background-color: rgba(255,255,255,0.7); backdrop-filter: blur(5px); }
                </style>
            </head>
            <body>
                <div class="max-w-2xl mx-auto text-center">
                    <p class="text-lg">The Wedding Of</p>
                    <h1 id="groom-nickname-preview" class="font-script text-6xl mt-4">....</h1>
                    <h1 id="bride-nickname-preview" class="font-script text-6xl my-4">....</h1>
                    <img id="main-photo-preview" src="https://placehold.co/600x400/BFB5A9/FFFFFF?text=Foto+Anda" alt="Wedding Photo" class="w-full rounded-lg shadow-lg my-8">
                    <p id="love-story-preview" class="text-sm italic my-8">"Di sini akan tampil cerita cinta Anda yang indah..."</p>
                    <div class="grid md:grid-cols-2 gap-8 my-10">
                        <div class="card p-6 rounded-lg shadow-md">
                            <h3 class="font-serif text-2xl font-bold">Akad Nikah</h3>
                            <p id="akad-date-preview" class="mt-4">....</p>
                            <p id="akad-time-preview" class="mt-2"></p>
                            <p id="akad-location-preview" class="mt-2 text-xs"></p>
                        </div>
                        <div class="card p-6 rounded-lg shadow-md">
                             <h3 class="font-serif text-2xl font-bold">Resepsi</h3>
                            <p id="resepsi-date-preview" class="mt-4">....</p>
                            <p id="resepsi-time-preview" class="mt-2"></p>
                            <p id="resepsi-location-preview" class="mt-2 text-xs"></p>
                        </div>
                    </div>
                    <p class="text-xs mt-10">Dibuat dengan ❤ oleh KitaNikah</p>
                </div>
            </body>
            </html>
        `;

        if (previewIframe) {
            previewIframe.srcdoc = previewTemplate;

            const updatePreview = () => {
                if (!previewIframe.contentWindow || !previewIframe.contentWindow.document) return;
                const previewDoc = previewIframe.contentWindow.document;

                editorForm.querySelectorAll('.input-field').forEach(input => {
                    const targetId = input.dataset.target;
                    const targetElement = previewDoc.getElementById(targetId);
                    if (targetElement) {
                        let value = input.value.trim();
                        if (input.value) {
                            if (input.type === 'date') {
                                try {
                                    const date = new Date(input.value);
                                    const userTimezoneOffset = date.getTimezoneOffset() * 60000;
                                    const adjustedDate = new Date(date.getTime() + userTimezoneOffset);
                                    value = adjustedDate.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                                } catch (e) { value = input.value; }
                            }
                            if (input.type === 'time') { value = `Pukul ${input.value} WIB`; }
                            targetElement.innerText = value;
                        } else {
                            targetElement.innerText = "....";
                        }
                    }
                });
            };

            previewIframe.onload = updatePreview;

            // Menggunakan event delegasi pada editorForm
            editorForm.addEventListener('input', (event) => {
                // Hanya update preview jika input yang diubah memiliki kelas 'input-field'
                if (event.target.classList.contains('input-field')) {
                    updatePreview();
                }
            });

            const photoUpload = document.getElementById('photo_upload');
            if (photoUpload) {
                photoUpload.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const previewDoc = previewIframe.contentWindow.document;
                            const photoPreview = previewDoc.getElementById('main-photo-preview');
                            if (photoPreview) { photoPreview.src = e.target.result; }
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        }
    });
    function getPreviewHtml() {
        const iframe = document.getElementById('preview-iframe');
        if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
            // Mengambil seluruh konten HTML dari dalam iframe
            return iframe.contentWindow.document.documentElement.outerHTML;
        }
        console.error('Preview iframe not found or not accessible.');
        return ''; // Kembalikan string kosong jika gagal
    }

    function sendHtmlToBackend(status) {
        const htmlContent = getPreviewHtml();
        // Kirim event 'save-invitation' ke komponen Livewire di backend
        // dengan membawa payload status dan html
        Livewire.dispatch('save-invitation', { 
            status: status, 
            html: htmlContent 
        });
    }
    
        
</script>
@endpush
