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

<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Table Staff</h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-success mr-1 mb-3" data-toggle="modal"
                    data-target="#tambahDataStaff">
                    <i class="fa fa-fw fa-plus mr-1"></i> Tambah Data Staff
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
                <table class="table table-bordered table-striped table-vcenter" id="datatable">
                    <thead>
                        <tr>
                            <th>NPK</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                            <th>VALIDATION CODE</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar7.jpg" alt="">
                            </td>
                            <td class="font-w600 font-size-sm">
                                <a href="be_pages_generic_profile.html">Laura Carr</a>
                            </td>
                            <td class="font-size-sm">client1<em class="text-muted">@example.com</em></td>
                            <td>
                                <span class="badge badge-danger">Disabled</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled"
                                        data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled"
                                        data-toggle="tooltip" title="" data-original-title="Delete">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display: none">
</form>

<div class="modal fade" id="tambahDataStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/staff/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{$errors->has('npk') ? 'has-error' : ''}}">
                        <label for="inputNpk">NPK</label>
                        <input type="text" name="npk" class="form-control" id="inputNpk"
                            aria-describedby="NPK" placeholder="NPK" value="{{old('npk')}}">
                        @if($errors->has('npk'))
                            <span class="help-block">{{$errors->first('npk')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputNama">NAMA</label>
                        <input type="text" name="nama" class="form-control" id="inputNama"
                            aria-describedby="NAMA" placeholder="NAMA" value="{{old('nama')}}">
                        @if($errors->has('nama'))
                            <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('status') ? 'has-error' : ''}}">
                        <label for="inputStatus">Pilih Status Voting</label>
                        <select name="status" class="form-control" id="inputStatus">
                            <option value="Belum Voting" {{(old('status') == 'Belum Voting') ? ' selected' : ''}}>Belum Voting</option>
                            <option value="Sudah Voting" {{(old('status') == 'Sudah Voting') ? ' selected' : ''}}>Sudah Voting</option>
                        </select>
                        @if($errors->has('status'))
                            <span class="help-block">{{$errors->first('status')}}</span>
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
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{route('ajax.get.data.staff')}}",
                columns: [{
                        data: 'npk',
                        name: 'npk',
                        className: "text-center"
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        className: "text-center"
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: "text-center"
                    },
                    {
                        data: 'validation_code',
                        name: 'validation_code',
                        className: "text-center"
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        className: "text-center"
                    },
                ]
            });

            /* $('.delete').click(function () {
                var siswa_id = $(this).attr('siswa-id');
                swal({
                        title: "Apakah anda yakin?",
                        text: "Ingin menghapus data siswa dengan id " + siswa_id + "?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/siswa/" + siswa_id + "/delete";
                        }
                    });
            }); */
        });
    </script>
@stop