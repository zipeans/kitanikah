<?php

// app/Livewire/GuestList.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Tamu;
use Livewire\Attributes\On;

class GuestList extends Component
{
    // Listener untuk event 'guest-added'
    #[On('guest-added')]
    public function refreshList()
    {
        // Method ini akan terpanggil saat event 'guest-added' diterima.
        // Karena render() akan dipanggil ulang secara otomatis, kita tidak perlu
        // melakukan apa-apa di sini. Cukup definisikan listener-nya saja.
    }

    public function render()
    {
        // Ambil data tamu yang hadir, urutkan dari yang terbaru
        $guests = Tamu::where('kehadiran', 'Hadir')
                      ->latest()
                      ->take(20) // Batasi untuk performa
                      ->get();

        return view('livewire.guest-list', [
            'guests' => $guests,
        ]);
    }
}