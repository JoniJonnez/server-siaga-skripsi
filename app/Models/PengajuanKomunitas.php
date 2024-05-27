<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKomunitas extends Model
{
    use HasFactory;
    protected $guarded = ['id'], $table = 'pengajuan_komunitas';
}
