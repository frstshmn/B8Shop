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
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shipping" class="m-1 fs-12">Shipping</label>
                        <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="shipping" id="shipping" required>
                            <option selected>Nova Poshta</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-6 px-1">
                    <div class="form-group">
                        <label for="surname" class="m-1 fs-12">Surname</label>
                        <input type="text" class="form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="second_name" id="surname" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="m-1 fs-12">Phone</label>
                        <input type="text" class="form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="city" class="m-1 fs-12">City</label>
                        <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="city" id="city" required>
                            <option selected>Kyiv</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="warehouse" class="m-1 fs-12">Warehouse</label>
                        <select class="custom-select form-control fs-14 font-weight-bold p-2 border-grey checkout-input" name="warehouse" id="warehouse" required>
                            <option selected>#66</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 px-1">
                    <div class="form-group">
                        <label for="comment" class="m-1 fs-12">Comments / Questions</label>
                        <textarea class="form-control fs-14 font-weight-bold p-2 checkout-input" id="comment" rows="3"></textarea>
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

                <ul>
                    <li>VISA or MasterCard card</li>
                    <li>Payment at the post office</li>
                    <li>PayPal</li>
                </ul>
                <p class="font-weight-normal fs-9">Your personal data will be used to process your order, support your
                    experience throughout this website, and for other purposes described in our terms and conditions.</p>
                <p class="font-weight-normal fs-9">I have read and agree to the website terms and conditions *</p>
                <div class="button text-uppercase p-3 text-center fs-20">Checkout</div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script src="{{ URL::asset('js/basket.js') }}"></script>
@endsection