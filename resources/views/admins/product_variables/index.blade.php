@extends('admins.layouts.layout')

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
                            <h4 class="mb-sm-0">Product Variables</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Product Variables({{ $product->title }})</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12 col-lg-10">
                        <div>
                            <div class="card">
                                @include('errors.error')
                                <div class="card-header border-0">
                                    <div class="row g-4">
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="{{ route('admin.product_variable.create', $product->id) }}" class="btn btn-primary"
                                                   id="addproduct-btn"><i
                                                        class="ri-add-line align-bottom me-1"></i> Add Product Variable</a>
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
                                                        All <span class="badge badge-soft-danger align-middle rounded-pill ms-1">12</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                            <table role="grid" class="gridjs-table" style="height: auto;">
                                                <thead class="gridjs-thead">
                                                <tr class="gridjs-tr">
                                                    <th data-column-id="#" class="gridjs-th text-muted" style="width: 40px;">
                                                        <div class="gridjs-th-content">#</div>
                                                    </th>
                                                    <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 360px;">
                                                        <div class="gridjs-th-content">Product</div>
                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                class="gridjs-sort gridjs-sort-neutral"></button>
                                                    </th>
                                                    <th data-column-id="stock" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 94px;">
                                                        <div class="gridjs-th-content">Stock</div>
                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                class="gridjs-sort gridjs-sort-neutral"></button>
                                                    </th>
                                                    <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                        <div class="gridjs-th-content">Regular Price</div>
                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                class="gridjs-sort gridjs-sort-neutral"></button>
                                                    </th>
                                                    <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                        <div class="gridjs-th-content">Sale Price</div>
                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                class="gridjs-sort gridjs-sort-neutral"></button>
                                                    </th>
                                                    <th data-column-id="published" class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 220px;">
                                                        <div class="gridjs-th-content">Create date</div>
                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                class="gridjs-sort gridjs-sort-neutral"></button>
                                                    </th>
                                                    <th data-column-id="action" class="gridjs-th text-muted" style="width: 80px;">
                                                        <div class="gridjs-th-content">Action</div>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="gridjs-tbody">
                                                @foreach($product_variables as $product_variable)
                                                    <tr class="gridjs-tr item-{{ $product_variable->id }}">
                                                        <td data-column-id="#" class="gridjs-td">
                                                         <span>
                                                             <div class="form-check checkbox-product-list">
                                                                 <input class="form-check-input" type="checkbox" value="1" id="checkbox-1">
                                                                 <label class="form-check-label" for="checkbox-1"></label>
                                                             </div>
                                                         </span>
                                                        </td>
                                                        <td data-column-id="product" class="gridjs-td">
                                                        <span>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm bg-light rounded p-1">
                                                                        <img src="{{ empty($product_variable->image) ? '' : $product_variable->image }}" alt=""
                                                                             class="img-fluid d-block"></div></div><div
                                                                    class="flex-grow-1">
                                                                    <h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html"
                                                                                              class="text-dark">{{ $product_variable->title }}</a></h5>
                                                                    <p class="text-muted mb-0">
                                                                        Category : <span class="fw-medium">Fashion</span><br>
                                                                        Color: <span class="fw-medium">{{ $product_variable->color }}</span><br>
                                                                        Size: <span class="fw-medium">{{ $product_variable->size }}</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        </td>
                                                        <td data-column-id="stock" class="gridjs-td">{{ $product_variable->stock }}</td>
                                                        <td data-column-id="price" class="gridjs-td"><span>${{ $product_variable->regular_price }}</span></td>
                                                        <td data-column-id="price" class="gridjs-td"><span>${{ $product_variable->sale_price }}</span></td>
                                                        <td data-column-id="published" class="gridjs-td">
                                                            <span>{{ $product_variable->created_at }}
                                                                {{--                                                                <small class="text-muted ms-1">10:05 AM</small>--}}
                                                            </span>
                                                        </td>
                                                        <td data-column-id="action" class="gridjs-td">
                                                        <span>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false"><i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a class="dropdown-item edit-list" data-edit-id="1"
                                                                           href="{{ route('admin.product_variable.edit', ['id' => $product_variable->id]) }}">
                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('admin.product_variable.destroy', ['id' => $product_variable->id]) }}"
                                                                            method="post" class="delete-form">
                                                                            @csrf
                                                                            <button type="button" class="dropdown-item remove-item-btn" href="#" data-id="{{ $product_variable->id }}"
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
                                    </div>
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
    <script>
        $(document).ready(function(){

            $('.remove-item-btn').click(removeTerm);

            function removeTerm() {
                let product_variable_id = $(this).data('id')
                console.log();
                if(confirm('Are you sure to delete this record')) {
                    $.ajax({
                        type:'POST',
                        url: $(this).parent('.delete-form').attr('action'),
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: product_variable_id
                        },
                        success:function(response) {
                            if(response.code == 1) {
                                $('tr').remove('.item-'+product_variable_id)

                                alert('Delete successful');
                            }
                        }
                    })
                }
            }
        });
    </script>
@endsection
