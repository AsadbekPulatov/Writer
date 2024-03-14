<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Cloapedia - Stylish Magazine Blog Template</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('cloapedia/images/favicon.ico') }}" type="image/x-icon"/>
<link rel="apple-touch-icon" href="{{ asset('cloapedia/images/apple-touch-icon.png') }}">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="{{ asset('cloapedia/css/bootstrap.css') }}" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="{{ asset('cloapedia/css/font-awesome.min.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('cloapedia/style.css') }}" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="{{ asset('cloapedia/css/responsive.css') }}" rel="stylesheet">

<!-- Colors for this template -->
<link href="{{ asset('cloapedia/css/colors.cs') }}s" rel="stylesheet">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- LOADER -->
<div id="preloader">
    <img class="preloader" src="{{ asset('cloapedia/images/loader.gif') }}" alt="">
</div><!-- end loader -->
<!-- END LOADER -->

<div id="wrapper">
    <div class="collapse top-search" id="collapseExample">
        <div class="card card-block">
            <div class="newsletter-widget text-center">
                <form class="form-inline">
                    <input type="text" class="form-control" placeholder="What you are looking for?">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- end newsletter -->
        </div>
    </div><!-- end top-search -->

    <div class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('cloapedia/images/logo.png') }}" alt=""></a>
                    </div><!-- end logo -->
                </div>
            </div><!-- end row -->
        </div><!-- end header-logo -->
    </div><!-- end header -->

    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-toggleable-md">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu"
                        aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link color-pink-hover" href="{{ route('index') }}">Home</a>
                        </li>
                        @foreach(\App\Models\Category::all() as $item)
                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="{{ route('blog', ['id' => $item->id]) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link color-grey-hover" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->

    @yield('content')

    <footer class="footer">
        <div class="container">
            <hr class="invis1">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="widget">
                        <div class="footer-text text-center">
                            <a href="{{ route('index') }}"><img src="{{ asset('cloapedia/images/flogo.png') }}" alt=""
                                                                class="img-fluid"></a>
                            <p>Cloapedia is a personal blog for handcrafted, cameramade photography content, fashion
                                styles from independent creatives around the world.</p>
                            <div class="social">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                        class="fa fa-instagram"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i
                                        class="fa fa-google-plus"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                        class="fa fa-pinterest"></i></a>
                            </div>

                            <hr class="invis">

                            <div class="newsletter-widget text-center">
                                <form class="form-inline">
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                    <button type="submit" class="btn btn-primary">Subscribe <i
                                            class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div><!-- end newsletter -->
                        </div><!-- end footer-text -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <div class="copyright">&copy; Cloapedia. Design: <a href="http://html.design">HTML Design</a>.</div>
                </div>
            </div>
        </div><!-- end container -->
    </footer><!-- end footer -->
</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="{{ asset('cloapedia/js/jquery.min.js') }}"></script>
<script src="{{ asset('cloapedia/js/tether.min.js') }}"></script>
<script src="{{ asset('cloapedia/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('cloapedia/js/custom.js') }}"></script>

</body>
</html>
