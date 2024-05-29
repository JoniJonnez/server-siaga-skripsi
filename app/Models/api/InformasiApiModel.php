<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiApiModel extends Model
{
	protected $table = 'informasis';
	protected $primaryKey = 'id';
    use HasFactory;
}
