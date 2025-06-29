<?php

namespace App\Livewire;

use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithFileUploads;
use App\Models\InvitationTemplate;

class EditorPage extends Component
{
    use WithFileUploads;

    public $template_title;
    public ?Invitation $invitation;
    public ?int $invitationId = null;

    // Properti untuk semua field di form editor
    public $groom_nickname = '';
    public $bride_nickname = '';
    public $akad_date = '';
    public $akad_time = '';
    public $akad_location = '';
    public $resepsi_date = '';
    public $resepsi_time = '';
    public $resepsi_location = '';
    public $love_story = '';
    public $existing_photo_path = '';
    public $activeAccordion = 1;
    public $html_template_content = '';
    
    // Properti untuk menampung file yang di-upload
    public $main_photo;

    public function mount(Invitation $invitation = null,string $template_title = null)
    {
        // Coba cari undangan berdasarkan ID yang dilewatkan dari rute
        if ($invitation && $invitation_model = Invitation::find($invitation)) {
            // -- MODE EDIT --
            // Pastikan pengguna hanya bisa mengedit undangannya sendiri
            if ($invitation->user_id !== Auth::id()) {
                abort(403, 'Akses ditolak.');
            }
            
            $this->invitation = $invitation;
            $this->invitationId = $invitation->id;
            $this->template_title = $invitation->template_title;
            $this->groom_nickname = $invitation->groom_nickname;
            $this->bride_nickname = $invitation->bride_nickname;
            $this->akad_date = $invitation->akad_date;
            $this->akad_time = $invitation->akad_time;
            $this->akad_location = $invitation->akad_location;
            $this->resepsi_date = $invitation->resepsi_date;
            $this->resepsi_time = $invitation->resepsi_time;
            $this->resepsi_location = $invitation->resepsi_location;
            $this->love_story = $invitation->love_story;
            $this->existing_photo_path = $invitation->main_photo_path;
            
        } elseif ($template_title) {
            // -- MODE BUAT BARU --
            $this->template_title = urldecode($template_title);
            $this->invitation = new Invitation();
            $this->existing_photo_path = null; 
        } else {
            // Jika tidak ada parameter yang valid, kembalikan ke dashboard
            return redirect()->route('dashboard');
        }
    }

    /**
     * Mengumpulkan data undangan dari properti Livewire.
     *
     * @param string $status Status undangan ('draft' atau 'published').
     * @return array Data undangan yang siap disimpan.
     */
    protected function collectInvitationData(string $status): array
    {
        // Membuat slug dari nama mempelai. Jika kosong, buat slug acak.
        $slug = Str::slug($this->groom_nickname . '-dan-' . $this->bride_nickname);
        if(empty($slug)) {
            $slug = 'undangan-' . Str::lower(Str::random(8));
        }

        $data = [
            'template_title' => $this->template_title,
            // Pastikan slug unik. Jika sudah ada, tambahkan uniqid.
            'slug' => Invitation::where('slug', $slug)->where('id', '!=', $this->invitationId)->exists() ? $slug . '-' . uniqid() : $slug,
            'status' => $status,
            'groom_nickname' => $this->groom_nickname,
            'bride_nickname' => $this->bride_nickname,
            'akad_date' => $this->akad_date,
            'akad_time' => $this->akad_time ? date('H:i', strtotime($this->akad_time)) : null,
            'akad_location' => $this->akad_location,
            'resepsi_date' => $this->resepsi_date,
            'resepsi_time' => $this->resepsi_time ? date('H:i', strtotime($this->resepsi_time)) : null,
            'resepsi_location' => $this->resepsi_location,
            'love_story' => $this->love_story,
            'html_template' => $this->html_template_content,
        ];
        
        // Jika ada foto utama yang di-upload, simpan dan tambahkan path-nya ke data.
        if ($this->main_photo) {
            // Pastikan direktori 'photos' ada di storage/app/public
            $path = $this->main_photo->store('photos', 'public');
            $data['main_photo_path'] = $path;
        }

        return $data;
    }

