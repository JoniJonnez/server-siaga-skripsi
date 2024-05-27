<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rumah extends Model
{
    use HasFactory;
    protected $table = 'rumahs', $guarded = ['id'];

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected $guarded = ['id'], $table = 'pengaduans';

}
