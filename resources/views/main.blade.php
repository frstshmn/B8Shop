@include('layout.header')

<title>B8 | Shop</title>
</head>

<body class="font-primary">

    @include('layout.navbar')

    <div class="hero-section d-flex flex-column justify-content-center">
        <div class="container">
            <h1 class="font-weight-bold">Shop</h1>
            <img class="brush" src="{{ URL::asset('images/brush.png') }}">
        </div>
    </div>

    @include('layout.menu')

    <div class="container">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs 12">
                    <div class="card border-0">
                        <img class="card-img-top" src="{{ URL::asset($photos[0]->photo_link) }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <h4 class="card-title text-uppercase">{{ $item->title }}</h4>
                            <p class="card-price">${{ $item->price }}</p>
                            <a href="#!" class="button">Buy</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@include('layout.footer')
