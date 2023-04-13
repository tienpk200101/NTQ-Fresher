@extends('client_2.layout.layout')

@section('navbar')
    @include('client_2.navbar.navbar_2')
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <form id="checkoutForm" action="{{ route('checkout.validate.post') }}" method="post">
                @csrf
                <div class="row px-xl-5">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="firstName">First Name</label>
                                    <input id="firstName" class="form-control" type="text" name="firstName" placeholder="John">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="lastName">Last Name</label>
                                    <input id="lastName" class="form-control" type="text" name="lastName" placeholder="Doe">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">E-mail</label>
                                    <input id="email" class="form-control" type="text" name="email" value="{{ auth()->guard('customer')->user()->email }}">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phone">Mobile No</label>
                                    <input id="phone" class="form-control" type="text" name="phone" placeholder="+123 456 789">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="address">Address Line 1</label>
                                    <input id="address" class="form-control" type="text" name="address" placeholder="123 Street">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control" type="text" name="address2" placeholder="123 Street">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" class="custom-select">
                                        <option value="0" selected>Viet Nam</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="city">City</label>
                                    <select id="city" class="form-control select-city" name="city"></select>
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="state">State</label>
                                    <input id="state" class="form-control" type="text" name="state" placeholder="New York">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="zipCode">ZIP Code</label>
                                    <input id="zipCode" class="form-control" type="text" name="zipCode" placeholder="123">
                                    <span class="form-message text-danger"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Create an account</label>
                                    </div>
                                </div>
                                {{--                            <div class="col-md-12 form-group">--}}
                                {{--                                <div class="custom-control custom-checkbox">--}}
                                {{--                                    <input type="checkbox" class="custom-control-input" id="shipto">--}}
                                {{--                                    <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different--}}
                                {{--                                        address</label>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                        <div class="collapse mb-4" id="shipping-address">
                            <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="John">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" placeholder="Doe">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="example@email.com">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="+123 456 789">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" placeholder="123 Street">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control" type="text" placeholder="123 Street">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <select class="form-control select-city" name="city"></select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="New York">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="123">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Products</h5>
                                @if(session()->has('cart'))
                                    @foreach(session()->get('cart') as $product)
                                        <div class="d-flex justify-content-between mb-2">
                                            <img src="{{ $product['image'] }}" width="50px">
                                            <p>{{ $product['name'] }}</p>
                                            <p>${{ $product['price'] * (int)$product['quantity'] }}</p>
                                        </div>
                                    @endforeach
                                @endif
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">$<span id="cart-subtotal"></span></h6>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="font-weight-medium">Tax</h6>
                                    <h6 class="font-weight-medium">$<span id="cart-tax"></span></h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">$<span id="cart-shipping"></span></h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">$<span id="cart-total"></span></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" value="0" id="paypal">
                                        <label class="custom-control-label" for="paypal">Paypal</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" value="1" id="directcheck">
                                        <label class="custom-control-label" for="directcheck">Direct Check</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" value="2" id="banktransfer">
                                        <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout End -->
@endsection

@section('js')
{{--    <script src="{{ asset('assets/js/validate.js') }}"></script>--}}
    <script>
        $(document).ready(function () {
            $('.select-city').select2();

            fetch('{{ asset('tree.json') }}')
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    let html = '';
                    $.each(response, function (index, state) {
                        html += `<option value="${state.code}">${state.name}</option>`
                    });

                    $('.select-city').html(html)
                })
        });

        $('#shipto').click(function () {
            let element = $(this).parent().find('.custom-control-label');
            let target = element.data('target');
            let toggle = element.data('toggle');
            $(target).removeClass(toggle);
        });

        // Validator({
        //     form: "#checkoutForm",
        //     errorSelector: '.form-message',
        //     rules: [
        //         Validator.isRequired('#firstName'),
        //         Validator.isRequired('#lastName'),
        //         Validator.isEmail('#email'),
        //         Validator.isRequired('#phone'),
        //         Validator.isRequired('#address'),
        //         Validator.isRequired('#state'),
        //         Validator.isRequired('#city'),
        //         Validator.isRequired('#zipCode'),
        //     ],
        //     // onSubmit: function (data) {
        //     //     console.log(data);
        //     // }
        // });
    </script>
@endsection
