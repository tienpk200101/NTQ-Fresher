@extends('admin.layouts.layout')

@push('css')
    <!-- Plugins css -->
    <link href="{{ asset('assets/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Create Product Variable</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Create Product Variable</li>
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

                <form action="{{ route('admin.product_variable.store', ['id' => $product_id]) }}" method="POST" id="createproduct-form" autocomplete="off" class="needs-validation"
                      novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <label for="ckeditor-classic">Product Description</label>
                                        <textarea id="ckeditor-classic" name="description"
                                                  class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
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
                                                    <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right"
                                                           title="Select Image">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                <i class="ri-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <input type="file" class="form-control d-none @error('image') is-invalid @enderror" value=""
                                                           id="product-image-input" name="image" accept="image/png, image/gif, image/jpeg">
                                                </div>
                                                <div class="avatar-lg">
                                                    <div class="avatar-title bg-light rounded">
                                                        <img src="#" id="product-img" class="avatar-md h-auto"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <h5 class="fs-14 mb-1">Product Gallery</h5>
                                        <p class="text-muted">Add Product Gallery Images.</p>

                                        <div class="dropzone">
                                            <div class="fallback">
                                                <input id="gallery" type="file" name="file[]" class="form-control" accept="image/png, image/gif, image/jpeg"
                                                       multiple>
                                            </div>
                                            <div for="gallery" class="dz-message needsclick">
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
                                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image"/>
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
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="stocks-input">Stocks</label>
                                                        <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stocks-input"
                                                               value="{{ old('stock') }}" name="stock" placeholder="Stocks" required>
                                                        @error('stock')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="product-price-input">Regular price</label>
                                                        <div class="input-group has-validation mb-3">
                                                            <span class="input-group-text" id="product-price-addon">$</span>
                                                            <input type="text" class="form-control @error('regular_price') is-invalid @enderror"
                                                                   id="product-price-input" value="{{ old('regular_price') }}" name="regular_price" placeholder="Enter price"
                                                                   aria-label="Price" aria-describedby="product-price-addon" required>
                                                            @error('regular_price')
                                                                <div class="text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="mb-4">
                                                        <label class="form-label" for="product-discount-input">Discount</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                                            <input type="text" class="form-control @error('discount') is-invalid @enderror"
                                                                   id="product-discount-input" value="{{ old('discount') }}" name="discount"
                                                                   placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                            <div class="invalid-feedback">Please Enter a product discount.</div>
                                                        </div>
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
                                                <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description"
                                                          rows="3"></textarea>
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
                                <button type="submit" class="btn btn-primary w-sm">Create</button>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Attribute</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="choices-color" class="form-label">Color</label>
                                        <select class="form-select" name="color" id="choices-color" data-choices data-choices-search-false>
                                            @foreach($terms['color'] as $color)
                                                <option value="{{ $color->id }}">{{ $color->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="choices-size" class="form-label">Size</label>
                                        <select class="form-select" name="size" id="choices-size" data-choices data-choices-search-false>
                                            @foreach($terms['size'] as $size)
                                                <option value="{{ $size->id }}">{{ $size->value }}</option>
                                            @endforeach
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
                                        <input type="text" id="datepicker-publish-input" class="form-control" placeholder="Enter publish date"
                                               data-provider="flatpickr" data-date-format="d.m.y" data-enable-time>
                                    </div>
                                </div>
                            </div>


                            </div>

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
                        <script>document.write(new Date().getFullYear())</script>
                        © Velzon.
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
