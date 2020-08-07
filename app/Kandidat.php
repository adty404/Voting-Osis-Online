<?php

namespace App;
use App\Siswa;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table    = 'kandidat';
    protected $fillable = ['id', 'siswa_id', 'foto', 'visi', 'misi'];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }

    public function getFoto(){
        if(!$this->foto){
            return asset('images/default.png');
        }

        return asset('images/'.$this->foto);
    }
}