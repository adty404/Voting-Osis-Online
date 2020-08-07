<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuMulai extends Model
{
    protected $table    = 'waktu_mulai';
    protected $fillable = ['m_d_y', 'jam'];
}
