@extends('layout')

@section('title', 'Basket')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <div class="row checkout-item">
                <div class="col-6">
                    <span class="fs-18 font-weight-bold">Item</span>
                </div>
                <div class="col-1">
                    <span class="fs-18 font-weight-bold">Price</span>
                </div>
                <div class="col-3 text-center">
                    <span class="fs-18 font-weight-bold ">Qty</span>
                </div>
                <div class="col-2">
                    <span class="fs-18 font-weight-bold">Total</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 h-100">
            <span class="fs-22 font-weight-bold">Summary</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <hr class="w-100">
            @if(isset($basket))
                @foreach ($basket as $item)
                    <div class="row checkout-item">
                        <div class="col-6 d-flex flex-row justify-content-start align-items-center">
                            <img class="" src="{{ URL::asset($item->photo) }}" alt="">
                            <div class="checkout-item-title d-flex flex-column h-100 justify-content-between">
                                <h3 class="font-weight-bold fs-18 my-0">{{ $item->title }}</h3>
                                <label class="size-label m-0">{{ $item->size }}</label>
                            </div>
                        </div>
                        <div class="col-1 text-center d-flex align-items-center justify-content-center m-0">
                            <span class="color-primary font-weight-bold fs-18">${{ $item->price }}</span>
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="quantity d-flex flex-row">
                                <div id="control-button-minus" onclick="qtyDecrease({{$loop->index}})">
                                    <span class="iconify color-black" data-inline="false"
                                        data-icon="fa-solid:angle-left"></span>
                                </div>
                                <input id="quantity" type="number" min="1" max="99" step="1" value="{{ $item->quantity }}" readonly>
                                <div id="control-button-plus" onclick="qtyIncrease({{$loop->index}})">
                                    <span class="iconify color-black" data-inline="false"
                                        data-icon="fa-solid:angle-right"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 text-center align-middle d-flex align-items-center justify-content-between m-0">
                            <span class="color-primary font-weight-bold fs-18 item-price">${{ $item->price * $item->quantity }}</span>
                            <span class="iconify float-right m-0 delete-icon" data-inline="false" data-icon="fa-solid:trash" onclick="deleteItem({{$loop->index}})"></span>
                        </div>
                        <hr class="w-100">
                    </div>
                @endforeach
            @else
                <div class="row checkout-item">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <span class="font-weight-bold f-20">You haven`t any position in your basket</span>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 h-100">
            <div class="card p-4 checkout-sum fs-14 font-weight-bold mt-3">

                <div class="input-group">
                    <input type="text" class="form-control fs-14 font-weight-bold promocode"
                        placeholder="Gift card or discount code" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary fs-14 font-weight-bold promocode"
                            type="button">Apply</button>
                    </div>
                </div>

                <div>
                    <p class="d-inline-block">Subtotal</p>
                    <p class="d-inline-block float-right color-primary fs-18" id="subtotal_order_price">$0</p>
                </div>
                <div>
                    <p class="d-inline-block">Shipping</p>
                    <p class="d-inline-block float-right color-primary fs-18" id="shipping">$7</p>
                </div>
                <hr class="w-100">
                <div>
                    <p class="d-inline-block">Total</p>
                    <p class="d-inline-block float-right color-primary fs-18" id="total_order_price"></p>
                </div>

                <a href="/checkout"><div class="button text-uppercase p-3 text-center fs-20">Checkout</div></a>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script src="{{ URL::asset('js/basket.js') }}"></script>
@endsection
