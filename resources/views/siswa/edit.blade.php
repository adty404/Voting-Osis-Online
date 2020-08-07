@extends('dashboard/layouts.backend')

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Edit Data Siswa</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('nis') ? 'has-error' : ''}}">
                    <label for="editNis">NIS</label>
                    <input type="text" class="form-control" id="editNis" name="nis" placeholder="NIS"
                        value="{{ $siswa->nis }}">
                    @if($errors->has('nis'))
                        <span class="help-block">{{$errors->first('nis')}}</span>
                    @endif
                </div>
                <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}}">
                    <label for="editNama">NAMA</label>
                    <input type="text" class="form-control" id="editNama" name="nama" placeholder="NAMA"
                        value="{{ $siswa->nama }}">
                    @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pilihKelas">Pilih Kelas</label>
                    <select class="form-control" id="pilihKelas" name="kelas">
                        <option value="10" @if($siswa -> kelas == '10') selected @endif>10</option>
                        <option value="11" @if($siswa -> kelas == '11') selected @endif>11</option>
                        <option value="12" @if($siswa -> kelas == '12') selected @endif>12</option>
                    </select>
                    @if($errors->has('kelas'))
                        <span class="help-block">{{$errors->first('kelas')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pilihJurusan">Pilih Jurusan</label>
                    <select class="form-control" id="pilihJurusan" name="jurusan">
                        <option value="Rekayasa Perangkat Lunak" @if($siswa -> jurusan == 'Rekayasa Perangkat Lunak') selected @endif>Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer Jaringan" @if($siswa -> jurusan == 'Teknik Komputer Jaringan') selected @endif>Teknik Komputer Jaringan</option>
                        <option value="Multimedia" @if($siswa -> jurusan == 'Multimedia') selected @endif>Multimedia</option>
                    </select>
                    @if($errors->has('jurusan'))
                        <span class="help-block">{{$errors->first('jurusan')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pilihStatus">Pilih Status</label>
                    <select class="form-control" id="pilihStatus" name="status">
                        <option value="Belum Voting" @if($siswa -> status == 'Belum Voting') selected @endif>Belum Voting</option>
                        <option value="Sudah Voting" @if($siswa -> status == 'Sudah Voting') selected @endif>Sudah Voting</option>
                    </select>
                    @if($errors->has('status'))
                        <span class="help-block">{{$errors->first('status')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <button type="button" onclick="history.back();" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('footer')
@stop