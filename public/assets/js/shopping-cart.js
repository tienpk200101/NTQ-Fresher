$(document).ready(function () {

    start();

    function start() {
        let count_cart = $('.dropdown-item.dropdown-item-cart').length;

        showOrder(count_cart);
        showEmptyCart(count_cart);
        $('.add-to-cart').on('click', addProductInCart);
        $('.remove-item-btn').on('click', removeProductFromCart);
    }

    function showOrder(count_cart) {
        if (parseInt(count_cart) === 0) {
            $('.total-order-value').hide();
        }
    }

    function showEmptyCart(count_cart) {
        if (parseInt(count_cart) > 0) {
            $('#empty-cart').hide();
        } else {
            $('#empty-cart').show();
        }
    }

    function addProductInCart() {
        let product_id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: 'add-to-cart/' + product_id,
            data: {
                id: product_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let products = response.data;
                let total_products = Object.keys(products).length;
                let total_price = 0;
                let html = '';

                Object.keys(products).forEach(function (key, index) {
                    let product = products[key];
                    console.log(product);
                    html += `
                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2 item-cart-product-{{ $id }}">
                            <div class="d-flex align-items-center">
                                <img src="${product.image}"
                                     class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                <div class="flex-1">
                                    <h6 class="mt-0 mb-1 fs-14">
                                        <a href="{{ route('product-detail', $id) }}"
                                           class="text-reset">${product.name}</a>
                                    </h6>
                                    <p class="mb-0 fs-12 text-muted">
                                        Quantity: <span>${product.quantity} x ${product.price}</span>
                                    </p>
                                </div>
                                <div class="px-2">
                                    <h5 class="m-0 fw-normal">$<span class="cart-item-price">${product.quantity * product.price}</span>
                                    </h5>
                                </div>
                                <div class="ps-2">
                                    <button type="button" data-id="${key}" onclick="removeProductFromCart(this)" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn">
                                        <i class="ri-close-fill fs-16"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    total_price += product.price * product.quantity;
                });

                $('#empty-cart').hide();
                $('.total-order-value').show();
                $('.cartitem-badge').html(total_products);
                $('#cart-item-total').html(total_price)

                window.location.reload(true);
            },
            error: function (response) {

            }

        })
    }

    function removeProductFromCart(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "Remove this product!",
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
                    success: function (response) {
                        countProduct();
                        Swal.fire(
                            'Deleted!',
                            'This row has been deleted.',
                            'success'
                        );
                        $('.item-cart-product-' + product_id).remove();
                        $('.product-'+product_id).remove();
                        let count_cart = $('.dropdown-item.dropdown-item-cart').length;
                        if (count_cart === 0) {
                            $('.empty-cart').show();
                            $('.total-order-value').hide();
                        }
                        $('.cartitem-badge').html(count_cart);
                    }, error: function (response) {
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
    }

    function countProduct() {
        let count_cart = $('.dropdown-item.dropdown-item-cart').length;
        if (parseInt(count_cart) === 0) {
            $('.total-order-value').hide();
        } else {
            $('#empty-cart').show();
        }
    }

    function orderSummary(total) {
        document.querySelectorAll('.product-line-price').forEach(function (e) {
            total += parseFloat(e.innerHTML);
        });

        let cart_subtotal = $('#cart-subtotal').text(total.toFixed(2));
        let cart_discount = $('#cart-discount').text((total * 0.15).toFixed(2));
        let cart_tax = $('#cart-tax').text((total * 0.125).toFixed(2));
        let total_finally = parseFloat(cart_subtotal.text()) + parseFloat(cart_discount.text()) + parseFloat(cart_tax.text());

        $('#cart-total').text(total_finally.toFixed(2));
        total = 0;
    }

    $('.input-step').find('.plus').click(function (e) {
        let productElement = $(this).parent().parent().parent().parent().parent();
        let quantity = parseInt($(this).parent().find('.product-quantity').val()) + 1;
        let productId = $(this).data('id');
        let data = {
            id: productId,
            quantity: quantity
        };
        changeQuantity(data)

        let price = parseFloat(productElement.find('.product-price').text());
        let total = 0;

        $(this).parent().find('.product-quantity').get(0).value++;
        productElement.find('.product-line-price').text(($(this).parent().find('.product-quantity').val() * price).toFixed(2));

        orderSummary(total);
    });

    $('.input-step').find('.minus').click(function (e) {
        let productElement = $(this).parent().parent().parent().parent().parent();
        let quantity = parseInt($(this).parent().find('.product-quantity').val()) - 1;
        let productId = $(this).data('id');
        let data = {
            id: productId,
            quantity: quantity
        };
        changeQuantity(data)

        let price = parseFloat(productElement.find('.product-price').text());
        let total = 0;

        $(this).parent().find('.product-quantity').get(0).value--;
        productElement.find('.product-line-price').text(($(this).parent().find('.product-quantity').val() * price).toFixed(2));

        orderSummary(total);
    });

    function changeQuantity(data) {
        $.ajax({
            type:"GET",
            url:"/change-quantity",
            data:data,
            success:function (response){
                console.log(response.data)
            }
        });
    }
});
