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

                <form action="{{ route('admin.product_variable.store', ['id' => $product_id]) }}" method="POST" id="createproduct-form" autocomplete="off"
                      class="needs-validation"
                      novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row increment">
                        <div class="text-end mb-3">
                            <label>Add Row</label>
                            <input type="number" class="col-md-1" name="amount-variant">
                            <div id="loader" class="d-none overlay">
                                <img src="{{ asset('assets/images/Dual Ring-1s-90px.svg') }}" alt="">
                            </div>
                            <button type="button" class="btn btn-success w-sm add-variable">Add Variable</button>
                            <button type="submit" class="btn btn-primary w-sm">Create</button>
                        </div>
                    </div>

                    <div class="clone">
                        <div id="form-all" class="row item-product-variable">
                            <div class="col-lg-8">
                                <div id="all-attr-variable" class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                                    General Info
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body pro-vari-item">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                                <div class="row">
                                                    @foreach(\App\Models\TermModel::all() as $term)
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="mb-4">
                                                                <label class="form-label" for="stocks-input">{{ $term->title }}</label>
                                                                <input type="text" class="form-control @error('$term->slug') is-invalid @enderror"
                                                                       id="stocks-input"
                                                                       value="{{ old($term->slug) }}" name="{{ $term->slug }}[]" required>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="mb-4">
                                                            <label class="form-label" for="stocks-input">Stocks</label>
                                                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stocks-input"
                                                                   value="{{ old('stock') }}" name="stock[]" placeholder="Stocks" required>
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
                                                                       id="product-price-input" value="{{ old('regular_price') }}" name="regular_price[]"
                                                                       placeholder="Enter price"
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
                                                                       id="product-discount-input" value="{{ old('discount') }}" name="discount[]"
                                                                       placeholder="Enter discount" aria-label="discount"
                                                                       aria-describedby="product-discount-addon">
                                                                <div class="invalid-feedback">Please Enter a product discount.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                            <!-- end tab-pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </div>
                                    <hr>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="fs-14 mb-1">Product Image</h5>
                                            <p class="text-muted">Add Product main Image.</p>
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="product-image-input-0" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right"
                                                               title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input type="file" class="form-control d-none @error('images') is-invalid @enderror images" value=""
                                                               id="product-image-input-0" data-id="0" name="images-0" onchange="changeImage(this)" accept="image/png, image/gif, image/jpeg" multiple>
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="#" id="product-img-0" class="avatar-md h-auto"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image')
                                            <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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

    <script>
        // $(document).ready(function () {
            $('.add-variable').click(function () {
                let amount_variant = $('input[name="amount-variant"]');

                let count = $('.item-product-variable').length;

                for (let i = count; i < parseInt(amount_variant.val()) + count; i++) {
                    let html = `
                        <div id="form-all" class="row item-product-variable">
                            <div class="col-lg-8">
                                <div id="all-attr-variable" class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                                    General Info
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body pro-vari-item">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                                <div class="row">
                                                                    @foreach(\App\Models\TermModel::all() as $term)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="mb-4">
                                            <label class="form-label" for="stocks-input">{{ $term->title }}</label>
                                                                                <input type="text" class="form-control @error('$term->slug') is-invalid @enderror" id="stocks-input"
                                                                                       value="{{ old($term->slug) }}" name="{{ $term->slug }}[]" required>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="mb-4">
                                                <label class="form-label" for="stocks-input">Stocks</label>
                                                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stocks-input"
                                                                                   value="{{ old('stock') }}" name="stock[]" placeholder="Stocks" required>
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
                                                                                       id="product-price-input" value="{{ old('regular_price') }}" name="regular_price[]"
                                                                                       placeholder="Enter price"
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
                                                                                       id="product-discount-input" value="{{ old('discount') }}" name="discount[]"
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
                                                        </div>
                                                        <!-- end tab content -->
                                                    </div>
                                                    <hr>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <h5 class="fs-14 mb-1">Product Image</h5>
                                                            <p class="text-muted">Add Product main Image.</p>
                                                            <div class="text-center">
                                                                <div class="position-relative d-inline-block">
                                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                                        <label for="product-image-input-${i}" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right"
                                                                               title="Select Image">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                                    <i class="ri-image-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                        <input type="file" class="form-control d-none images" value=""
                                                                               id="product-image-input-${i}" data-id="${i}" onchange="changeImage(this)" name="images-${i}" accept="image/png, image/gif, image/jpeg" multiple>
                                                                    </div>
                                                                    <div class="avatar-lg">
                                                                        <div class="avatar-title bg-light rounded">
                                                                            <img src="#" id="product-img-${i}" class="avatar-md h-auto"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('image')
                                    <div class="text text-danger">{{ $message }}</div>
                                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger">Remove</button>
                        </div>
                    </div>
                `;

                    $('#createproduct-form').append(html);
                }

                amount_variant.val('');
            });

            $("body").on("click", ".btn-danger", function () {
                $(this).parents(".item-product-variable").remove();
            });

            function changeImage(input) {
                const id = $(input).data('id');
                console.log($(input));
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#product-img-'+id).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#createproduct-form').submit(function (e) {
                e.preventDefault();

                let data = new FormData(this)

                // $.each($('input[type="file"]'), function (i, inputFile) {
                //     $.each($(inputFile)[0].files, function (j, file) {
                //         data.append('images[]', file);
                //     });
                // });

                let url = $(this).attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#loader').removeClass('d-none')
                    },
                    success: function (response) {
                        console.log(response);

                        $('#product-img').attr('src', '#')
                        $('#ckeditor-classic').html('');
                        Swal.fire(
                            'Successfully!',
                            response.data,
                            'success'
                        )
                    },
                    error: function (error) {
                        console.log(error);
                        Swal.fire(
                            'Oops...! Something went Wrong !',
                            'You need to fill in all the information',
                            'error'
                        )
                    },
                    complete: function () {
                        $('#loader').addClass('d-none');
                        setTimeout(() => {
                            window.location.href = '/admin/manage-product';
                        }, 2000);
                    },
                });
            });

        // });
    </script>
@endsection
