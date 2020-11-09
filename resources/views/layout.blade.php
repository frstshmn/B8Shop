<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

    <title>B8 | @yield('title')</title>
</head>

<body class="font-primary">

    <nav class="navbar navbar-expand-lg bg-white">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="#!">
                <img src="{{ URL::asset('images/B8_Logo.svg') }}">
            </a>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" href="#!">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!">Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#!">Shop</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('hero')

    <div class="container">
        <nav class="navbar d-flex justify-content-center my-3">
            <ul class="navbar-nav text-uppercase flex-row align-items-center">
                @if (Request::path() != '/')
                    <li class="nav-item">
                        <a href="javascript:history.back()">
                            <div class="chevron">
                                <span class="iconify text-white" data-inline="false"
                                    data-icon="fa-solid:angle-left"></span>
                            </div>
                        </a>
                    </li>
                @endif
                <li class="nav-item active">
                    <a href="" class="nav-link">Sale</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Apparel⏷</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Accessories⏷</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Collections⏷</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Gear</a>
                </li>
                <li class="nav-item active">
                    <a href="/order" class="nav-link">Delivery</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <div class="d-flex flex-column align-items-center position-relative pt-5 mt-5">
        <span class="text-uppercase follow">Follow</span>
        <img class="brush-transparent" src="{{ URL::asset('images/brush.png') }}">
    </div>

    <div class="social-icons fs-30 d-flex justify-content-center">
        <a href="">
            <span class="iconify" data-inline="false" data-icon="fa-brands:instagram"></span>
        </a>
        <a href="">
            <span class="iconify" data-inline="false" data-icon="fa-brands:twitter"></span>
        </a>
        <a href="">
            <span class="iconify" data-inline="false" data-icon="fa-brands:twitch"></span>
        </a>
        <a href="">
            <span class="iconify" data-inline="false" data-icon="fa-brands:facebook-f"></span>
        </a>
        <a href="">
            <span class="iconify" data-inline="false" data-icon="fa-brands:vk"></span>
        </a>
        <a href="">
            <span class="iconify" data-inline="false" data-icon="fa-brands:youtube"></span>
        </a>
    </div>

    <div class="footer d-flex flex-column position-relative">
        <div class="footer-content bg-black">
            <div class="container d-flex flex-row justify-content-between">
                <div class='d-flex flex-row align-items-center'>
                    <img src="{{ URL::asset('images/B8_Logo_inverted.svg') }}">
                    <p class="text-white fs-14 font-weight-bold ml-3"> Copyright 2020 B8 Esports<br>All rights reserved.
                    </p>
                </div>
                <div class='d-flex flex-row align-items-center'>
                    <p class="text-white text-right fs-18 font-weight-bold">Contact Us<br>contact@b8esports.gg</p>
                </div>
            </div>
        </div>
        <img class="big-brush w-100" src="{{ URL::asset('images/big_brush.png') }}">
    </div>

    <!-- Iconify, JQuery, Popper.js and Bootstrap.js -->
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- User scripts -->
    <script src="{{ URL::asset('js/size_selector.js') }}"></script>
    <script src="{{ URL::asset('js/number_input.js') }}"></script>
    <script src="{{ URL::asset('js/gallery.js') }}"></script>
    <script src="{{ URL::asset('js/basket.js') }}"></script>
</body>

</html>
