$("body").on("click", ".btn-danger", function () {
    $(this).parents(".item-product-variable").remove();
});

start();

function changeImage(input) {
    const id = $(input).data('id');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product-img-' + id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function submitAddProductVariable(e) {
    e.preventDefault();

    let data = new FormData(this)
    let product_id = $('input[name="product-id"]').val();
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
                window.location.href = '/admin/product-variable/' + product_id;
            }, 2000);
        },
    });
}

function removeProductVariable(e) {
    e.preventDefault();

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
            let product_variable_id = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: $(this).parent('.delete-form').attr('action'),
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: product_variable_id
                },
                success: function (response) {
                    if (response.code == 1) {
                        $('tr').remove('.item-' + product_variable_id)

                        Swal.fire(
                            'Deleted!',
                            'This row has been deleted.',
                            'success'
                        );
                    }
                },
                error: function (response) {
                    Swal.fire(
                        'Deleted!',
                        'This row has been delete failed.',
                        'error'
                    );
                }
            });
        }
    })
}

function start() {
    $('.remove-item-btn').on('click', removeProductVariable);

    $('#createproduct-form').on('submit', submitAddProductVariable);
}
