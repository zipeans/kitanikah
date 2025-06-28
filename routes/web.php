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
    $softColors = ['#EAE0D5', '#BFB5A9', '#D8C7B9', '#A0522D', '#BFA89E', '#C6B4A9'];
    $designThemes = [
        ['title' => 'Klasik Elegan', 'description' => 'Keindahan abadi...', 'image_url' => asset('images/desain-klasik.jpg')],
        ['title' => 'Modern Minimalis', 'description' => 'Garis bersih...', 'image_url' => null],
        ['title' => 'Rustic & Floral', 'description' => 'Nuansa alam...', 'image_url' => asset('images/desain-rustic.jpg')],
        ['title' => 'Sentuhan Nusantara', 'description' => 'Kaya akan motif...', 'image_url' => null],
    ];
    $themesWithColors = array_map(function ($theme) use ($softColors) {
        if (is_null($theme['image_url'])) {
            $theme['default_color'] = $softColors[array_rand($softColors)];
        } else {
            $theme['default_color'] = null;
        }
        return $theme;
    }, $designThemes);
    return view('welcome', ['designThemes' => $themesWithColors]);
});

// Halaman pilih template
Route::get('/pilih-template', function () {
    $templates = [
        ['title' => 'Serenada Klasik', 'image_url' => asset('images/template-1.jpg'), 'categories' => ['Elegan']],
        ['title' => 'Garis Modern', 'image_url' => asset('images/template-2.jpg'), 'categories' => ['Modern']],
        ['title' => 'Taman Bunga', 'image_url' => null, 'categories' => ['Floral', 'Elegan']],
        ['title' => 'Warna Nusantara', 'image_url' => asset('images/template-4.jpg'), 'categories' => ['Nusantara']],
        ['title' => 'Art Deco', 'image_url' => null, 'categories' => ['Modern', 'Elegan']],
        ['title' => 'Ombak Tenang', 'image_url' => asset('images/template-6.jpg'), 'categories' => ['Modern']],
        ['title' => 'Malam Berkilau', 'image_url' => null, 'categories' => ['Elegan']],
    ];
    $templates = array_map(function ($template) {
        if (empty($template['image_url'])) {
            $softColors = ['#EAE0D5', '#BFB5A9', '#D8C7B9', '#A0522D', '#BFA89E', '#C6B4A9', '#333333', '#38B2AC', '#2D3748'];
            $template['default_color'] = $softColors[array_rand($softColors)];
        } else {
            $template['default_color'] = null;
        }
        return $template;
    }, $templates);
    return view('pilih-template', ['templates' => $templates]);
})->name('pilih-template');

// Halaman editor
// Route::get('/editor/{template_title}', EditorPage::class)->name('editor');

// Route::get('/editor/create/{template_title}', EditorPage::class)->name('editor.create');
// Route::get('/editor/{invitation}/edit', EditorPage::class)->name('editor.edit');
Route::get('editor/new/{template_title}', \App\Livewire\EditorPage::class)->name('editor.create');
Route::get('editor/{invitation}', \App\Livewire\EditorPage::class)->name('editor.edit');

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
