<?php

namespace App;
use App\Siswa;
use App\Guru;
use App\Staff;

use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    protected $table    = 'voters';
    protected $fillable = ['nis_npk', 'nama', 'nama_kandidat'];
}
