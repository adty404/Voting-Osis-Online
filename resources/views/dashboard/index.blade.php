@extends('dashboard/layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-color: cyan;">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h2 class="font-w600 text-white mb-0 js-appear-enabled animated fadeIn" data-toggle="appear">Dashboard</h2>
                        <h2 class="h4 font-w400 text-white-75 mb-0 js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="250">Welcome Administrator</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- Page Content -->
    <div class="content content-narrow">
        <!-- Stats -->
        <div class="row">
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/siswa">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                            <i class="nav-main-link-icon fa fa-user-alt"></i>
                            Siswa
                        </div>
                        <div class="font-size-h2 font-w400 text-dark">{{$data_siswa_count}}</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/guru">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                            <i class="nav-main-link-icon fa fa-user-graduate"></i>
                            Guru
                        </div>
                        <div class="font-size-h2 font-w400 text-dark">{{$data_guru_count}}</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/staff">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            Staff
                        </div>
                        <div class="font-size-h2 font-w400 text-dark">{{$data_staff_count}}</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                    href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        @if($status == "belumMulai")
                            <div class="font-size-sm font-w600 text-uppercase text-muted">
                                <i class="nav-main-link-icon fa fa-clock"></i>
                                    Status Voting
                                </div>
                            <div class="font-size-h2 font-w400">
                                <button type="button" class="btn btn-sm btn-danger">Belum Dimulai</button>
                            </div>
                        @elseif($status == "sudahMulai")
                            <div class="font-size-sm font-w600 text-uppercase text-muted">
                                <i class="nav-main-link-icon fa fa-clock"></i>
                                    Status Voting
                                </div>
                            <div class="font-size-h2 font-w400">
                                <button type="button" class="btn btn-sm btn-warning">Sedang Dimulai</button>
                            </div>
                        @elseif($status == "sudahSelesai")
                            <div class="font-size-sm font-w600 text-uppercase text-muted">
                                <i class="nav-main-link-icon fa fa-clock"></i>
                                    Status Voting
                            </div>
                            <div class="font-size-h2 font-w400">
                                <button type="button" class="btn btn-success">Sudah Selesai</button>
                            </div>
                        @endif
                    </div>
                </a>
            </div>
            </div>
        <!-- END Stats -->

        <!-- Dashboard Charts -->
        <div class="row">
            @if($status == "belumMulai")
                <div class="col-lg-12">
                    <div class="block">
                        <div class="block-content">
                            <h3>(*)Voting akan dimulai dalam waktu</h3>
                            <h4 id="waktuMulai" align="center" style="color:red;"></h4>
                        </div>
                    </div>
                </div>
            @elseif($status == "sudahMulai")
                <div class="col-lg-12">
                    <div class="block">
                        <div class="block-content">
                            <h3>(*)Hasil Voting akan ditampilkan dalam waktu</h3>
                            <h4 id="waktuTampil" align="center" style="color:red;"></h4>
                        </div>
                    </div>
                </div>
            @elseif($status == "sudahSelesai")
            <div class="col-lg-12">
                <div class="block">
                    <div class="block-content">
                        <h2  align="center">Hasil Vote</h2>
                        <h4 style="color:red;" align="center"><b>Total Suara</b></h4>
                        <p align="center">
                            || <b>{{$nama_kandidat[0]}} = <span style="color:red">{{$kandidat_count0}} SUARA</span> </b> ||
                            || <b>{{$nama_kandidat[1]}} = <span style="color:red">{{$kandidat_count1}} SUARA</span> </b> ||
                            || <b>{{$nama_kandidat[2]}} = <span style="color:red">{{$kandidat_count2}} SUARA</span> </b> ||
                        </p>
                        <div id="hasil_vote" align="center"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- END Dashboard Charts -->
    </div>
    <!-- END Page Content -->
@stop

@section('footer')
    <!-- COUNTDOWN MULAI VOTING -->
    <p id="waktuMulai"></p>
    <script>
        // Set the date we're counting down to
        @foreach($waktuMulai as $wm)
        var countDownDate = new Date("{{$wm->m_d_y}}, {{$wm->jam}}").getTime();
        @endforeach
        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="waktuMulai"
            document.getElementById("waktuMulai").innerHTML = days + "Hari " + hours + " Jam " +
                minutes + "Menit " + seconds + "Detik ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("waktuMulai").innerHTML = "";
            }
        }, 1000);
    </script>

    <!-- COUNTDOWN TAMPIL HASIL VOTING -->
    <p id="waktuTampil"></p>
    <script>
        // Set the date we're counting down to
        @foreach($waktuTampil as $wt)
        var countDownDate2 = new Date("{{$wt->m_d_y}}, {{$wt->jam}}").getTime();
        @endforeach
        // Update the count down every 1 second
        var x2 = setInterval(function () {

            // Get todays date and time
            var now2 = new Date().getTime();

            // Find the distance between now an the count down date
            var distance2 = countDownDate2 - now2;

            // Time calculations for days, hours, minutes and seconds
            var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
            var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

            // Display the result in the element with id="waktuTampil"
            document.getElementById("waktuTampil").innerHTML = days2 + "Hari " + hours2 + " Jam " +
                minutes2 + "Menit " + seconds2 + "Detik ";

            // If the count down is finished, write some text
            if (distance2 < 0) {
                clearInterval(x2);
                document.getElementById("waktuTampil").innerHTML = "";
            }
        }, 1000);
    </script>

    <!-- Highcharts -->
    <script type="text/javascript">
        $(document).ready(function () {
            // Build the chart
            Highcharts.chart('hasil_vote', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Hasil Voting'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Total Pemilih',
                    colorByPoint: true,
                    data: [{
                        name: {!!json_encode($nama_kandidat[0])!!},
                        y: {!!json_encode($kandidat_count0) !!}
                    }, {
                        name: {!!json_encode($nama_kandidat[1])!!},
                        y: {!!json_encode($kandidat_count1)!!},
                        sliced: true,
                        selected: true
                    }, {
                        name: {!!json_encode($nama_kandidat[2])!!},
                        y: {!!json_encode($kandidat_count2)!!}
                    }]
                }]
            });
        });
    </script>
    <!-- END Highcharts -->
@stop