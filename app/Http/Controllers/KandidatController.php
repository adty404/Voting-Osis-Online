<?php

namespace App\Http\Controllers;
use App\Kandidat;
use App\Siswa;
use App\Guru;
use App\Staff;
use App\Voters;
use Response;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Validator;

class KandidatController extends Controller
{
    public function index(){
        $data_kandidat = Kandidat::all();
        $data_siswa    = Siswa::all();

        return view('kandidat.index', compact('data_kandidat', 'data_siswa'));
    }

    /* public function getdatasiswa2(Request $request){
        $nama = DB::table("siswa")
                    ->where("nis",$request->nis);
        return json_encode($nama);

        return response()->json(['html' => $html]);
    } */

    public function create(Request $request){
        /* $validator = Validator::make($request->all(), [
            'siswa_id' => 'required|unique:kandidat',
            'foto' => 'mimes:jpeg,png,bmp,gif,svg',
        ]); */

        $this->validate($request,[
            'siswa_id' => 'required|unique:kandidat',
            'foto'        => 'mimes:jpg,png'
        ]);

        $kandidat_count = DB::table('kandidat')->count();
        if($kandidat_count == 3){
            return redirect('/kandidat')->with('kandidatPenuh', 'Jumlah Kandidat sudah penuh!');
        }

        $kandidat = new Kandidat;
        if($request->hasFile('foto')){
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            $kandidat->foto = $request->file('foto')->getClientOriginalName();
        }else{
            $kandidat->foto = "default.png";
        }
        $kandidat->siswa_id = $request->siswa_id;
        $kandidat->visi     = $request->visi;
        $kandidat->misi     = $request->misi;
        $kandidat->save();

        return redirect('/kandidat')->with('suksesInput', 'Data Kandidat berhasil ditambahkan!');
    }

    public function edit(Kandidat $kandidat){
        // dd($siswa->all());
        return view('kandidat/edit', ['kandidat' => $kandidat]);
    }

    public function update(Request $request, Kandidat $kandidat){
        $this->validate($request,[
            'foto'        => 'mimes:jpg,png',
        ]);

        if($request->hasFile('foto')){
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            $kandidat->foto = $request->file('foto')->getClientOriginalName();
        }
        $kandidat->visi = $request->visi;
        $kandidat->misi = $request->misi;
        $kandidat->save();

        return redirect('/kandidat')->with('suksesUpdate', 'Data Kandidat berhasil di Update');
        // dd($request->all());
    }

    public function delete(Kandidat $kandidat){
        $kandidat = Kandidat::where('id', $kandidat->id)->first(); //Cari ditable kandidat yang jadi kandidat
        $kandidat2 = Siswa::where('id', $kandidat->siswa_id)->first();
        $data_voters = Voters::where('nama_kandidat', $kandidat2->nama)->get(); //Cari ditable voters, kandidat terpilih lalu diambil nama votersnya

        $nama_voters = [];
        foreach($data_voters as $dv){
            $nama_voters[] = $dv->nama;
        }

        $cek_siswa = Siswa::whereIn('nama', $nama_voters)->get();
        $cek_guru = Guru::whereIn('nama', $nama_voters)->get();
        $cek_staff = Staff::whereIn('nama', $nama_voters)->get();
        if($cek_siswa->count() >= 0){
            $siswa2 = Siswa::whereIn('nama', $nama_voters)->update(['status' => 'Belum Voting']);
            Voters::whereIn('nama', $nama_voters)->delete();

            $kandidat->delete($kandidat);
            return redirect('/kandidat')->with('suksesDelete', 'Data Kandidat berhasil di Delete');
        }else if($cek_guru->count() >= 0){
            $guru = Guru::whereIn('nama', $nama_voters)->update(['status' => 'Belum Voting']);
            Voters::whereIn('nama', $nama_voters)->delete();

            $kandidat->delete($kandidat);
            return redirect('/kandidat')->with('suksesDelete', 'Data Kandidat berhasil di Delete');
        }else if($cek_staff->count() >= 0){
            $staff = Staff::whereIn('nama', $nama_voters)->update(['status' => 'Belum Voting']);
            Voters::whereIn('nama', $nama_voters)->delete();

            $kandidat->delete($kandidat);
            return redirect('/kandidat')->with('suksesDelete', 'Data Kandidat berhasil di Delete');
        }
    }
}
