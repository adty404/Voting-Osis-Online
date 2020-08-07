<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Guru;
use App\Staff;
use App\Kandidat;
use App\Voters;
use App\WaktuMulai;
use App\WaktuTampil;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $data_siswa_count = Siswa::all()->count();
        $data_guru_count  = Guru::all()->count();
        $data_staff_count = Staff::all()->count();

        $data_kandidat = Kandidat::all();
        $waktuMulai    = WaktuMulai::all();
        foreach($waktuMulai as $wm){
            $waktuMulaiMDY = $wm['m_d_y'];
            $waktuMulaiJAM = $wm['jam'];
        }

        $waktuTampil = WaktuTampil::all();
        foreach($waktuTampil as $wt){
            $waktuTampilMDY = $wt['m_d_y'];
            $waktuTampilJAM = $wt['jam'];
        }

        $data_waktu_mulai  = date("$waktuMulaiMDY $waktuMulaiJAM");
        $data_waktu_tampil = date("$waktuTampilMDY $waktuTampilJAM");
        $now               = date("m/d/Y G:i");

        $nama_kandidat = [];
        $foto_kandidat = [];
        foreach($data_kandidat as $dk){
            $nama_kandidat[] = $dk->siswa->nama;
            $foto_kandidat[] = $dk->foto;
        }

        $kandidat_check0 = Voters::where('nama_kandidat', $nama_kandidat[0])->get();
        $kandidat_check1 = Voters::where('nama_kandidat', $nama_kandidat[1])->get();
        $kandidat_check2 = Voters::where('nama_kandidat', $nama_kandidat[2])->get();

        $kandidat_count0 = $kandidat_check0->count();
        $kandidat_count1 = $kandidat_check1->count();
        $kandidat_count2 = $kandidat_check2->count();

        if($data_waktu_tampil < $now){
            $status = "sudahSelesai";

            return view('dashboard.index', compact(['data_siswa_count', 'data_guru_count', 'data_staff_count', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
        }else if($data_waktu_mulai > $now){
            $status = "belumMulai";

            return view('dashboard.index', compact(['data_siswa_count', 'data_guru_count', 'data_staff_count', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
        }else if($data_waktu_mulai < $now){
            $status = "sudahMulai";

            return view('dashboard.index', compact(['data_siswa_count', 'data_guru_count', 'data_staff_count', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
        }

        return view('dashboard.index', compact(['data_siswa_count', 'data_guru_count', 'data_staff_count', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
    }
}
