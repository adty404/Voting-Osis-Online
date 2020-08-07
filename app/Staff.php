<?php

namespace App;
use App\Voters;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table    = 'staff';
    protected $fillable = ['npk', 'roles', 'nama', 'status', 'validation_code'];
}