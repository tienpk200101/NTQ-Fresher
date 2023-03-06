$(document).ready(function() {
    var total = 0;

    function orderSummary(total){
        document.querySelectorAll('.product-line-price').forEach(function(e){
            total += parseFloat(e.innerHTML);
        });
        
        let cart_subtotal = $('#cart-subtotal').text(total.toFixed(2));
        let cart_discount = $('#cart-discount').text((total*0.15).toFixed(2));
        let cart_tax = $('#cart-tax').text((total*0.125).toFixed(2));
        let total_finally = parseFloat(cart_subtotal.text()) + parseFloat(cart_discount.text()) + parseFloat(cart_tax.text());
        
        $('#cart-total').text(total_finally.toFixed(2));
        total = 0;
    }

    $('.input-step').find('.plus').click(function(e){
        let productElement = $(this).parent().parent().parent().parent().parent();
        let price = parseFloat(productElement.find('.product-price').text());

        $(this).parent().find('.product-quantity').get(0).value++;

        productElement.find('.product-line-price').text(($(this).parent().find('.product-quantity').val() * price).toFixed(2));

        orderSummary(total);
    });

    $('.input-step').find('.minus').click(function(e){
        let productElement = $(this).parent().parent().parent().parent().parent();
        let price = parseFloat(productElement.find('.product-price').text());
        let total = 0;

        $(this).parent().find('.product-quantity').get(0).value--;
        productElement.find('.product-line-price').text(($(this).parent().find('.product-quantity').val() * price).toFixed(2));

        orderSummary(total);
    })
});