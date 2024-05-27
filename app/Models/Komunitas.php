<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;
    protected $table = 'komunitas', $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function iuranPengguna()
    {
        return $this->belongsTo(IuranPengguna::class);
    }



    // protected $guarded = ['id'], $table = 'pengaduans';
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(user::class, 'user_id', 'id');
    // }
}
