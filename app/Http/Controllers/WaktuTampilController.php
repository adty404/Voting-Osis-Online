<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WaktuTampil;
use App\WaktuMulai;

class WaktuTampilController extends Controller
{
    public function update(Request $request, waktuTampil $waktuTampil){
        $waktuMulai = WaktuMulai::all();

        foreach($waktuMulai as $wm){
            $waktuMulaiMDY = $wm['m_d_y'];
            $waktuMulaiJAM = $wm['jam'];
        }

        $data_waktu_mulai   = date("$waktuMulaiMDY $waktuMulaiJAM");
        $input_waktu_tampil = date("$request->m_d_y $request->jam");
        $now                = date("m/d/Y G:i");

        // dd($data_waktu_tampil, $input_waktu_mulai);
        if($input_waktu_tampil < $data_waktu_mulai){
            return redirect('/waktu')->with('gagalUpdate', 'Update data gagal!');
        }else if($input_waktu_tampil > $data_waktu_mulai){
            $waktuTampil->update($request->all());
            $waktuTampil->save();

            return redirect('/waktu')->with('suksesUpdate', 'Update data berhasil!');
        }
    }
}
