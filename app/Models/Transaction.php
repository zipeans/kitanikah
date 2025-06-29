<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'invitation_id',
        'order_id',
        'gross_amount',
        'payment_type',
        'transaction_status',
        'snap_token',
    ];

    /**
     * Relasi ke model User.
     * Sebuah transaksi dimiliki oleh satu pengguna.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Invitation.
     * Sebuah transaksi terkait dengan satu undangan.
     */
    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }
}