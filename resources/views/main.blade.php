@include('layout.header')

        <title>B8 | Shop</title>
    </head>
    <body class="font-primary">

        @include('layout.navbar')

        <div class="hero-section d-flex flex-column justify-content-center">
            <div class="container">
                <h1 class=" font-weight-bold">Shop</h1>
                <img class="brush" src="{{ URL::asset('images/brush.png') }}">
            </div>
        </div>

        @include('layout.menu')

        @include('layout.footer')
