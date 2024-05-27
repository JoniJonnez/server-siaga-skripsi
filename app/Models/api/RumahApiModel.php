<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahApiModel extends Model
{
	protected $table = 'rumahs';
	protected $primaryKey = 'id';
    use HasFactory;
}
