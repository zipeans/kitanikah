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
    public ?Invitation $invitation;
    public ?int $invitationId = null;

    // Properti Form
    public $groom_nickname = '';
    public $bride_nickname = '';
    public $akad_date = '';
    public $akad_time = '';
    public $akad_location = '';
    public $resepsi_date = '';
    public $resepsi_time = '';
    public $resepsi_location = '';
    public $love_story = '';
    public $main_photo;
    public $existing_photo_path; // Properti untuk menyimpan path foto lama

    public function mount(Invitation $invitation = null, string $template_title = '')
    {
        if ($invitation->exists) {
            // -- MODE EDIT --
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
            $this->existing_photo_path = $invitation->main_photo_path; // Simpan path foto lama
            
        } else {
            // -- MODE BUAT BARU --
            $this->template_title = $template_title;
            $this->invitation = new Invitation();
        }
    }

    #[On('save-invitation')]
    public function save($payload)
    {
        $status = $payload['status'];
        $htmlTemplate = $payload['html'];

        if (Auth::guest()) { return; }

        $validationRules = [
            'groom_nickname' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
        ];

        if ($status === 'published') {
            $validationRules += [
                'akad_date' => 'required|date',
                'akad_time' => 'required',
                'akad_location' => 'required|string|max:500',
                'resepsi_date' => 'required|date',
                'resepsi_time' => 'required',
                'resepsi_location' => 'required|string|max:500',
            ];
        }
        
        if ($this->main_photo) {
            $validationRules['main_photo'] = 'image|max:2048'; // 2MB Max
        }
        
        $this->validate($validationRules);

        $data = $this->collectInvitationData($status, $htmlTemplate);

        $invitation = auth()->user()->invitations()->updateOrCreate(['id' => $this->invitationId], $data);
        
        $this->invitationId = $invitation->id;
        $this->invitation = $invitation->fresh();
        $this->existing_photo_path = $invitation->main_photo_path;

        session()->flash('message', $status === 'draft' ? 'Undangan berhasil disimpan sebagai draft!' : 'Selamat! Undangan Anda berhasil dipublikasikan.');

        $this->dispatch('invitation-saved');
    }

    protected function collectInvitationData(string $status, ?string $htmlTemplate): array
    {
        $slug = Str::slug($this->groom_nickname . '-dan-' . $this->bride_nickname) ?: 'undangan-' . Str::lower(Str::random(8));

        $data = [
            'template_title' => $this->template_title,
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
            'html_template' => $htmlTemplate,
        ];
        
        if ($this->main_photo) {
            $data['main_photo_path'] = $this->main_photo->store('photos', 'public');
        }

        return $data;
    }

    public function render()
    {
        return view('livewire.editor-page')->layout('layouts.public');
    }
}