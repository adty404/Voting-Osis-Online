<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Validasi Vote</title>
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class=" ">
        <a id="start"></a>
        <div class="nav-container ">
            <nav class="bar bar-4 bar--transparent bar--absolute" data-fixed-at="200">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 col-md-offset-0 col-4">
                            <div class="bar__module">
                                <a href="index.html">
                                    <img class="logo logo-dark" alt="logo" src="{{ asset('frontend/img/logo-dark.png') }}" />
                                    <img class="logo logo-light" alt="logo" src="{{ asset('frontend/img/logo-light.png') }}" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-4 col-lg-offset-0 col-md-5 col-md-offset-0 col-8 col-offset-2">
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
            <section class="imageblock switchable feature-large height-100">
                <div class="imageblock__content col-lg-6 col-md-4 pos-right">
                    <div class="background-image-holder">
                        <img alt="image" src="{{ asset('frontend/img/inner-7.jpg') }}" />
                    </div>
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-lg-5 col-md-7">
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('error')}}
                                </div>
                                @endif
                                @if(session('gagalValidasi'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('gagalValidasi')}}
                                </div>
                                @endif
                                @if(session('masukkanData'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('masukkanData')}}
                                </div>
                                @endif
                            <h2>Vote Now!</h2>
                            <p class="lead">Masukkan NIS/NPK</p>
                            <form action="/postValidasiVote" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                      <input type="number" name="nis_npk" placeholder="NIS/NPK"/>
                                        <input type="password" name="validation_code" placeholder="Kode Validasi" />
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn--primary type--uppercase">Vote Now</button>
                                    </div>
                                    <!-- <div class="col-12">
                                        <span class="type--fine-print">By signing up, you agree to the
                                            <a href="#">Terms of Service</a>
                                        </span>
                                    </div> -->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
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
