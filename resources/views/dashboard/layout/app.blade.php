<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ env('app.name') }}</title>

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Fedstatebank">
    <meta property="og:site_name" content="Fedstatebank">
    <meta property="og:description" content="Fedstatebank has built a reputation for providing integrated investment management, wealth planning, consulting, trust, insurance, and banking services.">
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xwork.min.css') }}">
    <!-- END Stylesheets -->

    <style>
        #google_translate_element {

            color: transparent;
        }

        #google_translate_element a {

            display: none;
        }

        select.google_translate_element {

            color: black;
        }

        div.goog-te-gadget {

            color: transparent;
        }

        div.goog-te-gadget {

            color: transparent !important;
        }

        .goog-te-gadget .goog-te-combo {

            margin: 0px 0 !important;
            padding: 6px 5px;
            background: #1d1d1d;
            border: 1px solid #feb729;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>
<body>

<div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark main-content-boxed">

    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header (mini Sidebar mode) -->
        <div class="smini-visible-block">
            <div class="content-header bg-header-dark">
                <!-- Logo -->
                <a class="font-w600 text-white tracking-wide" href="{{ route('user.dashboard') }}">
                    D<span class="opacity-75">x</span>
                </a>
                <!-- END Logo -->
            </div>
        </div>
        <!-- END Side Header (mini Sidebar mode) -->

        <!-- Side Header (normal Sidebar mode) -->
        <div class="smini-hidden">
            <div class="content-header justify-content-lg-center bg-header-dark">
                <!-- Logo -->
                <a class="font-w600 text-white tracking-wide" href="{{ route('user.dashboard') }}">
                    Nestlecity<span class="opacity-75"></span>
                    <span class="font-w400">Bank</span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div class="d-lg-none">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header (normal Sidebar mode) -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Actions -->
            <div class="content-side content-side-full text-center bg-body-light">
                <div class="smini-hide">
                    <img class="img-avatar" src="{{ asset(auth()->user()->profile_pic) }}" alt="">
                    <div class="mt-3 font-w600">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</div>
                    <a class="link-fx text-muted" href="javascript:void(0)">$ @convert( optional(auth()->user()->account)->balance)</a>
                </div>
            </div>
            <!-- END Side Actions -->

            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="{{ route('user.dashboard') }}">
                            <i class="nav-main-link-icon fa fa-rocket"></i>
                            <span class="nav-main-link-name">Overview</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Manage</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-piggy-bank"></i>
                            <span class="nav-main-link-name">Accounts</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="{{ route('user.statement') }}">
                                    <span class="nav-main-link-name">Statement</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link "  href="{{ route('user.card') }}">
                            <i class="nav-main-link-icon fa fa-money-check"></i>
                            <span class="nav-main-link-name">Cards</span>
                        </a>
{{--                        <ul class="nav-main-submenu">--}}

{{--                            <li class="nav-main-item">--}}
{{--                                <a class="nav-main-link" href="{{ route('user.card') }}">--}}
{{--                                    <span class="nav-main-link-name">Manage</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </li>
                    <li class="nav-main-item">
{{--                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">--}}
{{--                            <i class="nav-main-link-icon fa fa-money-bill"></i>--}}
{{--                            <span class="nav-main-link-name">Payments</span>--}}
{{--                        </a>--}}
                        <ul class="nav-main-submenu">

                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <span class="nav-main-link-name">Manage</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-plus-circle"></i>
                                    <span class="nav-main-link-name">New Payment</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link "  href="{{ route('user.transfer') }}">
                            <i class="nav-main-link-icon fa fa-money-bill-wave-alt"></i>
                            <span class="nav-main-link-name">Transfers</span>
                        </a>

                    </li>
                    <li class="nav-main-heading">Personal</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('user.user_profile') }}">
                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                            <span class="nav-main-link-name">Profile</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                            <i class="nav-main-link-icon fa fa-envelope"></i>
                            <span class="nav-main-link-name">Messages</span>
                            <span class="nav-main-link-badge badge badge-pill badge-success">0</span>
                        </a>
                    </li>
{{--                    <li class="nav-main-item">--}}
{{--                        <a class="nav-main-link" href="">--}}
{{--                            <i class="nav-main-link-icon fa fa-cog"></i>--}}
{{--                            <span class="nav-main-link-name">Settings</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('user.password.index') }}">
                            <i class="nav-main-link-icon fa fa-lock"></i>
                            <span class="nav-main-link-name">Security</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Dashboards</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ route('user.dashboard') }}">
                            <i class="nav-main-link-icon fa fa-arrow-left"></i>
                            <span class="nav-main-link-name">Go Back</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                </button>
                <!-- END Toggle Sidebar -->


                <!-- END Open Search Section -->

            </div>
            <div id="google_translate_element"></div>
            <script>
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({
                        pageLanguage: 'en'
                    }, 'google_translate_element');
                }
            </script>


            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- Notifications Dropdown -->

                <!-- END Notifications Dropdown -->

                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-fw fa-user-circle"></i>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset(auth()->user()->profile_pic) }}" alt="">
                            <div class="pt-2">
                                <a class="text-white font-w600" href="">{{ auth()->user()->last_name }}</a>
                            </div>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fa fa-fw fa-cog mr-1"></i> Settings
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="op_auth_signin.html">


                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-fw fa-arrow-alt-circle-left mr-1"></i> Log Out
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>

                        </div>

                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->

        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Search.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-dark">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->


    <!-- Main Container -->
        @yield('content')
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body">
        <div class="content py-0">
            <div class="row font-size-sm">

                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Nestlecity Bank</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->


<script src="{{ asset('assets/js/dashmix.core.min.js') }}"></script>

<!--
    Dashmix JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at assets/_js/main/app.js
-->
<script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
  <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
