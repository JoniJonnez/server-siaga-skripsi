<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IuranPengguna extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'iuran_penggunas';
    public function iuran(): BelongsTo
    {
        return $this->belongsTo(Iuran::class, 'iuran_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
