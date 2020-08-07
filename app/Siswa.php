<?php

namespace App;
use App\Kandidat;
use App\Voters;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table    = 'siswa';
    protected $fillable = ['kandidat_id', 'nis', 'roles', 'nama', 'kelas', 'jenis_kelamin', 'jurusan', 'status', 'validation_code'];
    // protected $fillable = ['nis', 'nama', 'kelas', 'jenis_kelamin', 'jurusan', 'status'];

    public function kandidat(){
        return $this->hasMany(Kandidat::class);
    }

    public function kelas_jurusan(){
        return $this->kelas.' '.$this->jurusan;
    }
}
