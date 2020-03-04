<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    
</head>
<body class="fixed-layout">
    
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        @include('includes.header')
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content d-flex flex-column" style="padding-top: 64px;">
            <div class="page ">

                @yield('content')

                <div class="container page__container">
                    <div class="footer">
                        Copyright &copy; 2020 - <a href="http://themeforest.net/item/learnplus-learning-management-application/15287372?ref=mosaicpro">AREA DE INFORMATICA CAPEDU</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- // END Header Layout Content -->

        <!-- // END Header -->
    </div>
    <!-- // END Header Layout -->
    

    <div class="mdk-drawer js-mdk-drawer" id="default-drawer" data-opened>
        <div class="mdk-drawer__content ">
            <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                <div class="sidebar-p-y">
                    <!-- Account menu -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="fixed-student-take-course.html" class="mr-3">
                                    <img src="assets/images/vuejs.png" width="100" alt="" class="rounded">
                                </a>
                                <div class="flex">
                                    <h4 class="card-title mb-0"><a href="fixed-student-take-course.html">VueJs</a></h4>
                                    <span class="badge badge-primary">Advanced</span>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-fit">
                            <li class="list-group-item">
                                <a href="fixed-student-view-course.html" class="text-body text-decoration-0 d-flex align-items-center">
                                    <strong>Basics of Vue.js</strong>
                                    <i class="material-icons text-muted ml-auto" style="font-size: inherit;">check</i>
                                </a>
                                <div id="page-nav" class="col-lg-auto page-nav">
                                    <div data-perfect-scrollbar>
                                        <div class="page-section pt-lg-32pt">
                                            <ul class="nav page-nav__menu">
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-subscription.html" class="nav-link">Subscription</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-upgrade.html" class="nav-link">Upgrade Account</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-payment-information.html" class="nav-link">Payment Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-billing.html" class="nav-link">Payment History</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-invoice.html" class="nav-link active">Invoice</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="fixed-student-view-course.html" class="text-body text-decoration-0 d-flex align-items-center">
                                    <strong>Basics of Vue.js</strong>
                                    <i class="material-icons text-muted ml-auto" style="font-size: inherit;">check</i>
                                </a>
                                <div id="page-nav" class="col-lg-auto page-nav">
                                    <div data-perfect-scrollbar>
                                        <div class="page-section pt-lg-32pt">
                                            <ul class="nav page-nav__menu">
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-subscription.html" class="nav-link">Subscription</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-upgrade.html" class="nav-link">Upgrade Account</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-payment-information.html" class="nav-link">Payment Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-billing.html" class="nav-link">Payment History</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-invoice.html" class="nav-link active">Invoice</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="fixed-student-view-course.html" class="text-body text-decoration-0 d-flex align-items-center">
                                    <strong>Basics of Vue.js</strong>
                                    <i class="material-icons text-muted ml-auto" style="font-size: inherit;">check</i>
                                </a>
                                <div id="page-nav" class="col-lg-auto page-nav">
                                    <div data-perfect-scrollbar>
                                        <div class="page-section pt-lg-32pt">
                                            <ul class="nav page-nav__menu">
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-subscription.html" class="nav-link">Subscription</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-upgrade.html" class="nav-link">Upgrade Account</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-account-billing-payment-information.html" class="nav-link">Payment Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-billing.html" class="nav-link">Payment History</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="fixed-student-invoice.html" class="nav-link active">Invoice</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
