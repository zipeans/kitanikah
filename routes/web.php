<?php

// Menggunakan 'use' untuk Auth dan Request demi kejelasan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Import semua komponen Livewire Anda
use App\Livewire\AuthPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\DashboardPage;
use App\Livewire\EditorPage;
use App\Models\Invitation;
use App\Models\InvitationTemplate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| File ini mengatur semua alur navigasi aplikasi Anda.
|
*/

// --- ROUTE PUBLIK (BISA DIAKSES TANPA LOGIN) ---

// Halaman utama
Route::get('/', function () {
    // Ambil beberapa template (misalnya 5) secara acak dari database untuk ditampilkan
    $featured_templates = InvitationTemplate::inRandomOrder()->take(5)->get();

    // Kirim data tersebut ke view
    return view('welcome', ['designThemes' => $featured_templates]);
})->name('home');

// Halaman pilih template
Route::get('/pilih-template', function () {
    // 1. Ambil semua template dari database
    $templates = InvitationTemplate::orderBy('title')->get();

    // 2. Ambil daftar kategori yang unik dan buang nilai null/kosong
    $categories = InvitationTemplate::select('category')
                                    ->whereNotNull('category')
                                    ->where('category', '!=', '')
                                    ->distinct()
                                    ->pluck('category');

    // 3. Kirim kedua data tersebut ke view
    return view('pilih-template', [
        'templates' => $templates,
        'categories' => $categories
    ]);
})->name('pilih-template');

Route::get('/template-preview/{template}', function (InvitationTemplate $template) {
    // Laravel akan otomatis mencari template berdasarkan ID yang dilewatkan.
    // Kemudian kita langsung mengembalikan konten HTML-nya.
    return response($template->html_content);
})->name('template.preview');

// Halaman editor
Route::get('editor/create/{template_slug}', \App\Livewire\AuthPage::class)->name('editor.create');
Route::get('editor/edit/{invitation}', \App\Livewire\EditorPage::class)->name('editor.edit');

// --- ROUTE OTENTIKASI (UNTUK PENGGUNA YANG BELUM LOGIN) ---
Route::middleware('guest')->group(function () {
    Route::get('login', AuthPage::class)->name('login')->defaults('tab', 'login');
    Route::get('register', AuthPage::class)->name('register')->defaults('tab', 'register');

    Route::get('forgot-password', ForgotPasswordPage::class)->name('password.request');
    Route::get('reset-password/{token}', ResetPasswordPage::class)->name('password.reset');
});

// --- ROUTE YANG MEMBUTUHKAN LOGIN ---
Route::middleware('auth')->group(function() {

    // Mengarahkan route /dashboard ke komponen Livewire DashboardPage
    Route::get('dashboard', DashboardPage::class)->name('dashboard');

    // Halaman profil standar Livewire
    Route::view('profile', 'profile')->name('profile');

    // MENAMBAHKAN KEMBALI ROUTE LOGOUT
    Route::post('logout', function (Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

// Rute untuk menampilkan undangan yang sudah jadi berdasarkan slug
Route::get('/undangan/{slug}', function ($slug) {
    // Cari undangan berdasarkan slug-nya
    $invitation = Invitation::where('slug', $slug)->firstOrFail();

    // Langsung tampilkan konten mentah dari kolom html_template
    return response($invitation->html_template);
})->name('invitation.show');
