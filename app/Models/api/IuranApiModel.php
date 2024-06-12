<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranApiModel extends Model
{
	protected $table = 'iurans';
	protected $primaryKey = 'id';
    use HasFactory;
}
