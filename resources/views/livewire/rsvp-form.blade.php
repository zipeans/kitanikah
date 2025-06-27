{{-- resources/views/livewire/rsvp-form.blade.php --}}
<div class="p-8 border border-gray-200 rounded-lg shadow-lg bg-white">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Formulir Kehadiran</h2>

    {{-- Pesan Sukses --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="save">
        {{-- Nama Lengkap --}}
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" id="nama" wire:model.defer="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama') border-red-500 @enderror" placeholder="Contoh: Budi Santoso">
            @error('nama') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
        </div>

        {{-- Ucapan & Doa --}}
        <div class="mb-4">
            <label for="ucapan" class="block text-gray-700 text-sm font-bold mb-2">Ucapan & Doa</label>
            <textarea id="ucapan" wire:model.defer="ucapan" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('ucapan') border-red-500 @enderror" placeholder="Tuliskan ucapan dan doa terbaik Anda untuk kami..."></textarea>
            @error('ucapan') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
        </div>

        {{-- Konfirmasi Kehadiran --}}
        <div class="mb-4">
            <label for="kehadiran" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Kehadiran</label>
            <select id="kehadiran" wire:model="kehadiran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kehadiran') border-red-500 @enderror">
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
                <option value="Ragu-ragu">Ragu-ragu</option>
            </select>
            @error('kehadiran') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
        </div>

        {{-- Jumlah Tamu (Hanya muncul jika memilih 'Hadir') --}}
        @if ($kehadiran == 'Hadir')
        <div class="mb-6">
            <label for="jumlah_tamu" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Tamu yang Akan Hadir</label>
            <input type="number" id="jumlah_tamu" wire:model.defer="jumlah_tamu" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('jumlah_tamu') border-red-500 @enderror">
            @error('jumlah_tamu') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
        </div>
        @endif

        {{-- Tombol Submit --}}
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline flex items-center">
                <span wire:loading.remove>Kirim Konfirmasi</span>
                <span wire:loading>Mengirim...</span>
            </button>
        </div>
    </form>
</div>