@extends('dashboard/layouts.backend')

@section('content')
<div class="content">
        @if(session('suksesUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('suksesUpdate')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('gagalUpdate'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('gagalUpdate')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    <div class="block">
        <div class="block-header">
            <h2 class="block-title">Data Waktu</h2>
        </div>
        <div class="block-content">
            <p style="color:red"><b>Keterangan:</b></p>
            <ol type="1">
                <li>Waktu Mulai tidak bisa diinput melebihi Waktu Tampil</li>
                <li>Waktu Tampil tidak bisa diinput kurang dari Waktu Mulai</li>
            </ol>
            <div class="row">
                {{-- <div class="col-sm-6 col-xl-6">
                    <a href="/" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Tambah Waktu Mulai
                    </a>
                    <div class="mt-2">
                    </div>
                </div>
                <div class="col-sm-6 col-xl-6">
                    <div class="col-sm-6 col-xl-6">
                        <a href="" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            Tambah Waktu Tampil
                        </a>
                        <div class="mt-2">
                        </div>
                    </div>
                    <div class="mt-2">
                    </div>
                </div> --}}
                <div class="col-md-6 col-xl-6">
                    <div class="block block-themed">
                        <div class="block-header bg-warning">
                            @foreach($data_waktu_mulai as $dwm)
                            <h3 class="block-title">
                                Waktu Mulai =
                                <span style="color:black;">
                                    {{$dwm->m_d_y}}, {{$dwm->jam}}
                                </span>
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-clock"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                        <form action="/waktuMulai/{{$dwm->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="mdy">Bulan, Tanggal dan Tahun :</label>
                                    <input type="text" class="js-datepicker form-control js-datepicker-enabled"
                                        id="mdy" name="m_d_y" placeholder="dd/mm/yy"
                                        value="{{$dwm->m_d_y}}">
                                </div>
                                <div class="form-group">
                                    <label for="jam">Time Format</label>
                                    <input type="text" class="js-masked-time form-control js-masked-enabled"
                                        id="jam" name="jam" placeholder="00:00"
                                        value="{{$dwm->jam}}">
                                    {{-- <input type="text" class="masked-time form-control" data-mask="00:00"
                                        id="jam" name="jam" placeholder="00:00"> --}}
                                </div>

                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="block block-themed">
                        <div class="block-header bg-success">
                            @foreach($data_waktu_tampil as $dwt)
                            <h3 class="block-title">
                                Waktu Tampil =
                                <span style="color:black">
                                    {{$dwt->m_d_y}}, {{$dwt->jam}}
                                </span>
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-clock"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                        <form action="/waktuTampil/{{$dwt->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="mdy">Bulan, Tanggal dan Tahun :</label>
                                    <input type="text" class="js-datepicker form-control js-datepicker-enabled"
                                        id="mdy" name="m_d_y" placeholder="dd/mm/yy"
                                        value="{{$dwt->m_d_y}}">
                                </div>
                                <div class="form-group">
                                    <label for="jam">Time Format</label>
                                    <input type="text" class="js-masked-time form-control js-masked-enabled"
                                        id="jam" name="jam" placeholder="00:00"
                                        value="{{$dwt->jam}}">
                                    {{-- <input type="text" class="masked-time form-control" data-mask="00:00"
                                            id="jam" name="jam" placeholder="00:00"> --}}
                                </div>

                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script>
    jQuery(function () {
        One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']);
    });
</script>
<script>
    $(document).ready(function () {
        $('.date').mask('00/00/0000');
        //   $('.js-masked-time').mask('00:00:00');
    })
</script>
<script>
    $('.js-datepicker').datepicker({
        format: 'mm/dd/yyyy',
        todayHighlight: 'true',
        autoclose: 'true',
        weekStart: 2
    });
</script>
@stop