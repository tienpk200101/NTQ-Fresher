$(document).ready(function () {
    start();

    function changeImage() {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#product-img').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    }

    function addOrUpdateProduct(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let formData = new FormData(this);
        let action = $('input[name="formAction"]').val();
        let url;

        if (action === 'add') {
            url = $('#createproduct-form').attr('action');
        } else if (action === 'edit') {
            url = $('#updateproduct-form').attr('action');
        }

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#loader').removeClass('d-none')
            },
            success: function (response) {
                $('#product-img').attr('src', '#')
                $('#ckeditor-classic').html('');
                Swal.fire(
                    'Successfully!',
                    response.data,
                    'success'
                )
            },
            error: function (error) {
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
    }

    function deleteProduct(e) {
        e.preventDefault();
        let product_id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let count_product = $('.count-product').data('count-product');

                $.ajax({
                    type: "POST",
                    url: "/admin/delete-product/" + product_id,
                    data: {
                        id: product_id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('tr').remove('.item-' + product_id);
                        $('.count-product').html(--count_product);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
        })
    }

    function start() {
        $('.delete-item-product').on('submit', deleteProduct);

        $('#createproduct-form').on('submit', addOrUpdateProduct);
        $('#updateproduct-form').on('submit', addOrUpdateProduct);

        $('#product-image-input').on('change', changeImage);
    }
});
