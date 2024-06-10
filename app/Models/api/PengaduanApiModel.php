<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanApiModel extends Model
{
	protected $table = 'pengaduans';
	protected $primaryKey = 'id';
    use HasFactory;
}
