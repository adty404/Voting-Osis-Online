<?php

namespace App;
use App\Voters;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table    = 'guru';
    protected $fillable = ['npk', 'roles', 'nama', 'status', 'validation_code'];
}