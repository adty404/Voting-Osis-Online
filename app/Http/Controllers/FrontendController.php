<?php

namespace App\Http\Controllers;
use Session;
use App\Siswa;
use App\Guru;
use App\Staff;
use App\Kandidat;
use App\Voters;
use App\WaktuMulai;
use App\WaktuTampil;

use DB;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
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
            return view('frontend.index',
                         compact([
                                    'data_kandidat', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2'
                                ]));
        }else if($data_waktu_mulai > $now){
            $status = "belumMulai";
            return view('frontend.index', compact(['data_kandidat', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
        }else if($data_waktu_mulai < $now){
            $status = "sudahMulai";
            return view('frontend.index', compact(['data_kandidat', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
        }

        return view('frontend.index', compact(['data_kandidat', 'waktuMulai', 'waktuTampil', 'now', 'status', 'nama_kandidat', 'foto_kandidat', 'kandidat_count0', 'kandidat_count1',    'kandidat_count2']));
    }

    public function validasi_vote(){
        $waktuMulai = WaktuMulai::all();
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

        if($data_waktu_mulai > $now){
            return redirect('/')->with('belumMulai', 'Waktu Pemilihan Belum Dimulai!');
        }else if($data_waktu_tampil < $now){
            return redirect('/')->with('waktuHabis', 'Waktu Pemilihan Sudah Habis!');
        }else if($data_waktu_mulai < $now && Session::has('validation_code')){
            $data_kandidat = Kandidat::all();
            return view('frontend.voting', compact(['data_kandidat']));
        }else if($data_waktu_mulai < $now){
            return view('frontend.validasi-vote');
        }
    }

    public function post_validasi_vote(Request $request){
        // dd($request->all());
        $siswa = Siswa::where('nis', $request->nis_npk)->first();
        $guru  = Guru::where('npk', $request->nis_npk)->first();
        $staff = Staff::where('npk', $request->nis_npk)->first();

        //PROSES VALIDASI SISWA
        if($siswa){
            $voters_check_siswa_count = Voters::where(['nis_npk' => $siswa->nis])->count();

            if($voters_check_siswa_count > 0){
                return redirect('/validasiVote')->with('gagalValidasi', 'Anda telah melakukan pemilihan!');
            }else{
                $validation_code_count = Siswa::where(['nis' => $request->nis_npk, 'validation_code' => $request->validation_code])->count();

                    if($validation_code_count > 0){
                        $siswa = DB::table('siswa')->where('nis', $request->nis_npk)->first();

                        Session:: put('nama', $siswa->nama);
                        Session:: put('nis', $request->nis_npk);
                        Session:: put('validation_code', $request->validation_code);

                        return redirect('/voting');
                    }
            }


        //PROSES VALIDASI GURU
        }else if($guru){
            $voters_check_guru_count = Voters::where(['nis_npk' => $guru->npk])->count();

            if($voters_check_guru_count > 0){
                return redirect('/validasiVote')->with('gagalValidasi', 'Anda telah melakukan pemilihan!');
            }else{
                $validation_code_count2 = Guru::where(['npk' => $request->nis_npk, 'validation_code' => $request->validation_code])->count();

                    if($validation_code_count2 > 0){
                        $guru = DB::table('guru')->where('npk', $request->nis_npk)->first();

                        Session:: put('npk', $request->nis_npk);
                        Session:: put('nama', $guru->nama);
                        Session:: put('validation_code', $request->validation_code);

                        return redirect('/voting');
                    }
            }


        //PROSES VALIDASI STAFF
        }else if($staff){
            $voters_check_staff_count = Voters::where(['nis_npk' => $staff->npk])->count();

            if($voters_check_staff_count > 0){
                return redirect('/validasiVote')->with('gagalValidasi', 'Anda telah melakukan pemilihan!');
            }else{
                $validation_code_count3 = Staff::where(['npk' => $request->nis_npk, 'validation_code' => $request->validation_code])->count();

                    if($validation_code_count3 > 0){
                        $staff = DB::table('staff')->where('npk', $request->nis_npk)->first();

                        Session:: put('npk', $request->nis_npk);
                        Session:: put('nama', $staff->nama);
                        Session:: put('validation_code', $request->validation_code);

                        return redirect('/voting');
                    }
            }


        }
        return redirect('/validasiVote')->with('error', 'Data tidak ditemukan!');
    }

    public function voting(){
        $waktuMulai = WaktuMulai::all();
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

        if($data_waktu_mulai > $now){
            return redirect('/')->with('belumMulai', 'Waktu Pemilihan Belum Dimulai!');
        }else if($data_waktu_tampil < $now){
            return redirect('/')->with('waktuHabis', 'Waktu Pemilihan Sudah Habis!');
        }else if($data_waktu_mulai < $now && Session::has('validation_code')){
            $data_kandidat = Kandidat::all();
            return view('frontend.voting', compact(['data_kandidat']));
        }else if($data_waktu_mulai < $now && !Session::has('validation_code')){
            return redirect('/validasiVote')->with('masukkanData', 'Silahkan masukkan Data terlebih dahulu sebelum melakukan Pemilihan!');
        }
    }

    public function postVoting(Request $request){
        $waktuMulai = WaktuMulai::all();
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

        if($data_waktu_tampil < $now){
            Session:: flush();

            return redirect('/')->with('waktuHabis', 'Waktu Pemilihan Sudah Habis!');
        }else if($data_waktu_tampil > $now){
            $siswa = Siswa::where('nis', $request->nis_npk)->first();
            $guru  = Guru::where('npk', $request->nis_npk)->first();
            $staff = Staff::where('npk', $request->nis_npk)->first();

            if($siswa){
                $voters_check_siswa_count = Voters::where(['nis_npk' => $siswa->nis])->count();

                if($voters_check_siswa_count > 0){
                    return redirect('/voting')->with('gagalVote', 'Anda telah melakukan pemilihan!');
                }else{
                    $nis_npk_count1 = DB::table('siswa')
                                    ->where(['nis' => $request->nis_npk],
                                            ['status' => "Belum Voting"],
                                    )
                                    ->count();

                    $voters = new Voters;
                    if($nis_npk_count1 > 0){
                        $siswa                 = Siswa::where('nis', $request->nis_npk)->first();
                        $kandidat              = Kandidat::where('id', $request->kandidat_id)->first();
                        $voters->nis_npk       = $siswa->nis;
                        $voters->status        = "SISWA";
                        $voters->nama          = $siswa->nama;
                        $voters->nama_kandidat = $kandidat->siswa->nama;
                        $voters->save();

                        $siswa->status = "Sudah Voting";
                        $siswa->save();

                        return redirect('/logoutFinishVoting');
                    }
                }

            }else if($guru){
                $voters_check_guru_count = Voters::where(['nis_npk' => $guru->npk])->count();

                if($voters_check_guru_count > 0){
                    return redirect('/voting')->with('gagalVote', 'Anda telah melakukan pemilihan!');
                }else{
                    $nis_npk_count2 = DB::table('guru')
                                    ->where(['npk' => $request->nis_npk],
                                            ['status' => "Belum Voting"],
                                    )
                                    ->count();

                    $voters = new Voters;
                    if($nis_npk_count2 > 0){
                        $guru                  = Guru::where('npk', $request->nis_npk)->first();
                        $kandidat              = Kandidat::where('id', $request->kandidat_id)->first();
                        $voters->nis_npk       = $guru->npk;
                        $voters->status        = "GURU";
                        $voters->nama          = $guru->nama;
                        $voters->nama_kandidat = $kandidat->siswa->nama;
                        $voters->save();

                        $guru->status = "Sudah Voting";
                        $guru->save();

                        return redirect('/logoutFinishVoting');
                    }
                }

            }else if($staff){
                $voters_check_staff_count = Voters::where(['nis_npk' => $staff->npk])->count();

                if($voters_check_staff_count > 0){
                    return redirect('/voting')->with('gagalVote', 'Anda telah melakukan pemilihan!');
                }else{
                    $nis_npk_count3 = DB::table('staff')
                                    ->where(['npk' => $request->nis_npk],
                                            ['status' => "Belum Voting"],
                                    )
                                    ->count();

                    $voters = new Voters;
                    if($nis_npk_count3 > 0){
                        $staff                 = Staff::where('npk', $request->nis_npk)->first();
                        $kandidat              = Kandidat::where('id', $request->kandidat_id)->first();
                        $voters->nis_npk       = $staff->npk;
                        $voters->status        = "STAFF";
                        $voters->nama          = $staff->nama;
                        $voters->nama_kandidat = $kandidat->siswa->nama;
                        $voters->save();

                        $staff->status = "Sudah Voting";
                        $staff->save();

                        return redirect('/logoutFinishVoting');
                    }
                }

            }
        }
        return redirect('/voting')->with('gagalVote', 'Anda telah melakukan Pemilihan!');
    }

    public function logoutVoting(){
        Session:: flush();

        return redirect('/');
    }

    public function logoutFinishVoting(){
        Session:: flush();

        return redirect('/')->with('suksesVote', 'Berhasil melakukan Pemilihan!');
    }

}