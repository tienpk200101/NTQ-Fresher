@extends('admin.layouts.layout')

@push('css')
    <link rel="stylesheet" href="../../../../cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="../../../../cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="../../../../cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Attributes</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Attributes</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    This is <strong>Datatable</strong> page in wihch we have used <b>jQuery</b> with cnd link!--}}
{{--                </div>--}}

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="show-alert"></div>
                            @include('errors.error')
                            <div class="card-header">
                                <a href="{{ route('admin.add_term.show') }}" class="btn btn-primary">+ Add Term</a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>SR No.</th>
                                        <th>Term</th>
                                        <th>Value</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attributes as $key => $attribute)
                                        <tr class="item-{{ $attribute->id }}">
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="option1">
                                                </div>
                                            </th>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $attribute->getTermAttribute->title }}</td>
                                            <td>{{ $attribute->value  }}</td>
                                            <td>{{ $attribute->created_at }}</td>
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                                        <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                                        <li>
                                                            <a href="{{ route('admin.attribute.edit', ['slug' => $attribute->getTermAttribute->slug, 'id' => $attribute->id]) }}" class="dropdown-item edit-item-btn">
                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.attribute.destroy', $attribute->id) }}" method="POST" class="delete-form">
                                                                @csrf
                                                                <button type="button" class="dropdown-item remove-item-btn" data-id="{{ $attribute->id }}">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 form-add-edit">
                        <form action="{{ route('admin.attribute.store') }}" method="POST" id="form-addterm">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h5>Add Attribute</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 select-term">
                                        <label class="form-label" for="choice-term">Term</label>
                                        <select id="choice-term" class="form-control" name="term_id">
                                            @foreach($terms as $term)
                                                <option value="{{ $term->id }}">{{ $term->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('term_id')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="attribute-value-input">Term Title</label>
                                        <input type="text" class="form-control @error('value') is-invalid @enderror"
                                               id="attribute-value-input" name="value" value="{{ old('value') }}"
                                               placeholder="Enter attribute value" required>
                                        @error('value')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-primary btn-submit w-sm">Add</button>
                            </div>
                        </form>
                    </div>
                </div><!--end row-->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer border-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>2023 © Velzon.
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
    <script src="{{ asset('../../../../code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="{{ asset('../../../../cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('../../../../cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('../../../../cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('../../../../cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('../../../../cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('../../../../cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
    <script src="{{ asset('../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
    <script src="{{ asset('../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.remove-item-btn').click(removeTerm);

            function removeTerm() {
                let term_id = $(this).data('id')
                console.log();
                if(confirm('Are you sure to delete this record')) {
                    $.ajax({
                        type:'POST',
                        url: $(this).parent('.delete-form').attr('action'),
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: term_id
                        },
                        success:function(response) {
                            if(response.code === 1) {
                                $('tr').remove('.item-'+term_id)

                                alert('Delete successful');
                            }
                        }
                    })
                }
            }
        });
    </script>
@endsection