    /**
     * Menyimpan data undangan ke database.
     *
     * @param string $status Status undangan ('draft' atau 'published').
     * @return \Illuminate\Http\RedirectResponse|void
     */
    protected function save($status = 'draft')
    {
        // Redirect pengguna jika belum login
        if (Auth::guest()) {
            $redirectRoute = ($status === 'draft') ? 'login' : 'register';
            session()->flash('message', 'Anda harus login untuk menyimpan undangan.'); // Tambahkan pesan flash
            return $this->redirect(route($redirectRoute), navigate: true);
        }
        
        // dd($this->all());
        // Aturan validasi dasar
        $validationRules = [
            'groom_nickname' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
        ];

        // dd($status);

        // Aturan validasi tambahan jika statusnya 'published'
        if ($status === 'published') {
            $validationRules['akad_date'] = 'required|date';
            $validationRules['resepsi_date'] = 'required|date';
            // Tambahkan validasi untuk lokasi dan waktu jika diperlukan untuk publikasi
            $validationRules['akad_location'] = 'required|string|max:500';
            $validationRules['resepsi_location'] = 'required|string|max:500';
            $validationRules['akad_time'] = 'required';
            $validationRules['resepsi_time'] = 'required';
        }
        
        // Validasi untuk foto utama jika ada
        if ($this->main_photo) {
            $validationRules['main_photo'] = 'image|max:2048'; // Maks 2MB
        }
        
        // Jalankan validasi
        $this->validate($validationRules);

        // Kumpulkan data undangan
        $data = $this->collectInvitationData($status);

        // Simpan atau perbarui undangan di database
        // Gunakan updateOrCreate untuk menangani pembuatan baru atau pembaruan yang sudah ada
        $invitation = auth()->user()->invitations()->updateOrCreate(
            ['id' => $this->invitationId], // Cari berdasarkan ID jika sudah ada
            $data // Data yang akan disimpan
        );
        
        // Perbarui invitationId jika ini adalah undangan baru
        $this->invitationId = $invitation->id;

        // PERBAIKAN DI SINI: Siapkan pesan dan kirim via dispatch
        $message = ($status === 'draft') 
            ? 'Undangan berhasil disimpan sebagai draft!' 
            : 'Selamat! Undangan Anda berhasil dipublikasikan.';

        // Hapus session()->flash() dan ganti dengan dispatch yang membawa pesan
        $this->dispatch('invitation-saved', message: $message);
    }

    /**
     * Menyimpan undangan sebagai draft.
     */
    public function saveDraft($html_template)
    {
        $this->html_template_content = $html_template;
        $this->save('draft');
    }

    /**
     * Mempublikasikan undangan.
     */
    public function publish($html_template)
    {
        $this->html_template_content = $html_template;
        $template = InvitationTemplate::where('title', $this->template_title)->first();

        // Jika template gratis, langsung publikasikan
        if (!$template || $template->price <= 0) {
            $this->validate([
                'groom_nickname' => 'required', 'bride_nickname' => 'required',
                'akad_date' => 'required|date', 'akad_time' => 'required',
            ]);
            $this->save('published');
            return;
        }

        // --- Alur untuk template berbayar ---

        // 1. Validasi data yang diperlukan
        $this->validate(['groom_nickname' => 'required', 'bride_nickname' => 'required']);
        
        // 2. Simpan dulu sebagai draft. Ini akan memperbarui $this->invitation
        $this->save('draft');
        
        // 3. Buat transaksi simulasi
        Transaction::create([
            'user_id' => auth()->id(),
            'invitation_id' => $this->invitationId,
            'order_id' => 'SIMULASI-' . $this->invitationId . '-' . time(),
            'gross_amount' => $template->price,
            'transaction_status' => 'success',
            'payment_type' => 'simulasi',
        ]);

        // 4. Update status undangan. SEKARANG INI AKAN BERHASIL.
        $this->invitation->update(['status' => 'published']);

        // 5. Beri pesan sukses dan redirect
        // Hapus session()->flash() dan ganti dengan dispatch yang membawa pesan
        $this->dispatch('invitation-saved', message: 'Pembayaran Simulasi Berhasil! Undangan telah dipublikasikan.');
        // session()->flash('message', 'Pembayaran Simulasi Berhasil! Undangan telah dipublikasikan.');
        // return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.editor-page')->layout('layouts.public');
    }
}

