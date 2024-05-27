<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    protected $guarded = ['id'], $table = 'pengaduans';

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
