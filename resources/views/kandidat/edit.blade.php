@extends('dashboard/layouts.backend')

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Edit Data Kandidat</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="/kandidat/{{$kandidat->id}}/update" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('siswa_id') ? 'has-error' : ''}}">
                    <label for="editNis">NIS</label>
                    <input type="text" class="form-control" id="editNis" name="siswa_id" placeholder="NIS"
                        value="{{ $kandidat->siswa->nis }}" readonly>
                    @if($errors->has('siswa_id'))
                    <span class="help-block">{{$errors->first('siswa_id')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Visi</label>
                    <textarea name="visi" class="form-control" id="visi" rows="3">{{ $kandidat->visi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Misi</label>
                    <textarea name="misi" class="form-control" id="misi" rows="3">{{ $kandidat->misi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputFoto">Foto</label>
                    <input type="file" name="foto" id="inputFoto" class="form-control" value="{{ $kandidat->foto }}">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <button type="button" onclick="history.back();" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('footer')
<script>
    ClassicEditor
        .create(document.querySelector('#visi'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#misi'))
        .catch(error => {
            console.error(error);
        });
</script>
@stop