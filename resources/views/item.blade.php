@extends('layout')

@section('title', $item->title)

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
            <img class="w-100" id='mainPhoto' src="{{ URL::asset($item->photos[0]->photo_link) }}" alt="{{ $item->title }}">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="gallery">
                @foreach ($item->photos as $photo)
                    <img class="w-100 mb-3 gallery-item" src="{{ URL::asset($photo->photo_link) }}" alt="{{ $item->title }}">
                @endforeach
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 item-info">
            <h4 class="text-uppercase font-weight-bold fs-24">{{ $item->title }}</h4>
            <p class="card-price fs-30">${{ $item->price }}</p>
            <p class="font-weight-bold fs-14">{{ $item->description }}</p>

            <form method="POST" action="/orderlist">
                @csrf
                <input type="text" name="item_id" value="{{ $item->id }}" hidden />
                <input type="text" name="price" value="{{ $item->price }}" hidden />
                <div>
                    <div class="select-size d-inline-block">
                        @foreach ($item->sizes as $size)
                            <input class="size-input" type="radio" name="size" value="{{ $size->id }}" id="size-{{ strtolower($size->title) }}" required/>
                            <label class="size-label" for="size-{{ strtolower($size->title) }}">{{ $size->title }}</label>
                        @endforeach
                    </div>

                    <span class="fs-14 color-primary font-weight-bold d-inline-block ml-3">Size guide</span>
                </div>
                <div>
                    <input type="submit" class="button d-inline-block" value="Buy">

                    <div class="quantity d-inline-block">
                        <div id="control-button-minus">
                            <span class="iconify color-black" data-inline="false"
                            data-icon="fa-solid:angle-left"></span>
                        </div>
                        <input id="quantity" name="quantity" type="number" min="1" max="99" step="1" value="1">
                        <div id="control-button-plus">
                            <span class="iconify color-black" data-inline="false"
                            data-icon="fa-solid:angle-right"></span>
                        </div>
                    </div>
                </div>
            </form>

            <div class="d-block mt-5">
                <p class="font-weight-bold fs-14">{{ $item->consist }}</p>
                <br>
                <p class="font-weight-bold fs-14">{{ $item->caring }}</p>
            </div>

            <div class="social-icons fs-18 d-flex justify-content-start">
                <a href="">
                    <span class="iconify" data-inline="false" data-icon="fa-brands:instagram"></span>
                </a>
                <a href="">
                    <span class="iconify" data-inline="false" data-icon="fa-brands:twitter"></span>
                </a>
                <a href="">
                    <span class="iconify" data-inline="false" data-icon="fa-brands:facebook-f"></span>
                </a>
                <a href="">
                    <span class="iconify" data-inline="false" data-icon="fa-brands:vk"></span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script src="{{ URL::asset('js/number_input.js') }}"></script>
    <script src="{{ URL::asset('js/size_selector.js') }}"></script>
    <script src="{{ URL::asset('js/gallery.js') }}"></script>
@endsection
