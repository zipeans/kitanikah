{{-- resources/views/livewire/guest-list.blade.php --}}
<div class="p-8 border border-gray-200 rounded-lg shadow-lg bg-white mt-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Ucapan & Doa</h2>
    <div class="space-y-6 max-h-96 overflow-y-auto pr-4">
        @forelse ($guests as $guest)
            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                <p class="font-bold text-gray-800">{{ $guest->nama }}</p>
                <p class="text-gray-600 italic">"{{ $guest->ucapan }}"</p>
                <p class="text-xs text-gray-400 mt-2">{{ $guest->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <p class="text-center text-gray-500">Jadilah orang pertama yang mengirim ucapan!</p>
        @endforelse
    </div>
</div>