@extends('admin.layouts.layout')

@push('css')
    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/nouislider/nouislider.min.css') }}">

    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/gridjs/theme/mermaid.min.css') }}">
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
                                        <input class="form-control form-control-sm" type="text" id="minCost" value="0">
                                        <span class="fw-semibold text-muted">to</span>
                                        <input class="form-control form-control-sm" type="text" id="maxCost" value="1000">
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
                    <!-- end col -->

                    <div class="col-xl-9 col-lg-8">
                        <div>
                            <div class="card">
                                @include('errors.error')
                                <div class="card-header border-0">
                                    <div class="row g-4">
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="{{ route('admin.product_add.show') }}" class="btn btn-primary" id="addproduct-btn"><i
                                                        class="ri-add-line align-bottom me-1"></i> Add Product</a>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab"
                                                       aria-selected="true">
                                                        All <span class="badge badge-soft-danger align-middle rounded-pill ms-1 count-product" data-count-product="{{ count($products) }}">{{ count($products) }}</span>
                                                    </a>
                                                </li>
{{--                                                <li class="nav-item" role="presentation">--}}
{{--                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab"--}}
{{--                                                       aria-selected="false" tabindex="-1">--}}
{{--                                                        Published <span class="badge badge-soft-danger align-middle rounded-pill ms-1">5</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="nav-item" role="presentation">--}}
{{--                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab"--}}
{{--                                                       aria-selected="false" tabindex="-1">--}}
{{--                                                        Draft--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
                                            </ul>
                                        </div>
                                        <div class="col-auto">
                                            <div id="selection-element">
                                                <div class="my-n1 d-flex align-items-center text-muted">
                                                    Select
                                                    <div id="select-content" class="text-body fw-semibold px-1"></div>
                                                    Result
                                                    <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal"
                                                            data-bs-target="#removeItemModal">Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                            <div id="table-product-list-published" class="table-card gridjs-border-none">
                                                <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                                    <div class="gridjs-wrapper" style="height: auto;">
                                                        <table role="grid" class="gridjs-table" style="height: auto;">
                                                            <thead class="gridjs-thead">
                                                            <tr class="gridjs-tr">
                                                                <th data-column-id="#" class="gridjs-th text-muted" style="width: 40px;">
                                                                    <div class="gridjs-th-content">#</div>
                                                                </th>
                                                                <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 360px;">
                                                                    <div class="gridjs-th-content">Product</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="stock" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 94px;">
                                                                    <div class="gridjs-th-content">Stock</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 101px;">
                                                                    <div class="gridjs-th-content">Price</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="orders" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 84px;">
                                                                    <div class="gridjs-th-content">Orders</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="orders" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 84px;">
                                                                    <div class="gridjs-th-content">Variant</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="rating" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 105px;">
                                                                    <div class="gridjs-th-content">Rating</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="published" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                                    style="width: 220px;">
                                                                    <div class="gridjs-th-content">Published</div>
                                                                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                </th>
                                                                <th data-column-id="action" class="gridjs-th text-muted" style="width: 80px;">
                                                                    <div class="gridjs-th-content">Action</div>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="gridjs-tbody">
                                                            @foreach($products as $product)
                                                                <tr class="gridjs-tr item-{{ $product->id }}">
                                                                    <td data-column-id="#" class="gridjs-td"><span><div
                                                                                class="form-check checkbox-product-list">					<input
                                                                                    class="form-check-input" type="checkbox" value="undefined"
                                                                                    id="checkboxpublished-undefined">					<label
                                                                                    class="form-check-label"
                                                                                    for="checkbox-undefined"></label>				  </div></span></td>
                                                                    <td data-column-id="product" class="gridjs-td"><span><div class="d-flex align-items-center"><div
                                                                                    class="flex-shrink-0 me-3"><div class="avatar-sm bg-light rounded p-1"><img
                                                                                            src="{{ $product->images }}" alt="" class="img-fluid d-block"></div></div><div
                                                                                    class="flex-grow-1"><h5 class="fs-14 mb-1"><a
                                                                                            href="apps-ecommerce-product-details.html" class="text-dark">{{ $product->title }}</a></h5><p
                                                                                        class="text-muted mb-0">Category : <span
                                                                                            class="fw-medium">Furniture</span></p></div></div></span>
                                                                    </td>
                                                                    <td data-column-id="stock" class="gridjs-td">{{ $product->stock }}</td>
                                                                    <td data-column-id="price" class="gridjs-td"><span>${{ $product->sale_price }}</span></td>
                                                                    <td data-column-id="orders" class="gridjs-td">{{ $product->order }}</td>
                                                                    <td data-column-id="orders" class="gridjs-td">{{ $product->is_attr == 0 ? 'NO' : 'YES' }}</td>
                                                                    <td data-column-id="rating" class="gridjs-td"><span><span
                                                                                class="badge bg-light text-body fs-12 fw-medium"><i
                                                                                    class="mdi mdi-star text-warning me-1"></i>4.3</span></span></td>
                                                                    <td data-column-id="published" class="gridjs-td"><span>{{ $product->created_at->format('d M, Y') }}<small
                                                                                class="text-muted ms-1">{{ $product->created_at->format('h:i A') }}</small></span>
                                                                    </td>
                                                                    <td data-column-id="action" class="gridjs-td">
                                                                        <span>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                                                                                        aria-expanded="false"><i class="ri-more-fill"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                                    <li class="{{ $product->is_attr == 0 ? 'd-none' : '' }}">
                                                                                        <a class="dropdown-item"
                                                                                           href="{{ route('admin.product_variable.index', $product->id) }}">
                                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> List Variable
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item"
                                                                                           href="{{ route('admin.product_view.show', ['id' => $product->id]) }}">
                                                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i> View
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item edit-list" data-edit-id="1"
                                                                                           href="{{ route('admin.product_edit.show', ['id' => $product->id]) }}">
                                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li>
                                                                                        <form action="{{ route('admin.product_delete.post', ['id' => $product->id]) }}"
                                                                                              data-id="{{ $product->id }}" method="post" class="delete-item-product">
                                                                                            @csrf
                                                                                            <button type="submit" class="dropdown-item remove-list" href="#" data-id="1"
                                                                                                    data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                                            </button>
                                                                                        </form>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="gridjs-footer">
                                                        <div class="gridjs-pagination">
                                                            <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 1">Showing <b>1</b> to
                                                                <b>5</b> of <b>5</b> results
                                                            </div>
                                                            <div class="gridjs-pages">
                                                                <button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="">
                                                                    Previous
                                                                </button>
                                                                <button tabindex="0" role="button" class="gridjs-currentPage" title="Page 1"
                                                                        aria-label="Page 1">1
                                                                </button>
                                                                <button tabindex="0" role="button" disabled="" title="Next" aria-label="Next" class="">Next
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="gridjs-temp" class="gridjs-temp"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->

                                        <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                            <div class="py-4 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                           colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                                </lord-icon>
                                                <h5 class="mt-4">Sorry! No Result Found</h5>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->

                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
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
    <script src="../../../../unpkg.com/gridjs%406.0.6/plugins/selection/dist/selection.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="{{ asset('assets/js/pages/ecommerce-product-list.init.js') }}"></script>

    <script src="{{ asset('assets/js/admin/product-add.js') }}"></script>
@endsection
