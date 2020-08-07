<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WaktuMulai;
use App\WaktuTampil;

class WaktuMulaiController extends Controller
{
    public function update(Request $request, waktuMulai $waktuMulai){
        $waktuTampil = WaktuTampil::all();

        foreach($waktuTampil as $wt){
            $waktuTampilMDY = $wt['m_d_y'];
            $waktuTampilJAM = $wt['jam'];
        }

        $data_waktu_tampil = date("$waktuTampilMDY $waktuTampilJAM");
        $input_waktu_mulai = date("$request->m_d_y $request->jam");
        $now               = date("m/d/Y G:i");

        // dd($input_waktu_mulai, $now);
        // dd($input_waktu_mulai, $data_waktu_tampil);


        if($input_waktu_mulai > $data_waktu_tampil){
            return redirect('/waktu')->with('gagalUpdate', 'Update data gagal!');
        }else if($input_waktu_mulai < $now){
            $waktuMulai->update($request->all());
            $waktuMulai->save();

            return redirect('/waktu')->with('suksesUpdate', 'Update data berhasil!');
        }else if($input_waktu_mulai > $now){
            $waktuMulai->update($request->all());
            $waktuMulai->save();

            return redirect('/waktu')->with('suksesUpdate', 'Update data berhasil!');
        }
    }
}