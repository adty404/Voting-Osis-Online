@extends('dashboard/layouts.backend')

@section('content')


@if(session('suksesDelete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('suksesDelete')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('gagalDelete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('gagalDelete')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="content">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Table Voters</h3>
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
                            <th>NIS/NPK</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                            <th>KANDIDAT DIPILIH</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach($data_voters as $voters)
                        <tr>
                            <td class="text-center">{{$voters->nama}}</td>
                            <td class="text-center">{{$voters->nama_kandidat}}</td>
                            <td class="text-center">
                                <a href="/voters/{{$voters->id}}/delete" class="btn btn-danger btn-sm delete"
                                    kandidat-id="{{$voters->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
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


@stop

@section('footer')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{route('ajax.get.data.voters')}}",
                columns: [{
                        data: 'nis_npk',
                        name: 'nis_npk',
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
                        data: 'nama_kandidat',
                        name: 'nama_kandidat',
                        className: "text-center"
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        className: "text-center"
                    },
                ]
            });
        });
    </script>
@stop