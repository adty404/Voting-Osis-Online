<?php

namespace App\Http\Controllers;
use App\Voters;
use App\Siswa;
use App\Guru;
use App\Staff;

use Illuminate\Http\Request;

class VotersController extends Controller
{
    public function index(){
        $data_voters = Voters::all();

        return view('voters.index', compact('data_voters'));
    }

    public function getdatavoters(){
        $voters = Voters::select('voters.*');

        return \DataTables:: eloquent($voters)
        ->addColumn('aksi', 'voters.action')
        ->rawColumns(['aksi'])
        ->toJson();
    }

    public function delete(Voters $voters){
        $siswa_count = Siswa::where(['nis' => $voters->nis_npk])->count();
        $guru_count = Guru::where(['npk' => $voters->nis_npk])->count();
        $staff_count = Staff::where(['npk' => $voters->nis_npk])->count();

        if($siswa_count > 0){
            $siswa = Siswa::where(['nis' => $voters->nis_npk])->first();
            $siswa->status = "Belum Voting";
            $siswa->save();

            $voters->delete($voters);
            return redirect('/voters')->with('suksesDelete', 'Data Voters berhasil di Delete');
        }else if($guru_count > 0){
            $guru = Guru::where(['npk' => $voters->nis_npk])->first();
            $guru->status = "Belum Voting";
            $guru->save();

            $voters->delete($voters);
            return redirect('/voters')->with('suksesDelete', 'Data Voters berhasil di Delete');
        }else if($staff_count > 0){
            $staff = Staff::where(['npk' => $voters->nis_npk])->first();
            $staff->status = "Belum Voting";
            $staff->save();

            $voters->delete($voters);
            return redirect('/voters')->with('suksesDelete', 'Data Voters berhasil di Delete');
        }

        return redirect('/voters')->with('gagalDelete', 'Data Voters tidak berhasil di Delete');
    }
}
