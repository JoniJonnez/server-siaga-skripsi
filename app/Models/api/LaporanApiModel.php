<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanApiModel extends Model
{
	protected $table = 'keuangans';
	protected $primaryKey = 'id';
    use HasFactory;
}
