@extends('client.layouts.layout')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Shopping Cart</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Shopping Cart</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row mb-3">
                    <div class="col-xl-8">
                        <div class="row align-items-center gy-3 mb-3">
                            <div class="col-sm">
                                <div>
                                    <h5 class="fs-14 mb-0">Your Cart ({{ count(session()->get('cart')) }} items)</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <a href="apps-ecommerce-products.html"
                                    class="link-primary text-decoration-underline">Continue Shopping</a>
                            </div>
                        </div>
                        @foreach(session()->get('cart') as $key => $product)
                        <div class="card product-{{ $key }}">
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-sm-auto">
                                        <div class="avatar-lg bg-light rounded p-1">
                                            <img src="{{ $product['image'] }}" alt=""
                                                class="img-fluid d-block">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html"
                                                class="text-dark">{{ \Illuminate\Support\Str::limit($product['name'], 50) }}</a></h5>
                                        <ul class="list-inline text-muted">
                                            <li class="list-inline-item">Color : <span class="fw-medium">Pink</span></li>
                                            <li class="list-inline-item">Size : <span class="fw-medium">M</span></li>
                                        </ul>

                                        <div class="input-step">
                                            <button type="button" class="minus" data-id="{{ $product['product_id'] }}">–</button>
                                            <input type="number" class="product-quantity" value="{{ $product['quantity'] }}" min="0"
                                                max="100">
                                            <button type="button" class="plus" data-id="{{ $product['product_id'] }}">+</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="text-lg-end">
                                            <p class="text-muted mb-1">Item Price:</p>
                                            <h5 class="fs-14">$<span id="ticket_price" class="product-price">{{ $product['price'] }}</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                            <div class="card-footer">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <div class="d-flex flex-wrap my-n1">
                                            <div>
                                                <a href="javascript:void(0)" class="d-block text-body p-1 px-2 remove-item-btn" data-id="{{ $key }}" data-bs-toggle="modal"
                                                    data-bs-target="#removeItemModal"><i
                                                        class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                    Remove</a>
                                            </div>
                                            <div>
                                                <a href="#" class="d-block text-body p-1 px-2"><i
                                                        class="ri-star-fill text-muted align-bottom me-1"></i> Add
                                                    Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex align-items-center gap-2 text-muted">
                                            <div>Total :</div>
                                            <h5 class="fs-14 mb-0">$<span class="product-line-price">{{ $product['price'] * $product['quantity'] }}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card footer -->
                        </div>
                        <!-- end card -->
                        @endforeach

                        <div class="text-end mb-4">
                            <a href="{{ route('checkout.show') }}" class="btn btn-primary btn-label right ms-auto"><i
                                    class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-4">
                        <div class="sticky-side-div">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">Order Summary</h5>
                                </div>
                                <div class="card-header bg-soft-light border-bottom-dashed">
                                    <div class="text-center">
                                        <h6 class="mb-2">Have a <span class="fw-semibold">promo</span> code ?</h6>
                                    </div>
                                    <div class="hstack gap-3 px-3 mx-n3">
                                        <input class="form-control me-auto" type="text"
                                            placeholder="Enter coupon code" aria-label="Add Promo Code here...">
                                        <button type="button" class="btn btn-primary w-xs">Apply</button>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total :</td>
                                                    <td class="text-end" >$ <span id="cart-subtotal">359.96</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Discount <span class="text-muted">(VELZON15)</span> : </td>
                                                    <td class="text-end">- $ <span id="cart-discount">53.99</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charge :</td>
                                                    <td class="text-end" id="cart-shipping">$ 65.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Estimated Tax (12.5%) : </td>
                                                    <td class="text-end">$ <span id="cart-tax">44.99</span></td>
                                                </tr>
                                                <tr class="table-active">
                                                    <th>Total (USD) :</th>
                                                    <td class="text-end">$
                                                        <span class="fw-semibold" id="cart-total">
                                                            415.96
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>

                            <div class="alert border-dashed alert-primary" role="alert">
                                <div class="d-flex align-items-center">
                                    <lord-icon src="https://cdn.lordicon.com/nkmsrxys.json" trigger="loop"
                                        colors="primary:#121331,secondary:#8c68cd" style="width:80px;height:80px">
                                    </lord-icon>
                                    <div class="ms-2">
                                        <h5 class="fs-14 text-primary fw-semibold"> Buying for a loved one?</h5>
                                        <p class="text-black mb-1">Gift wrap and personalised message on card, <br />Only
                                            for <span class="fw-semibold">$9.99</span> USD </p>
                                        <button type="button"
                                            class="btn ps-0 btn-sm btn-link text-primary text-uppercase">Add Gift
                                            Wrap</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end stickey -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer border-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('js')
     <!-- input step init -->
     {{-- <script src="{{ asset('assets/js/pages/form-input-spin.init.js') }}"></script>

     <!-- ecommerce cart js -->
     <script src="{{ asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>  --}}
     <script src="{{ asset('assets/js/shopping-cart.js') }}"></script>
@endsection
