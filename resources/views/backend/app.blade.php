<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Admin panel</title>

    <!-- Bootstrap -->
    <link href="/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/backend/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/backend/build/css/custom.min.css" rel="stylesheet">

    @yield('css')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin/" class="site_title"><i class="fa fa-paw"></i> <span>Onlayn növbə</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic" style="padding: 15px;">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="profile_info">
                        <span>Xoş gəlmisiniz,</span>
                        <h2 style="text-transform: capitalize;">{{Auth::user()->name}} {{Auth::user()->surname}}</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="/admin/"><i class="fa fa-home"></i> Ana səhifə</a></li>
                            <li><a href="/admin/admins"><i class="fa fa-user-secret"></i> Adminlər</a></li>
                            <li><a href="/admin/settings"><i class="fa fa-wrench"></i> Ayarlar</a></li>
                            <li><a href="/admin/socials"><i class="fa fa-share-square"></i> Sosial şəbəkələr</a></li>
                            <li><a href="/admin/clients"><i class="fa fa-users"></i> İstifadəçilər</a></li>
                            <li><a href="/admin/services"><i class="fa fa-building"></i> Xidmət məzrkəzləri</a></li>
                            <li><a href="/admin/queues"><i class="fa fa-align-justify"></i> Növbələr</a></li>
                            <li><a href="/admin/reservations"><i class="fa fa-table"></i> Rezervlər</a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span style="text-transform: capitalize;">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/admin/admins/update/{{Auth::user()->id}}"><i class="fa fa-edit pull-right"></i> Düzəliş et</a></li>
                                <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Çıxış</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

    @yield('content')

    <!-- footer content -->
        <footer>
            <div class="pull-right">
                by <strong><a href="https://www.facebook.com/sahib.fermanli">Sahib Fərmanlı</a></strong>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="/backend/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/backend/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/backend/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/backend/build/js/custom.min.js"></script>

@yield('js')
</body>
</html>
