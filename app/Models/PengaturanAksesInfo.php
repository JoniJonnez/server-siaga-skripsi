<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanAksesInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'pengaturan_akses_infos';
}
