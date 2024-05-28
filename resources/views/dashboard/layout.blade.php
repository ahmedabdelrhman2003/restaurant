<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{url('assets/dashboard/images/favicon.ico')}}">
    <link href="{{url('assets/dashboard/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}"
        rel="stylesheet" type="text/css" />
    <link href="{{url('assets/dashboard/css/bootstrap-material.min.css')}}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{url('assets/dashboard/css/app-material.min.css')}}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <link href="{{url('assets/dashboard/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .jvectormap-label {
            display: none;
        }
    </style>
    @yield('css')
</head>

<body>
    <div id="wrapper">
        <div class="navbar-custom">
            <div class="container-fluid">
                <div class="logo-box">
                    <a href="" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="{{url('assets/images/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{url('assets/images/logo-dark.png')}}" alt="" height="20">
                        </span>
                    </a>
                    <a href="" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="{{url('assets/images/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{url('assets/images/logo-light.png')}}" alt="" height="20">
                        </span>
                    </a>
                </div>
                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="left-side-menu">
            <div class="h-100 menuitem-active" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <div id="sidebar-menu">
                                        <ul id="side-menu">
                                            <li class="menu-title">Navigation</li>
                                            <li class="menuitem-active">
                                                <a href="#sidebarEcommerce" data-toggle="collapse">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                    <span> Ecommerce </span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse show" id="sidebarEcommerce">
                                                    <ul class="nav-second-level">
                                                        <li class="menuitem-active">
                                                            <a href="{{route('dashboard.product.index')}}"
                                                                class="active">Products</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('dashboard.card.index')}}">Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('dashboard.about.index')}}">About</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('dashboard.delivery')}}">Delivery</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('dashboard.kitchen')}}">Kitchen</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('dashboard.feedback.index')}}">Feedback</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('auth.admins') }}">Admin</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('auth.logout') }}">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1366px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
</body>
<script src="{{url('assets/dashboard/js/vendor.min.js')}}"></script>
<script src="{{url('assets/dashboard/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{url('assets/dashboard/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('assets/dashboard/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}">
</script>
<script src="{{url('assets/dashboard/js/pages/dashboard-2.init.js')}}"></script>
<script src="{{url('assets/dashboard/js/app.min.js')}}"></script>
@yield('jsscript')

</html>