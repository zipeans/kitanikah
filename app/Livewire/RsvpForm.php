<?php

// app/Livewire/RsvpForm.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Tamu;

class RsvpForm extends Component
{
    // Properti yang akan di-binding ke input form
    public $nama = '';
    public $ucapan = '';
    public $kehadiran = 'Hadir'; // Nilai default
    public $jumlah_tamu = 1;

    // Aturan validasi
    protected function rules()
    {
        return [
            'nama' => 'required|min:3',
            'ucapan' => 'required|min:10',
            'kehadiran' => 'required|in:Hadir,Tidak Hadir,Ragu-ragu',
            'jumlah_tamu' => 'required|integer|min:1|max:10',
        ];
    }

    // Method yang dijalankan saat form di-submit
    public function save()
    {
        // Lakukan validasi
        $validatedData = $this->validate();

        // Simpan data ke database
        Tamu::create($validatedData);

        // Kirim event untuk memberitahu komponen lain bahwa tamu baru telah ditambahkan
        $this->dispatch('guest-added');

        // Tampilkan pesan sukses
        session()->flash('success', 'Terima kasih! Konfirmasi Anda telah kami terima.');

        // Reset field form
        $this->reset(['nama', 'ucapan', 'kehadiran', 'jumlah_tamu']);
        $this->kehadiran = 'Hadir'; // kembalikan ke default
        $this->jumlah_tamu = 1; // kembalikan ke default
    }

    public function render()
    {
        return view('livewire.rsvp-form');
    }
}