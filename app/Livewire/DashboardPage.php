<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardPage extends Component
{
    // Di masa depan, Anda bisa menambahkan properti di sini
    // Contoh: public $undangan;
    
    public function mount()
    {
        // Di sini Anda akan mengambil data undangan milik pengguna yang sedang login
        // Contoh: $this->undangan = auth()->user()->undangan()->get();
    }

    public function render()
    {
        // Menggunakan layout app yang memerlukan otentikasi
        return view('livewire.dashboard-page')
                ->layout('layouts.app');
    }
}
