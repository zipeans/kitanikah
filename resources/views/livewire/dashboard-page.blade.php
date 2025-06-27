<div>
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
                        {{-- Logika untuk menampilkan daftar undangan akan ada di sini --}}
                        {{-- Untuk sekarang, kita tampilkan placeholder --}}

                        @if (false) {{-- Ganti 'false' dengan 'count($undangan) > 0' saat data sudah ada --}}
                            
                            {{-- CONTOH TAMPILAN JIKA ADA UNDANGAN --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-8">
                                <!-- Contoh Kartu Undangan 1 -->
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 flex flex-col justify-between">
                                    <div>
                                        <div class="flex justify-between items-start">
                                            <h4 class="font-bold text-lg text-gray-800">Budi & Ani</h4>
                                            <span class="text-xs font-semibold bg-green-100 text-green-800 px-2 py-1 rounded-full">Published</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Template: Serenada Klasik</p>
                                    </div>
                                    <div class="mt-4 flex space-x-2">
                                        <a href="#" class="text-sm font-medium text-sienna-600 hover:underline">Lihat</a>
                                        <a href="#" class="text-sm font-medium text-sienna-600 hover:underline">Edit</a>
                                        <a href="#" class="text-sm font-medium text-red-600 hover:underline">Hapus</a>
                                    </div>
                                </div>
                                <!-- Contoh Kartu Undangan 2 -->
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 flex flex-col justify-between">
                                    <div>
                                        <div class="flex justify-between items-start">
                                            <h4 class="font-bold text-lg text-gray-800">Rian & Dita</h4>
                                             <span class="text-xs font-semibold bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Draft</span>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">Template: Garis Modern</p>
                                    </div>
                                     <div class="mt-4 flex space-x-2">
                                        <a href="#" class="text-sm font-medium text-sienna-600 hover:underline">Lihat</a>
                                        <a href="#" class="text-sm font-medium text-sienna-600 hover:underline">Edit</a>
                                        <a href="#" class="text-sm font-medium text-red-600 hover:underline">Hapus</a>
                                    </div>
                                </div>
                            </div>

                        @else

                            {{-- TAMPILAN JIKA BELUM ADA UNDANGAN --}}
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

                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
