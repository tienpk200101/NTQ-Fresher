@extends('admin.layouts.layout')

@push('css')
    <!-- Plugins css -->
    <link href="{{ asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Edit Product</li>
                                </ol>
                            </div>

                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- end page title -->

                <form action="{{ route('admin.product_edit.post', ['id' => $product->id]) }}" method="POST" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-title-input">Product Title</label>
                                        <input type="hidden" class="form-control" id="formAction" name="formAction" value="edit">
                                        <input type="text" class="form-control d-none" id="product-id-input">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="product-title-input" name="title" value="{{ $product->title }}" placeholder="Enter product title" required>
                                        <div class="invalid-feedback">Please Enter a product title.</div>

                                    </div>
                                    <div>
                                        <label for="ckeditor-classic">Product Description</label>
                                        <textarea id="ckeditor-classic" name="description" class="@error('description') is-invalid @enderror">{!! $product->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Product Gallery</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="fs-14 mb-1">Product Image</h5>
                                        <p class="text-muted">Add Product main Image.</p>
                                        <div class="text-center">
                                            <div class="position-relative d-inline-block">
                                                <div class="position-absolute top-100 start-100 translate-middle">
                                                    <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                <i class="ri-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <input type="file" class="form-control d-none @error('images') is-invalid @enderror" value="{{ $product->images }}" id="product-image-input" name="images" accept="image/png, image/gif, image/jpeg">
                                                </div>
                                                <div class="avatar-lg">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="{{ $product->images }}" id="product-img" class="avatar-md h-auto" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="fs-14 mb-1">Product Gallery</h5>
                                        <p class="text-muted">Add Product Gallery Images.</p>

                                        <div class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple">
                                            </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                </div>

                                                <h5>Drop files here or click to upload.</h5>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                                            <li class="mt-2" id="dropzone-preview-list">
                                                <!-- This is used as the file preview template -->
                                                <div class="border rounded">
                                                    <div class="d-flex p-2">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded">
                                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div class="pt-1">
                                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-3">
                                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- end dropzon-preview -->
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                                General Info
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                                Meta Data
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-name-input">Manufacturer Name</label>
                                                        <input type="text" class="form-control" id="manufacturer-name-input" placeholder="Enter manufacturer name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-brand-input">Manufacturer Brand</label>
                                                        <input type="text" class="form-control" id="manufacturer-brand-input" placeholder="Enter manufacturer brand">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="stocks-input">Stocks</label>
                                                        <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stocks-input" value="{{ $product->stock }}" name="stock" placeholder="Stocks" required>
                                                        <div class="invalid-feedback">Please Enter a product stocks.</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="product-price-input">Price</label>
                                                        <div class="input-group has-validation mb-3">
                                                            <span class="input-group-text" id="product-price-addon">$</span>
                                                            <input type="text" class="form-control @error('regular_price') is-invalid @enderror" id="product-price-input" value="{{ $product->regular_price }}" name="regular_price" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                            <div class="invalid-feedback">Please Enter a product price.</div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="product-discount-input">Discount</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="product-discount-input" value="{{ $product->discount }}" name="discount" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="orders-input">Orders</label>
                                                        <input type="text" class="form-control @error('order') is-invalid @enderror" id="orders-input" value="{{ $product->order }}" name="order" placeholder="Orders" required>
                                                        <div class="invalid-feedback">Please Enter a product orders.</div>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- end tab-pane -->

                                        <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meta-title-input">Meta title</label>
                                                        <input type="text" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                                        <input type="text" class="form-control" placeholder="Enter meta keywords" id="meta-keywords-input">
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <div>
                                                <label class="form-label" for="meta-description-input">Meta Description</label>
                                                <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-primary w-sm">Submit</button>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Publish</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Status</label>

                                        <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                            <option value="Published" selected>Published</option>
                                            <option value="Scheduled">Scheduled</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                                        <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                            <option value="Public" selected>Public</option>
                                            <option value="Hidden">Hidden</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Publish Schedule</h5>
                                </div>
                                <!-- end card body -->
                                <div class="card-body">
                                    <div>
                                        <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                                        <input type="text" id="datepicker-publish-input" class="form-control" placeholder="Enter publish date" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Product Categories</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                            New</a>Select product category</p>
                                    <select class="form-select" id="choices-category-input" name="category_id" data-choices data-choices-search-false>
                                         @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Product Tags</h5>
                                </div>
                                <div class="card-body">
                                    <div class="hstack gap-3 align-items-start">
                                        <div class="flex-grow-1">
                                            <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text" value="Cotton" />
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Product Short Description</h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted mb-2">Add short description for product</p>
                                    <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </form>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer border-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Velzon.
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
     <!-- ckeditor -->
     <script src="{{ asset('assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

     <!-- dropzone js -->
     <script src="{{ asset('assets/libs/dropzone/dropzone-min.js') }}"></script>

     <script src="{{ asset('assets/js/pages/ecommerce-product-create.init.js') }}"></script>
@endsection