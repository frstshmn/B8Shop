@extends('layout')

@section('title', 'Checkout')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <span class="fs-22 font-weight-bold">Delivery Details</span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 h-100">
            <span class="fs-22 font-weight-bold">Summary</span>
        </div>
    </div>
    <form action="/order" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="row mt-3">
                    <div class="col-6 px-1">
                        <div class="form-group">
                            <label for="name" class="m-1 fs-12">Name</label>
                            <input type="text" class="form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="first_name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="m-1 fs-12">Email</label>
                            <input type="text" class="form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="country" class="m-1 fs-12">Country</label>
                            <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="country" id="country" required>
                                <option selected>Ukraine</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shipping" class="m-1 fs-12">Shipping</label>
                            <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="shipping" id="shipping" required>
                                <option value="nova_poshta">Nova Poshta</option>
                                <option value="ukr_poshta">UkrPoshta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 px-1">
                        <div class="form-group">
                            <label for="surname" class="m-1 fs-12">Surname</label>
                            <input type="text" class="form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="last_name" id="surname" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="m-1 fs-12">Phone</label>
                            <input type="text" class="form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="phone" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="city" class="m-1 fs-12">City</label>
                            <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="city" id="city" required>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="warehouse" class="m-1 fs-12">Warehouse</label>
                            <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="warehouse" id="warehouse" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 px-1">
                        <div class="form-group">
                            <label for="comment" class="m-1 fs-12">Comments / Questions</label>
                            <textarea class="form-control fs-14 font-weight-bold p-2 checkout-input" name="comments" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 h-100">
                <div class="card p-4 checkout-sum fs-14 font-weight-bold mt-3">

                    <div class="input-group">
                        <input type="text" class="form-control fs-14 font-weight-bold promocode"
                            placeholder="Gift card or discount code">
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

                    <label class="custom-radio">
                        <input type="radio" name="payment_method" value="visa_mastercard" required checked>
                        <span class="text">VISA or MasterCard card</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="payment_method" value="post_office" required>
                        <span class="text">Payment at the post office</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="payment_method" value="paypal" required>
                        <span class="text">PayPal</span>
                    </label>

                    <p class="font-weight-normal fs-9">Your personal data will be used to process your order, support your
                        experience throughout this website, and for other purposes described in our terms and conditions.</p>

                    <label class="custom-checkbox">
                        <input type="checkbox" required>
                        <span class="text">
                            <p class="font-weight-normal fs-9">I have read and agree to the website terms and conditions *</p>
                        </span>
                    </label>
                    <button type="submit" class="button text-uppercase p-3 text-center fs-20">Checkout</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('additional_scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('js/shipping.js') }}"></script>
@endsection
