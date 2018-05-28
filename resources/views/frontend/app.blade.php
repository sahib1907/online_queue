<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    {{--<title>Porto - Responsive HTML5 Template 3.7.0</title>--}}
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/frontend/vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/frontend/vendor/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="/frontend/vendor/owlcarousel/owl.carousel.min.css" media="screen">
    <link rel="stylesheet" href="/frontend/vendor/owlcarousel/owl.theme.default.min.css" media="screen">
    <link rel="stylesheet" href="/frontend/vendor/magnific-popup/magnific-popup.css" media="screen">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/frontend/css/theme.css">
    <link rel="stylesheet" href="/frontend/css/theme-elements.css">
    <link rel="stylesheet" href="/frontend/css/theme-blog.css">
    <link rel="stylesheet" href="/frontend/css/theme-shop.css">
    <link rel="stylesheet" href="/frontend/css/theme-animate.css">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="/frontend/vendor/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/frontend/vendor/circle-flip-slideshow/css/component.css" media="screen">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/frontend/css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/frontend/css/custom.css">

    <!-- Head Libs -->
    <script src="/frontend/vendor/modernizr/modernizr.js"></script>

    <!--[if IE]>
    <link rel="stylesheet" href="/frontend/css/ie.css">
    <![endif]-->

    @yield('css')

    <!--[if lte IE 8]>
    <script src="/frontend/vendor/respond/respond.js"></script>
    <script src="/frontend/vendor/excanvas/excanvas.js"></script>
    <![endif]-->

</head>
<body>

<div class="body">
    <header id="header">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img alt="Porto" width="111" height="80" data-sticky-width="82" data-sticky-height="40" src="/img/icon.png">
                </a>
            </div>
            <nav>
                <ul class="nav nav-pills nav-top">
                    <li class="phone">
                        <span><i class="fa fa-phone"></i><a href="tel:{{$settings->phone}}">{{$settings->phone}}</a></span>
                    </li>
                    <li class="phone">
                        <span><i class="fa fa-at"></i><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></span>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="navbar-collapse nav-main-collapse collapse">
            <div class="container">
                <nav class="nav-main mega-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <li><a href="/">Ana səhifə</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Bizimlə əlaqə</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>Ünvan:</strong> {{$settings->address}}</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Telefon: </strong><a href="tel:{{$settings->phone}}"></a>{{$settings->phone}}</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>E-mail: </strong> <a href="mailto:{{$settings->email}}">{{$settings->email}}</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <ul class="social-icons">
                            @foreach($socials as $social)
                                <li style="margin-right: 10px;"><a href="{{$social->link}}" target="_blank" title="{{$social->name}}"><i class="fa {{$social->icon}} fa-3x"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <p>© Copyright 2018. All Rights Reserved. | by <a href="https://www.facebook.com/sahib.fermanli">Sahib Farmanli</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Vendor -->
<script src="/frontend/vendor/jquery/jquery.js"></script>
<script src="/frontend/vendor/jquery.appear/jquery.appear.js"></script>
<script src="/frontend/vendor/jquery.easing/jquery.easing.js"></script>
<script src="/frontend/vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="/frontend/vendor/bootstrap/bootstrap.js"></script>
<script src="/frontend/vendor/common/common.js"></script>
<script src="/frontend/vendor/jquery.validation/jquery.validation.js"></script>
<script src="/frontend/vendor/jquery.stellar/jquery.stellar.js"></script>
<script src="/frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/frontend/vendor/jquery.gmap/jquery.gmap.js"></script>
<script src="/frontend/vendor/isotope/jquery.isotope.js"></script>
<script src="/frontend/vendor/owlcarousel/owl.carousel.js"></script>
<script src="/frontend/vendor/jflickrfeed/jflickrfeed.js"></script>
<script src="/frontend/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/frontend/vendor/vide/vide.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/frontend/js/theme.js"></script>

<!-- Specific Page Vendor and Views -->
<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="/frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/frontend/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="/frontend/js/views/view.home.js"></script>

<!-- Theme Custom -->
<script src="/frontend/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/frontend/js/theme.init.js"></script>

@yield('js')

</body>
</html>
