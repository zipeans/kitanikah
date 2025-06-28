<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitation; // Jangan lupa import model Invitation

class DashboardPage extends Component
{
    /**
     * Properti untuk menampung koleksi undangan.
     * @var \Illuminate\Support\Collection
     */
    public Collection $invitations;

    /**
     * Method ini berjalan saat komponen pertama kali dimuat.
     * Kita akan mengambil semua undangan milik pengguna.
     */
    public function mount()
    {
        $this->loadInvitations();
    }

    /**
     * Method untuk menghapus undangan.
     * @param int $invitationId
     */
    public function delete(int $invitationId)
    {
        // Cari undangan milik pengguna, lalu hapus untuk keamanan
        $invitation = Auth::user()->invitations()->find($invitationId);

        if ($invitation) {
            $invitation->delete();
            // Muat ulang daftar undangan setelah dihapus
            $this->loadInvitations(); 
            // Kirim notifikasi (opsional)
            session()->flash('message', 'Undangan berhasil dihapus.');
        }
    }
    
    /**
     * Fungsi terpisah untuk memuat undangan, agar bisa dipanggil ulang.
     */
    public function loadInvitations()
    {
        // Ambil undangan milik user, urutkan dari yang terbaru
        $this->invitations = Auth::user()->invitations()->latest()->get();
    }

    /**
     * Method untuk merender view.
     */
    public function render()
    {
        // Menggunakan layout app yang memerlukan otentikasi
        return view('livewire.dashboard-page')
                ->layout('layouts.app');
    }
}