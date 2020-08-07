<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vote Now! ^_^</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Description Here">
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/flickity.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/jquery.steps.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                                <a class="btn btn--sm type--uppercase" href="/voting">
                                    <span class="btn__text">
                                        Hello, {{Session::get('nama')}}
                                    </span>
                                    <!-- <p >go</p> -->
                                </a>
                                <a class="btn btn--sm btn-danger type--uppercase" href="/logoutVoting">
                                    <span class="btn__text" style="color:white;">
                                        LOG OUT
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
    </div>
    <div class="main-container">
        <section class="text-center bg--secondary ">
            <div class="container">
                    <p><b>*Anda akan diarah kan ke halaman home setelah melakukan voting</b></p>
                <div class="typed-headline">
                    <span class="h4 inline-block">PEMILIHAN KETUA OSIS</span>
                    <span class="h4 inline-block typed-text typed-text--cursor color--primary"
                        data-typed-strings="2019-2020"></span>
                </div>
                <form action="/postVoting" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        @foreach($data_kandidat as $kandidat)
                        <div class="col-md-4 input-radio">
                            <div class="feature feature-8">
                                <img alt="Image" src="{{$kandidat->getFoto()}}" style="width: 200px; height:200px;" />
                                <h5>{{$kandidat->siswa->nama}}</h5>
                                <span>{{$kandidat->siswa->kelas_jurusan()}}</span>
                                <input id="radio-{{$kandidat->id}}" type="radio" name="kandidat_id"
                                    value="{{$kandidat->id}}" />
                                <label for="radio-{{$kandidat->id}}"></label>
                            </div>
                        </div>
                        @endforeach
                        <input type="hidden" name="nis_npk" value="
                                @if(session()->has('nis'))
                                    {{Session::get('nis')}}
                                @elseif(session()->has('npk'))
                                    {{Session::get('npk')}}
                                @endif
                            ">
                        <div style="margin:0px auto;" class="col-md-4">
                            <button type="submit" class="btn btn--primary">VOTE NOW</button>
                        </div>
                    </div>
                    <!--end of row-->
                </form>
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
                                    <span class="type--fine-print">Get Started</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span class="type--fine-print">help@stack.io</span>
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
                            Supercharge your web workflow
                        </p>
                    </div>
                    <div class="col-md-6 text-right text-center-xs">
                        <span class="type--fine-print">&copy;
                            <span class="update-year"></span> Aditya Prasetyo</span>
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
    <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
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
</body>

</html>
