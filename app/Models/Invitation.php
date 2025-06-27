<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'slug',
        'template_title',
        'status',
        'groom_nickname',
        'bride_nickname',
        'akad_date',
        'akad_time',
        'akad_location',
        'resepsi_date',
        'resepsi_time',
        'resepsi_location',
        'love_story',
        'main_photo_path',
        'html_template',
    ];

    /**
     * Get the user that owns the invitation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
