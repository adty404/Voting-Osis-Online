<?php

namespace App\Http\Controllers;
use App\Guru;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $data_guru = Guru::all();

        return view('guru.index', compact(['data_guru']));
    }

    public function getdataguru(){
        $guru = Guru::select('guru.*');

        return \DataTables:: eloquent($guru)
        ->addColumn('aksi', 'guru.action')
        ->rawColumns(['aksi'])
        ->toJson();
    }

    public function create(Request $request){
        $this->validate($request,[
            'npk'           => 'required|unique:guru',
            'nama'          => 'required',
            'status'        => 'required'
        ]);

        //Insert ke table Guru
        $request->request->add(['roles' => 'guru', 'validation_code' => str::random(6) ]);

        $guru                    = Guru::create($request->all());
        $guru->save();

        return redirect('/guru')->with('suksesInput', 'Data Guru berhasil di input');
    }

    public function edit(Guru $guru){
        // dd($siswa->all());
        return view('guru/edit', ['guru' => $guru]);
    }

    public function update(Request $request, Guru $guru){
        /* $this->validate($request,[
            'npk'           => 'required|unique:guru',
            'nama'          => 'required',
            'status'        => 'required'
        ]); */

        $guru->update($request->all());
        $guru->save();

        return redirect('/guru')->with('suksesUpdate', 'Data Guru berhasil di Update');
        // dd($request->all());
    }

    public function delete(Guru $guru){
        $guru->delete($guru);

        return redirect('/guru')->with('suksesDelete', 'Data Guru berhasil di Delete');
    }
}
