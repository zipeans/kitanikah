<?php

namespace App\Livewire;

use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class EditorPage extends Component
{
    use WithFileUploads;

    public $template_title;
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
    public $activeAccordion = 1;
    
    // Properti untuk menampung file yang di-upload
    public $main_photo;

    public function mount($template_title)
    {
        $this->template_title = $template_title;
    }

    /**
     * Mengumpulkan data undangan dari properti Livewire.
     *
     * @param string $status Status undangan ('draft' atau 'published').
     * @return array Data undangan yang siap disimpan.
     */
    protected function collectInvitationData(string $status, ?string $htmlTemplate): array
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
            'akad_time' => $this->akad_time,
            'akad_location' => $this->akad_location,
            'resepsi_date' => $this->resepsi_date,
            'resepsi_time' => $this->resepsi_time,
            'resepsi_location' => $this->resepsi_location,
            'love_story' => $this->love_story,
            'html_template' => $htmlTemplate, // Tambahkan HTML template ke data
        ];
        dd($data);
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
    public function save($payload)
    {
        $status = $payload['status'];
        $htmlTemplate = $payload['html'];

        if (Auth::guest()) {
            $route = $status === 'draft' ? 'login' : 'register';
            session()->flash('message', 'Anda harus login untuk melanjutkan.');
            return $this->redirect(route($route), navigate: true);
        }

        // Aturan validasi
        $validationRules = [
            'groom_nickname' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
        ];
        if ($status === 'published') {
            $validationRules['akad_date'] = 'required|date';
            // tambahkan validasi lain jika perlu...
        }
        if ($this->main_photo) {
            $validationRules['main_photo'] = 'image|max:2048';
        }
        $this->validate($validationRules);

        // Kumpulkan data undangan
        $data = $this->collectInvitationData($status, $htmlTemplate);

        // Debug di sini untuk memastikan htmlTemplate tidak null
        // dd($data); // <--- Anda bisa aktifkan ini lagi untuk cek

        // Simpan ke database
        $invitation = auth()->user()->invitations()->updateOrCreate(
            ['id' => $this->invitationId],
            $data
        );
        
        $this->invitationId = $invitation->id;

        $message = ($status === 'draft') ? 'Undangan berhasil disimpan sebagai draft!' : 'Selamat! Undangan Anda berhasil dipublikasikan.';
        session()->flash('message', $message);

        // Refresh komponen untuk menampilkan pesan
        $this->dispatch('$refresh');
    }
    
    /**
     * Menyimpan undangan sebagai draft.
     * @param string|null $htmlTemplate
     */
    public function saveDraft(?string $htmlTemplate = null)
    {
        $this->save('draft', $htmlTemplate);
    }

    /**
     * Mempublikasikan undangan.
     * @param string|null $htmlTemplate
     */
    public function publish(?string $htmlTemplate = null)
    {
        $this->save('published', $htmlTemplate);
    }

    public function render()
    {
        return view('livewire.editor-page')->layout('layouts.public');
    }
}

