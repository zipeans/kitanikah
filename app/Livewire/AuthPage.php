<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AuthPage extends Component
{
    // Properti untuk mengontrol tab mana yang aktif
    public $activeTab = 'login';

    // Properti untuk form registrasi
    public $name = '';
    public $registerEmail = '';
    public $registerPassword = '';
    // --- PERBAIKAN: Ganti nama properti ini ---
    public $registerPassword_confirmation = '';

    // Properti untuk form login
    public $loginEmail = '';
    public $loginPassword = '';
    public $remember = false;

    // Method ini akan dijalankan saat komponen pertama kali dimuat
    public function mount($tab = 'login')
    {
        $this->activeTab = $tab;
    }

    // Method untuk berpindah ke tab login
    public function showLogin()
    {
        $this->activeTab = 'login';
        $this->resetErrorBag(); // Hapus pesan error lama saat ganti tab
    }

    // Method untuk berpindah ke tab register
    public function showRegister()
    {
        $this->activeTab = 'register';
        $this->resetErrorBag(); // Hapus pesan error lama saat ganti tab
    }

    // Method untuk menangani proses registrasi
    public function register()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'registerEmail' => 'required|string|email|max:255|unique:users,email',
            // --- PERBAIKAN: Aturan 'confirmed' sekarang akan bekerja dengan benar ---
            'registerPassword' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'registerEmail.required' => 'Email wajib diisi.',
            'registerEmail.email' => 'Format email tidak valid.',
            'registerEmail.unique' => 'Email ini sudah terdaftar.',
            'registerPassword.required' => 'Password wajib diisi.',
            'registerPassword.min' => 'Password minimal 8 karakter.',
            'registerPassword.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $this->name,
            'email' => $this->registerEmail,
            'password' => Hash::make($this->registerPassword),
        ]);

        // Login user yang baru dibuat
        Auth::login($user);

        // Redirect ke halaman dashboard
        return redirect()->route('dashboard');
    }

    // Method untuk menangani proses login
    public function login()
    {
        // Validasi input
        $this->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required',
        ], [
            'loginEmail.required' => 'Email wajib diisi.',
            'loginEmail.email' => 'Format email tidak valid.',
            'loginPassword.required' => 'Password wajib diisi.',
        ]);

        // Coba untuk melakukan otentikasi
        if (Auth::attempt(['email' => $this->loginEmail, 'password' => $this->loginPassword], $this->remember)) {
            // Jika berhasil, redirect ke halaman dashboard
            session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Jika gagal, tambahkan pesan error
        $this->addError('loginEmail', 'Email atau password salah.');
    }
    
    // Method untuk merender view
    public function render()
    {
        // Menggunakan layout untuk tamu (guest)
        return view('livewire.auth-page')->layout('layouts.guest');
    }
}
