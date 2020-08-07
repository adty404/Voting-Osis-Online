<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Voting Osis Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="{{asset('/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/stack-interface.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/socicon.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/lightbox.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/flickity.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/iconsmind.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/jquery.steps.css')}}" rel="stylesheet" type=" text/css" media="all" />
    <link href="{{asset('/frontend/css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/frontend/css/custom.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
        response.setHeader("Set-Cookie", "HttpOnly;Secure;SameSite=Strict");
    </script>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- END Highcharts -->
</head>

<body class=" ">
    <div class="nav-container ">
        <div class="bar bar--sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <a href="/">
                            <img class="logo logo-dark" alt="logo" src="{{ asset('frontend/img/logo-dark.png') }}" />
                            <img class="logo logo-light" alt="logo" src="{{ asset('frontend/img/logo-light.png') }}" />
                        </a>
                    </div>
                    <div class="col-9 col-md-10 text-right">
                        <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                            <i class="icon icon--sm stack-interface stack-menu"></i>
                        </a>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
        <!--end bar-->
        <div class="nav-container ">
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 hidden-xs">
                            <div class="bar__module">
                                <a href="/">
                                    <img class="logo logo-dark" alt="logo"
                                        src="{{ asset('frontend/img/logo-dark.png') }}" />
                                    <img class="logo logo-light" alt="logo"
                                        src="{{ asset('frontend/img/logo-light.png') }}" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                            <div class="bar__module">
                                <a class="btn btn--sm type--uppercase" href="/">
                                    <span class="btn__text">
                                        HOME
                                    </span>
                                </a>
                                <a class="btn btn--sm btn--primary type--uppercase" href="/validasiVote">
                                    <span class="btn__text">
                                        VOTE NOW
                                    </span>
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>
        <div class="main-container">
            <section>
                <div class="container">
                    <div class="row align-items-center justify-content-around">
                        <div class="col-md-6 col-lg-5">
                            <h1>
                                Welcome
                            </h1>
                            <p class="lead">
                                An Online Voting System for Senior High School Voting
                            </p>
                            <a class="btn btn--primary type--uppercase" href="/validasiVote">
                                <span class="btn__text">
                                    VOTE NOW
                                </span>
                            </a>
                        </div>
                        <div class="col-6">
                            <img alt="Image" src="{{ asset('frontend/img/crypto-1.svg') }}" />
                        </div>
                    </div>
                </div>
            </section>
            @foreach($waktuMulai as $wm)
            @if($status == "belumMulai")
            <section class="text-center bg--secondary">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h2>Voting akan dimulai dalam</h2>
                            <div id='waktuMulai' align='center' style='font-size:30px;'></div>
                            <hr>
                            </hr>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            @elseif($status == "sudahMulai")
            <section class="text-center bg--secondary">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h2>Hasil Voting akan ditampilkan dalam</h2>
                            <div id='waktuTampil' align='center' style='font-size:30px;'></div>
                            <hr>
                            </hr>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            @elseif($status == "sudahSelesai")
            <section class="text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h2>Hasil Vote</h2>
                            <h4 style="color:red;"><b>Total Suara</b></h4>
                            <p>
                                || <b>{{$nama_kandidat[0]}} = <span style="color:red">{{$kandidat_count0}} SUARA</span> </b> ||
                                <b>{{$nama_kandidat[1]}} = <span style="color:red">{{$kandidat_count1}} SUARA</span> </b> ||
                                <b>{{$nama_kandidat[2]}} = <span style="color:red">{{$kandidat_count2}} SUARA</span> </b> ||
                            </p>
                            <div id="hasil_vote"></div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            @if($kandidat_count0 > $kandidat_count1 && $kandidat_count0 > $kandidat_count2)
            <section class="switchable feature-large">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <img alt="img" class="border--round" width="600"
                                src="{{ asset('images') }}/{{$foto_kandidat[0]}}">
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="switchable__text">
                                <h3>Selamat kepada <br> <b>{{$nama_kandidat[0]}}</b> sebagai kandidat terpilih</h3>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            @elseif($kandidat_count1 > $kandidat_count0 && $kandidat_count1 > $kandidat_count2)
            <section class="switchable feature-large">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <img alt="img" class="border--round" width="600"
                                src="{{ asset('images') }}/{{$foto_kandidat[1]}}">
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="switchable__text">
                                <h3>Selamat kepada <b>{{$nama_kandidat[1]}}</b> sebagai kandidat terpilih</h3>
                                <p class="lead">
                                    Launching an attractive and scalable website quickly and affordably is important for
                                    modern startups — Stack offers massive value without looking 'bargain-bin'.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            @elseif($kandidat_count2 > $kandidat_count0 && $kandidat_count2 > $kandidat_count1)
            <section class="switchable feature-large">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <img alt="img" class="border--round" width="600"
                                src="{{ asset('images') }}/{{$foto_kandidat[2]}}">
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div class="switchable__text">
                                <h3>Selamat kepada <b>{{$nama_kandidat[2]}}</b> sebagai kandidat terpilih</h3>
                                <p class="lead">
                                    Launching an attractive and scalable website quickly and affordably is important for
                                    modern startups — Stack offers massive value without looking 'bargain-bin'.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            @endif
            @endif
            @endforeach
            <section class="text-center bg--secondary">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h1>Kandidat</h1>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="text-center bg--secondary ">
                <div class="container">
                    <div class="row">
                        @foreach($data_kandidat as $kandidat)
                        <div class="col-md-4 input-radio">
                            <div class="feature feature-8">
                                <img alt="Image" src="{{$kandidat->getFoto()}}" style="width: 200px; height:200px;" />
                                <h5>{{$kandidat->siswa->nama}}</h5>
                                <span>{{$kandidat->siswa->kelas_jurusan()}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="switchable ">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-md-6">
                            <div class="slider box-shadow-wide border--round" data-paging="true">
                                <ul class="slides">
                                    @foreach($data_kandidat as $k)
                                    <li>
                                        <img alt="img" src="{{$k->getFoto()}}" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <ul class="accordion accordion-1 accordion--oneopen">
                                @foreach($data_kandidat as $k)
                                <li class="active">
                                    <div class="accordion__title">
                                        <span class="h5">{{$k->siswa->nama}}</span>
                                    </div>
                                    <div class="accordion__content">
                                        <p class="lead">
                                            VISI : <br>
                                            {!!$k->visi!!}
                                        </p>
                                        <p class="lead">
                                            MISI : <br>
                                            {!! $k->misi !!}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <!--end accordion-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class="text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h1>Langkah-langkah Voting</h1>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class=" ">
                <div class="container">
                    <div class="process-2 row">
                        <div class="col-md-3">
                            <div class="process__item">
                                <h5>Menuju ke halaman Voting</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="process__item">
                                <h5>Validasi NIS/NPK dan Kode Validasi</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="process__item">
                                <h5>Melakukan Voting</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="process__item">
                                <h5>Logout dan Selesai</h5>
                            </div>
                        </div>
                    </div>
                    <!--end process-->
                </div>
                <!--end of container-->
            </section>
            <section class="text-center imagebg" data-gradient-bg='#4876BD,#5448BD,#8F48BD,#BD48B1'>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-6">
                            <div class="cta">
                                <h2>Vote Now!</h2>
                                <p class="lead">
                                </p>
                                <a class="btn btn--primary type--uppercase" href="/validasiVote">
                                    <span class="btn__text">
                                        VOTE
                                    </span>
                                    <span class="label">NOW</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <section class=" ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider slider--inline-arrows" data-arrows="true">
                                <ul class="slides">
                                    <li>
                                        <div class="testimonial row justify-content-center">
                                            <div class="col-lg-2 col-md-4 col-6 text-center">
                                                <img class="testimonial__image" alt="Image"
                                                    src="{{ asset('frontend/img/avatar-round-1.png') }}" />
                                            </div>
                                            <div class="col-lg-7 col-md-8 col-12">
                                                <span class="h3">&ldquo;We’ve been using Stack to prototype designs
                                                    quickly and efficiently. Needless to say we’re hugely impressed by
                                                    the style and value.&rdquo;
                                                </span>
                                                <h5>Maguerite Holland</h5>
                                                <span>Interface Designer &mdash; Yoke</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="testimonial row justify-content-center">
                                            <div class="col-lg-2 col-md-4 col-6 text-center">
                                                <img class="testimonial__image" alt="Image"
                                                    src="{{ asset('frontend/img/avatar-round-4.png') }}" />
                                            </div>
                                            <div class="col-lg-7 col-md-8 col-12">
                                                <span class="h3">&ldquo;I've been using Medium Rare's templates for a
                                                    couple of years now and Stack is without a doubt their best work
                                                    yet. It's fast, performant and absolutely stunning.&rdquo;
                                                </span>
                                                <h5>Lucas Nguyen</h5>
                                                <span>Freelance Designer</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="testimonial row justify-content-center">
                                            <div class="col-lg-2 col-md-4 col-6 text-center">
                                                <img class="testimonial__image" alt="Image"
                                                    src="{{ asset('frontend/img/avatar-round-3.png') }}" />
                                            </div>
                                            <div class="col-lg-7 col-md-8 col-12">
                                                <span class="h3">&ldquo;Variant has been a massive plus for my workflow
                                                    &mdash; I can now get live mockups out in a matter of hours, my
                                                    clients really love it.&rdquo;
                                                </span>
                                                <h5>Rob Vasquez</h5>
                                                <span>Interface Designer &mdash; Yoke</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <footer class="footer-3 text-center-xs space--xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img alt="Image" class="logo" src="{{ asset('frontend/img/logo-dark.png') }}" />
                            <ul class="list-inline list--hover">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="type--fine-print"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="type--fine-print">adty404@gmail.com</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <ul class="social-list list-inline list--hover">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-google icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-twitter icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-facebook icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-instagram icon icon--xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-6">
                            <p class="type--fine-print">

                            </p>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <span class="type--fine-print">&copy;
                                <span class="update-year"></span>Aditya Prasetyo</span>
                            <a class="type--fine-print" href="#">Privacy Policy</a>
                            <a class="type--fine-print" href="#">Legal</a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </footer>
        </div>
        <!--<div class="loader"></div>-->
        <a class="back-to-top inner-link" href="#" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
        <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/flickity.min.js') }}"></script>
        <script src="{{ asset('frontend/js/easypiechart.min.js') }}"></script>
        <script src="{{ asset('frontend/js/parallax.js') }}"></script>
        <script src="{{ asset('frontend/js/typed.min.js') }}"></script>
        <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
        <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
        <script src="{{ asset('frontend/js/ytplayer.min.js') }}"></script>
        <script src="{{ asset('frontend/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/js/granim.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('frontend/js/countdown.min.js') }}"></script>
        <script src="{{ asset('frontend/js/twitterfetcher.min.js') }}"></script>
        <script src="{{ asset('frontend/js/spectragram.min.js') }}"></script>
        <script src="{{ asset('frontend/js/smooth-scroll.min.js') }}"></script>
        <script src="{{ asset('frontend/js/scripts.js') }}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        @if(session('suksesVote'))
        <script type="text/javascript">
            swal("Terimakasih!", "{{session('suksesVote')}}", "success");
        </script>
        @endif

        @if(session('belumMulai'))
        <script type="text/javascript">
            swal("Maaf!", "{{session('belumMulai')}}", "error");
        </script>
        @endif

        @if(session('waktuHabis'))
        <script type="text/javascript">
            swal("Maaf!", "{{session('waktuHabis')}}", "error");
        </script>
        @endif

        <!-- COUNTDOWN MULAI VOTING -->
        {{-- <p id="waktuMulai" align="center"></p> --}}
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
        {{-- <p id="waktuTampil" align="center"></p> --}}
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
</body>

</html>
