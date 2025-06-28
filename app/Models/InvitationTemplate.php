<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail_path',
        'html_content',
        'is_premium',
        'price',
    ];

    protected function casts(): array
    {
        return [
            'is_premium' => 'boolean',
            'price' => 'decimal:2',
        ];
    }
}