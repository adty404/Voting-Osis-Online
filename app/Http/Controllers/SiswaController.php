<?php

namespace App\Http\Controllers;
use App\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $data_siswa = \App\Siswa::all();

        return view('siswa.index', compact(['data_siswa']));
    }

    public function getdatasiswa(){
        $siswa = Siswa::select('siswa.*');

        return \DataTables:: eloquent($siswa)
        ->addColumn('aksi', 'siswa.action')
        ->rawColumns(['aksi'])
        ->toJson();
    }

    public function create(Request $request){
        $this->validate($request,[
            'nis'           => 'required|unique:siswa',
            'nama'          => 'required',
            'kelas'         => 'required',
            'jenis_kelamin' => 'required',
            'jurusan'       => 'required',
            'status'        => 'required'
        ]);

        //Insert ke table Siswa
        $request->request->add(['roles' => 'siswa', 'validation_code' => str::random(6) ]);

        $siswa                    = Siswa::create($request->all());
        $siswa->save();

        return redirect('/siswa')->with('suksesInput', 'Data Siswa berhasil di input');
    }

    public function edit(Siswa $siswa){
        // dd($siswa->all());
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa){
        /* $this->validate($request,[
            'nis'           => 'required|unique:siswa',
            'nama'          => 'required',
            'kelas'         => 'required',
            'jenis_kelamin' => 'required',
            'jurusan'       => 'required',
            'status'        => 'required'
        ]); */

        $siswa->update($request->all());
        $siswa->save();

        return redirect('/siswa')->with('suksesUpdate', 'Data Siswa berhasil di Update');
        // dd($request->all());
    }

    public function delete(Siswa $siswa){
        $siswa->delete($siswa);

        return redirect('/siswa')->with('suksesDelete', 'Data Siswa berhasil di Delete');
    }
}
