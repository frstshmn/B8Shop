@extends('layout')

@section('title', $item->title)

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <img class="w-100" src="{{ URL::asset($item->photos[0]->photo_link) }}" alt="{{ $item->title }}">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <img class="w-100 mb-3" src="{{ URL::asset($item->photos[0]->photo_link) }}" alt="Card image cap">
            <img class="w-100 mb-3" src="{{ URL::asset($item->photos[0]->photo_link) }}" alt="Card image cap">
            <img class="w-100 mb-3" src="{{ URL::asset($item->photos[0]->photo_link) }}" alt="Card image cap">
        </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <h4 class="text-uppercase font-weight-bold fs-24">{{ $item->title }}</h4>
            <p class="card-price fs-30">${{ $item->price }}</p>
            <p class="font-weight-bold fs-14">{{ $item->description }}</p>

            <div class="select-size">
                @foreach ($item->sizes as $size)
                    {{ $size->title }}
                @endforeach
            </div>

            <div>
                <p class="font-weight-bold fs-14">{{ $item->consist }}</p>
                <p class="font-weight-bold fs-14">{{ $item->caring }}</p>
            </div>
        </div>
    </div>
@endsection
