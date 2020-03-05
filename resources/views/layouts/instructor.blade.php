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
                <div class="container page__container">
                    @yield('content')
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

</body>
</html>
