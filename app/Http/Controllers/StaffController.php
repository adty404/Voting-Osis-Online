<?php

namespace App\Http\Controllers;
use App\Staff;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $data_staff = Staff::all();

        return view('staff.index', compact(['data_staff']));
    }

    public function getdatastaff(){
        $staff = Staff::select('staff.*');

        return \DataTables:: eloquent($staff)
        ->addColumn('aksi', 'staff.action')
        ->rawColumns(['aksi'])
        ->toJson();
    }

    public function create(Request $request){
        $this->validate($request,[
            'npk'           => 'required|unique:staff',
            'nama'          => 'required',
            'status'        => 'required'
        ]);

        //Insert ke table Staff
        $request->request->add(['roles' => 'staff', 'validation_code' => str::random(6) ]);

        $staff                    = Staff::create($request->all());
        $staff->save();

        return redirect('/staff')->with('suksesInput', 'Data Staffberhasil di input');
    }

    public function edit(Staff $staff){
        // dd($siswa->all());
        return view('staff/edit', ['staff' => $staff]);
    }

    public function update(Request $request, Staff $staff){
        /* $this->validate($request,[
            'npk'           => 'required|unique:staff',
            'nama'          => 'required',
            'status'        => 'required'
        ]); */

        $staff->update($request->all());
        $staff->save();

        return redirect('/staff')->with('suksesUpdate', 'Data Staff berhasil di Update');
        // dd($request->all());
    }

    public function delete(Staff $staff){
        $staff->delete($staff);

        return redirect('/staff')->with('suksesDelete', 'Data Staff berhasil di Delete');
    }
}