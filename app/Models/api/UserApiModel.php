<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApiModel extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
    use HasFactory;
}
