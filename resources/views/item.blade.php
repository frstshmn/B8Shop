@include('layout.header')

<title>B8 | {{ $item->title }}</title>
</head>

<body class="font-primary">

    @include('layout.navbar')

    @include('layout.menu')

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs 12">
                <div class="card border-0">
                    <img class="card-img-top" src="{{ URL::asset($photos[0]->photo_link) }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h4 class="card-title text-uppercase">{{ $item->title }}</h4>
                        <p class="card-price">${{ $item->price }}</p>
                        <a href="/item/{{ $item->id }}" class="button">Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')
