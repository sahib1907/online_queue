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
                <a href="index.html">
                    <img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/frontend/img/logo.png">
                </a>
            </div>
            <div class="search">
                <form id="searchForm" action="page-search-results.html" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control search" name="q" id="q" placeholder="Search..." required>
                        <span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
                    </div>
                </form>
            </div>
            <nav>
                <ul class="nav nav-pills nav-top">
                    <li>
                        <a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
                    </li>
                    <li>
                        <a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
                    </li>
                    <li class="phone">
                        <span><i class="fa fa-phone"></i>(123) 456-7890</span>
                    </li>
                </ul>
            </nav>
            <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="navbar-collapse nav-main-collapse collapse">
            <div class="container">
                <ul class="social-icons">
                    <li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
                    <li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
                    <li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
                </ul>
                <nav class="nav-main mega-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <li><a href="/">Home page</a></li>
                        <li><a href="/online-queue">Queue</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="newsletter">
                        <h4>Newsletter</h4>
                        <p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>

                        <div class="alert alert-success hidden" id="newsletterSuccess">
                            <strong>Success!</strong> You've been added to our email list.
                        </div>

                        <div class="alert alert-danger hidden" id="newsletterError"></div>

                        <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                            <div class="input-group">
                                <input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
                                <span class="input-group-btn">
											<button class="btn btn-default" type="submit">Go!</button>
										</span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Latest Tweets</h4>
                    <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "", "count": 2}'>
                        <p>Please wait...</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Contact Us</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <ul class="social-icons">
                            <li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" data-tooltip title="Facebook">Facebook</a></li>
                            <li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" data-tooltip title="Twitter">Twitter</a></li>
                            <li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" data-tooltip title="Linkedin">Linkedin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <a href="index.html" class="logo">
                            <img alt="Porto Website Template" class="img-responsive" src="/frontend/img/logo-footer.png">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <p>© Copyright 2015. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="page-faq.html">FAQ's</a></li>
                                <li><a href="sitemap.html">Sitemap</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </nav>
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
