<div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
    <button @click="openAccordion = openAccordion === 1 ? null : 1" class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
        <span>1. Info Mempelai</span>
        <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': openAccordion === 1}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    <div class="accordion-content" x-show="openAccordion === 1" x-collapse>
        <div class="p-4 border-t border-gray-200 space-y-4">
            <div>
                <label for="groom_nickname" class="text-sm font-medium">Nama Panggilan Pria</label>
                <input id="groom_nickname" type="text" placeholder="Contoh: Budi" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="groom_nickname" data-target="groom-nickname-preview">
                <x-input-error :messages="$errors->get('groom_nickname')" class="mt-2" />
            </div>
            <div>
                <label for="bride_nickname" class="text-sm font-medium">Nama Panggilan Wanita</label>
                <input id="bride_nickname" type="text" placeholder="Contoh: Ani" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="bride_nickname" data-target="bride-nickname-preview">
                <x-input-error :messages="$errors->get('bride_nickname')" class="mt-2" />
            </div>
        </div>
    </div>
</div>

<div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
    <button @click="openAccordion = openAccordion === 2 ? null : 2" class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
        <span>2. Detail Acara</span>
        <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': openAccordion === 2}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    <div class="accordion-content" x-show="openAccordion === 2" x-collapse>
         <div class="p-4 border-t border-gray-200 space-y-4">
            <h4 class="font-semibold">Akad Nikah / Pemberkatan</h4>
            <div>
                <label for="akad_date" class="text-sm font-medium">Tanggal</label>
                <input id="akad_date" type="date" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="akad_date" data-target="akad-date-preview">
                <x-input-error :messages="$errors->get('akad_date')" class="mt-2" />
            </div>
            <div>
                <label for="akad_time" class="text-sm font-medium">Waktu</label>
                <input id="akad_time" type="time" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="akad_time" data-target="akad-time-preview">
                <x-input-error :messages="$errors->get('akad_time')" class="mt-2" />
            </div>
            <div>
                <label for="akad_location" class="text-sm font-medium">Lokasi</label>
                <textarea id="akad_location" placeholder="Contoh: Masjid Istiqlal, Jakarta" rows="2" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="akad_location" data-target="akad-location-preview"></textarea>
                <x-input-error :messages="$errors->get('akad_location')" class="mt-2" />
            </div>
            <hr>
            <h4 class="font-semibold">Resepsi</h4>
            <div>
                <label for="resepsi_date" class="text-sm font-medium">Tanggal</label>
                <input id="resepsi_date" type="date" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="resepsi_date" data-target="resepsi-date-preview">
                <x-input-error :messages="$errors->get('resepsi_date')" class="mt-2" />
            </div>
            <div>
                <label for="resepsi_time" class="text-sm font-medium">Waktu</label>
                <input id="resepsi_time" type="time" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="resepsi_time" data-target="resepsi-time-preview">
                <x-input-error :messages="$errors->get('resepsi_time')" class="mt-2" />
            </div>
            <div>
                <label for="resepsi_location" class="text-sm font-medium">Lokasi</label>
                <textarea id="resepsi_location" placeholder="Contoh: Gedung Balai Kartini, Jakarta" rows="2" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="resepsi_location" data-target="resepsi-location-preview"></textarea>
                <x-input-error :messages="$errors->get('resepsi_location')" class="mt-2" />
            </div>
        </div>
    </div>
</div>

<div class="accordion-item bg-gray-50 rounded-lg border border-gray-200">
    <button @click="openAccordion = openAccordion === 3 ? null : 3" class="accordion-header w-full flex justify-between items-center p-4 text-left font-semibold">
        <span>3. Galeri Foto & Cerita</span>
        <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': openAccordion === 3}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
     <div class="accordion-content" x-show="openAccordion === 3" x-collapse>
         <div class="p-4 border-t border-gray-200 space-y-4">
            <div>
                <label for="love_story" class="text-sm font-medium">Cerita Cintamu</label>
                <textarea id="love_story" placeholder="Ceritakan bagaimana kalian bertemu..." rows="5" class="input-field w-full mt-1 p-2 border rounded-md" wire:model.lazy="love_story" data-target="love-story-preview"></textarea>
                <x-input-error :messages="$errors->get('love_story')" class="mt-2" />
            </div>
            <div>
                <label for="photo_upload" class="text-sm font-medium">Upload Foto Utama</label>
                <div class="mt-1">
                    <input id="photo_upload" type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sienna-600 file:text-white hover:file:bg-sienna-700" accept="image/*" wire:model="main_photo">
                </div>
                <x-input-error :messages="$errors->get('main_photo')" class="mt-2" />
            </div>
         </div>
    </div>
</div>