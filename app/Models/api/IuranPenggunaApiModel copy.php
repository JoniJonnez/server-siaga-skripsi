<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranPenggunaApiModel extends Model
{
	protected $table = 'iuran_penggunas';
	protected $primaryKey = 'id';
    use HasFactory;
}
