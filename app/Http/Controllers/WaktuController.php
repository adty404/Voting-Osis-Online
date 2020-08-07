<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WaktuMulai;
use App\WaktuTampil;

class WaktuController extends Controller
{
    public function index(){
        $data_waktu_mulai  = WaktuMulai::all();
        $data_waktu_tampil = WaktuTampil::all();

        return view('waktu.waktu_mulai_dan_tampil', compact(['data_waktu_mulai','data_waktu_tampil']));
    }
}
