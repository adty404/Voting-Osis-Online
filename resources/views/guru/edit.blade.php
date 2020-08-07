@extends('dashboard/layouts.backend')

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Edit Data Guru</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="/guru/{{$guru->id}}/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('npk') ? 'has-error' : ''}}">
                    <label for="editNpk">NPK</label>
                    <input type="text" class="form-control" id="editNpk" name="npk" placeholder="NPK"
                        value="{{ $guru->npk }}">
                    @if($errors->has('npk'))
                        <span class="help-block">{{$errors->first('npk')}}</span>
                    @endif
                </div>
                <div class="form-group{{$errors->has('nama') ? 'has-error' : ''}}">
                    <label for="editNama">NAMA</label>
                    <input type="text" class="form-control" id="editNama" name="nama" placeholder="NAMA"
                        value="{{ $guru->nama }}">
                    @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pilihStatus">Pilih Status</label>
                    <select class="form-control" id="pilihStatus" name="status">
                        <option value="Belum Voting" @if($guru -> status == 'Belum Voting') selected @endif>Belum Voting</option>
                        <option value="Sudah Voting" @if($guru -> status == 'Sudah Voting') selected @endif>Sudah Voting</option>
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