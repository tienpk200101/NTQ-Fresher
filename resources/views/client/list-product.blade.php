@extends('client.layouts.layout')

@push('css')
    {{--    /*<!-- nouisliderribute css -->*/--}}
    <link rel="stylesheet" href="{{ asset('assets/libs/nouislider/nouislider.min.css') }}">

    {{--    <!-- gridjs css -->--}}
    <link rel="stylesheet" href="{{ asset('assets/libs/gridjs/theme/mermaid.min.css') }}"/>
@endpush

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Products</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Products</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <h5 class="fs-16">Filters</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="#" class="text-decoration-underline" id="clearall">Clear All</a>
                                    </div>
                                </div>

                                <div class="filter-choices-input">
                                    <input class="form-control" data-choices="" data-choices-removeitem="" type="text" id="filter-choices-input"
                                           value="T-Shirts">
                                </div>
                            </div>

                            <div class="accordion accordion-flush filter-accordion">

                                <div class="card-body border-bottom">
                                    <div>
                                        <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Products</p>
                                        <ul class="list-unstyled mb-0 filter-list">
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Grocery</h5>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Fashion</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <span class="badge bg-light text-muted">5</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Watches</h5>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Electronics</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <span class="badge bg-light text-muted">5</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Furniture</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <span class="badge bg-light text-muted">6</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Automotive Accessories</h5>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Appliances</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <span class="badge bg-light text-muted">7</span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="d-flex py-1 align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0 listname">Kids</h5>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body border-bottom">
                                    <p class="text-muted text-uppercase fs-12 fw-medium mb-4">Price</p>

                                    <div id="product-price-range" data-slider-color="primary" class="noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr">
                                        <div class="noUi-base">
                                            <div class="noUi-connects">
                                                <div class="noUi-connect noUi-draggable" style="transform: translate(0%, 0px) scale(1, 1);"></div>
                                            </div>
                                            <div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;">
                                                <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider"
                                                     aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="1980.0" aria-valuenow="0.0"
                                                     aria-valuetext="$ 0">
                                                    <div class="noUi-touch-area"></div>
                                                </div>
                                            </div>
                                            <div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;">
                                                <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider"
                                                     aria-orientation="horizontal" aria-valuemin="20.0" aria-valuemax="2000.0" aria-valuenow="2000.0"
                                                     aria-valuetext="$ 2000">
                                                    <div class="noUi-touch-area"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formCost d-flex gap-2 align-items-center mt-3">
                                        <input class="form-control form-control-sm" type="text" id="minCost" value="0"> <span
                                            class="fw-semibold text-muted">to</span> <input class="form-control form-control-sm" type="text" id="maxCost"
                                                                                            value="1000">
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingBrands">
                                        <button class="accordion-button bg-transparent shadow-none" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseBrands" aria-expanded="true" aria-controls="flush-collapseBrands">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Brands</span> <span
                                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseBrands" class="accordion-collapse collapse show" aria-labelledby="flush-headingBrands">
                                        <div class="accordion-body text-body pt-0">
                                            <div class="search-box search-box-sm">
                                                <input type="text" class="form-control bg-light border-0" id="searchBrandsList" placeholder="Search Brands...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                            <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Boat" id="productBrandRadio5" checked="">
                                                    <label class="form-check-label" for="productBrandRadio5">Boat</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="OnePlus" id="productBrandRadio4">
                                                    <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Realme" id="productBrandRadio3">
                                                    <label class="form-check-label" for="productBrandRadio3">Realme</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Sony" id="productBrandRadio2">
                                                    <label class="form-check-label" for="productBrandRadio2">Sony</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="JBL" id="productBrandRadio1" checked="">
                                                    <label class="form-check-label" for="productBrandRadio1">JBL</label>
                                                </div>

                                                <div>
                                                    <button type="button" class="btn btn-link text-decoration-none text-uppercase fw-medium p-0">1,235
                                                        More
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end accordion-item -->

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingDiscount">
                                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseDiscount" aria-expanded="true" aria-controls="flush-collapseDiscount">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span> <span
                                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseDiscount" class="accordion-collapse collapse" aria-labelledby="flush-headingDiscount">
                                        <div class="accordion-body text-body pt-1">
                                            <div class="d-flex flex-column gap-2 filter-check">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="50% or more" id="productdiscountRadio6">
                                                    <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="40% or more" id="productdiscountRadio5">
                                                    <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="30% or more" id="productdiscountRadio4">
                                                    <label class="form-check-label" for="productdiscountRadio4">
                                                        30% or more
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="20% or more" id="productdiscountRadio3" checked="">
                                                    <label class="form-check-label" for="productdiscountRadio3">
                                                        20% or more
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="10% or more" id="productdiscountRadio2">
                                                    <label class="form-check-label" for="productdiscountRadio2">
                                                        10% or more
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Less than 10%" id="productdiscountRadio1">
                                                    <label class="form-check-label" for="productdiscountRadio1">
                                                        Less than 10%
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end accordion-item -->

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingRating">
                                        <button class="accordion-button bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseRating" aria-expanded="false" aria-controls="flush-collapseRating">
                                            <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span> <span
                                                class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                        </button>
                                    </h2>

                                    <div id="flush-collapseRating" class="accordion-collapse collapse" aria-labelledby="flush-headingRating">
                                        <div class="accordion-body text-body">
                                            <div class="d-flex flex-column gap-2 filter-check">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4 &amp; Above Star" id="productratingRadio4"
                                                           checked="">
                                                    <label class="form-check-label" for="productratingRadio4">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 4 &amp; Above
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3 &amp; Above Star" id="productratingRadio3">
                                                    <label class="form-check-label" for="productratingRadio3">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 3 &amp; Above
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2 &amp; Above Star" id="productratingRadio2">
                                                    <label class="form-check-label" for="productratingRadio2">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 2 &amp; Above
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1 Star" id="productratingRadio1">
                                                    <label class="form-check-label" for="productratingRadio1">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 1
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end accordion-item -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    {{--                    <!-- end col -->--}}

                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ route('product-detail', $product->id) }}">

                                                <div class="product-img">
                                                    <img src="{{ $product->images }}" class="img-fluid d-block">
                                                </div>
                                                <div class="product-title">
                                                    <h5 class="" title="{{ $product->title }}">{{ \Illuminate\Support\Str::limit($product->title, 60) }}</h5>
                                                </div>
                                                <div class="row text-center">
                                                    <h4 class="text-danger">${{ $product->sale_price }}</h4>
                                                </div>
                                                <div class="row text-center">
                                                    <h5>$
                                                        <del>{{ $product->regular_price }}</del>
                                                    </h5>
                                                </div>
                                            </a>

                                            <div class="row d-flex justify-content-center align-items-center">
                                                <button class="btn btn-outline-primary add-to-cart" data-id="{{ $product->id }}">
                                                    <i class="ri-luggage-cart-fill"></i> Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end col -->
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
                        <script>document.write(new Date().getFullYear())</script>
                        2023 © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design &amp; Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('js')
    <!-- nouisliderribute js -->
    <script src="{{ asset('assets/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/libs/wnumb/wNumb.min.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="{{ asset('../../../../unpkg.com/gridjs%406.0.6/plugins/selection/dist/selection.umd.js') }}"></script>
    <!-- ecommerce product list -->
    <script src="{{ asset('assets/js/pages/ecommerce-product-list.init.js') }}"></script>
    <script>
        $(document).ready(function () {
            let count_cart = $('.dropdown-item.dropdown-item-cart').length;
            if(parseInt(count_cart) === 0) {
                $('.total-order-value').hide();
            }

            $('.add-to-cart').on('click', function () {
                let product_id = $(this).data('id');

                $.ajax({
                    type:"GET",
                    url: 'add-to-cart/' + product_id,
                    data:{
                        id: product_id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(response){
                        console.log(response);
                    },
                    error:function (response){

                    }

                })
            });

            $('.remove-item-btn').on('click', function (e) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this product variable!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let product_id = $(this).data('id');

                        $.ajax({
                            type: 'post',
                            url: '/remove-from-cart/' + product_id,
                            data: {
                                id: product_id,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function (response){
                                Swal.fire(
                                    'Deleted!',
                                    'This row has been deleted.',
                                    'success'
                                );
                                $('.item-cart-product-' + product_id).remove();
                                let count_cart = $('.dropdown-item.dropdown-item-cart').length;

                                if(parseInt(count_cart) === 0) {
                                    $('.empty-cart').show();
                                    $('.total-order-value').hide();
                                } else {
                                    $('.empty-cart').hide();
                                    $('.total-order-value').show();
                                }
                            }, error:function (response) {
                                console.log(response.responseText)
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'error'
                                );
                            }
                        })
                    }
                });

            });
        });
    </script>
@endsection

