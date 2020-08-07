<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuTampil extends Model
{
    protected $table    = 'waktu_tampil';
    protected $fillable = ['m_d_y', 'jam'];
}