<div>
    {{-- Notifikasi untuk pesan sukses (misal: setelah hapus) --}}
    @if (session()->has('message'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
             <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        </div>
    @endif

    {{-- Header Halaman --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard Anda
            </h2>
        </div>
    </header>

    {{-- Konten Utama --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    
                    {{-- Judul dan Tombol Aksi --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                        <div>
                            <h3 class="text-2xl font-bold font-serif text-gray-800">Undangan Saya</h3>
                            <p class="mt-1 text-sm text-gray-500">Kelola semua undangan yang telah Anda buat.</p>
                        </div>
                        <a href="{{ route('pilih-template') }}" class="mt-4 sm:mt-0 inline-flex items-center justify-center px-4 py-2 bg-sienna-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sienna-700 active:bg-sienna-900 focus:outline-none focus:border-sienna-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Buat Undangan Baru
                        </a>
                    </div>

                    {{-- Daftar Undangan --}}
                    <div class="border-t border-gray-200">

                        {{-- Gunakan @forelse untuk perulangan yang elegan --}}
                        @forelse ($invitations as $invitation)
                            {{-- Buka grid jika ini adalah item pertama --}}
                            @if ($loop->first)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-8">
                            @endif
                            
                            {{-- Kartu Undangan --}}
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
                                {{-- Detail Undangan --}}
                                <div>
                                    <div class="flex justify-between items-start">
                                        <h4 class="font-bold text-lg text-gray-800 truncate pr-2" title="{{ $invitation->groom_nickname ?? 'Mempelai Pria' }} & {{ $invitation->bride_nickname ?? 'Mempelai Wanita' }}">
                                            {{ $invitation->groom_nickname ?? 'Mempelai Pria' }} & {{ $invitation->bride_nickname ?? 'Mempelai Wanita' }}
                                        </h4>
                                        @if ($invitation->status == 'published')
                                            <span class="text-xs font-semibold bg-green-100 text-green-800 px-2 py-1 rounded-full">Published</span>
                                        @else
                                            <span class="text-xs font-semibold bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Draft</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">Template: {{ $invitation->template_title }}</p>
                                    <p class="text-xs text-gray-400 mt-1">Diperbarui: {{ $invitation->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                                {{-- Tombol Aksi per Kartu --}}
                                <div class="mt-4 flex space-x-3 items-center">
                                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline">Lihat</a>
                                    <a href="{{ route('editor.edit', ['invitation' => $invitation]) }}" class="text-sm font-medium text-sienna-600 hover:underline">Edit</a>
                                    <button 
                                        wire:click="delete({{ $invitation->id }})" 
                                        wire:confirm="Apakah Anda yakin ingin menghapus undangan ini? Tindakan ini tidak dapat diurungkan."
                                        class="text-sm font-medium text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </div>
                            </div>

                            {{-- Tutup grid jika ini adalah item terakhir --}}
                            @if ($loop->last)
                                </div>
                            @endif
                        @empty
                            {{-- Tampilan jika belum ada undangan --}}
                            <div class="text-center py-16">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-semibold text-gray-900">Belum Ada Undangan</h3>
                                <p class="mt-1 text-sm text-gray-500">Mulai buat undangan pertama Anda.</p>
                                <div class="mt-6">
                                    <a href="{{ route('pilih-template') }}" class="inline-flex items-center px-4 py-2 bg-sienna-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sienna-700">
                                        Buat Undangan Baru
                                    </a>
                                </div>
                            </div>
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>