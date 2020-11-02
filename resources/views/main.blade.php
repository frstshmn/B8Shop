@extends('layout')

@section('title', 'Shop')

@section('hero')
    <div class="hero-section d-flex flex-column justify-content-center">
        <div class="container">
            <h1 class="font-weight-bold">Shop</h1>
            <img class="brush" src="{{ URL::asset('images/brush.png') }}">
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach ($items as $item)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card border-0">
                    <img class="card-img-top" src="{{ URL::asset($item->photos[0]->photo_link) }}" alt="{{ $item->title }}">
                    <div class="card-body text-center">
                        <h4 class="card-title text-uppercase fs-20">{{ $item->title }}</h4>
                        <p class="card-price fs-20">${{ $item->price }}</p>
                        <a href="/item/{{ $item->id }}" class="button">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
