@extends('dashboard/layouts.backend')

@section('content')

@if(session('suksesInput'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('suksesInput')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('suksesUpdate'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('suksesUpdate')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('suksesDelete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('suksesDelete')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('kandidatPenuh'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('kandidatPenuh')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Table Kandidat</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-success mr-1 mb-3" data-toggle="modal"
                    data-target="#tambahDataKandidat">
                    <i class="fa fa-fw fa-plus mr-1"></i> Tambah Data Kandidat
                </button>
            </div>
        </div>
        <div class="block-content">
            {{-- <p class="font-size-sm text-muted">
                The first way to make a table responsive is to wrap it with <code>&lt;div
                    class="table-responsive"&gt;&lt;/div&gt;</code>. This way, the table will be horizontally scrollable
                and
                all data will be accessible on smaller screens. You could also append the following modifiers to the
                <code>table-responsive</code> to apply the horizontal scrolling on different screen widths:
                <code>-sm</code>, <code>-md</code>, <code>-lg</code>, <code>-xl</code>.
            </p> --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>JURUSAN</th>
                            <th>VISI</th>
                            <th>MISI</th>
                            <th>FOTO</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_kandidat as $kandidat)
                        <tr>
                            <td class="text-center">{{$kandidat->siswa->nis}}</td>
                            <td class="text-center">{{$kandidat->siswa->nama}}</td>
                            <td class="text-center">{{$kandidat->siswa->kelas}}</td>
                            <td class="text-center">{{$kandidat->siswa->jurusan}}</td>
                            <td class="text-center">{!!$kandidat->visi!!}</td>
                            <td class="text-center">{!!$kandidat->misi!!}</td>
                            <td class="text-center"><img src="{{$kandidat->getFoto()}}" class="img-circle" alt="Foto"
                                    style="width: 200px; height:200px;"></td>
                            <td>
                                <a href="/kandidat/{{$kandidat->id}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm delete"
                                    kandidat-id="{{$kandidat->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="tambahDataKandidat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kandidat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kandidat/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="control-group">
                            <label for="inputNis">NIS</label>
                            <select class="js-selectize" name="siswa_id" id="inputNis" placeholder="Pilih NIS">
                                <option>
                                    @foreach($data_siswa as $siswa)
                                <option value="{{$siswa->id}}">{{$siswa->nis}}</option>
                                @endforeach
                                </option>
                            </select>
                            @if($errors->has('siswa_id'))
                            <span class="help-block">Siswa yang dipilih telah menjadi kandidat</span>
                            @endif
                        </div>
                        <script>
                            $('.js-selectize').selectize();
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Visi</label>
                        <textarea name="visi" class="form-control" id="visi"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Misi</label>
                            <textarea name="misi" class="form-control" id="misi"
                                rows="3"></textarea>
                        </div>
                    {{-- <div class="form-group">
                        <label for="inputNama">NAMA</label>
                        <input type="text" name="nama" class="form-control" id="inputNama" placeholder="NAMA" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputKelas">KELAS</label>
                        <input type="text" name="kelas" class="form-control" id="inputKelas" aria-describedby="KELAS"
                            placeholder="KELAS" value="{{old('kelas')}}" readonly>
                    @if($errors->has('kelas'))
                    <span class="help-block">{{$errors->first('kelas')}}</span>
                    @endif
            </div>
            <div class="form-group">
                <label for="inputJurusan">JURUSAN</label>
                <input type="text" name="jurusan" id="inputJurusan" class="form-control" aria-describedby="JURUSAN"
                    placeholder="JURUSAN" value="{{old('jurusan')}}" readonly>
                @if($errors->has('jurusan'))
                <span class="help-block">{{$errors->first('jurusan')}}</span>
                @endif
            </div> --}}
            <div class="form-group{{$errors->has('foto') ? 'has-error' : ''}}">
                <label for="exampleFormControlTextarea1">Foto</label>
                <input type="file" name="foto" class="form-control">
                @if($errors->has('foto'))
                <span class="help-block">{{$errors->first('foto')}}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
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

<script>
$(document).ready(function () {
        $('.delete').click(function () {
            var kandidat_id = $(this).attr('kandidat-id');
            swal({
                    title: "Apakah anda yakin?",
                    text: "Ingin menghapus data kandidat dengan id " + kandidat_id + "?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/kandidat/" + kandidat_id + "/delete";
                    }
                });
        });
    });
</script>
@stop