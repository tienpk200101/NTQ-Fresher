$(document).ready(function() {

    $('.product').click(function(){
        var price = parseFloat($(this).find('.product-price').text());

        $(this).find('.plus').click(function(e) {
            $(this).parent().find('.product-quantity').get(0).value++;
            //$(this).parent('.product').find('.product-price').css("color", "red");
            //console.log($(this).parent('.test').find('.product-price').css("color", "red"));
            console.log($(this).parent().find('.product-quantity').val() * price);
            $(this).parent().find('.product-line-price').text($(this).parent().find('.product-quantity').val() * price);
            // console.log($(this).parent().tagClass());
        });

        // $(this).find('.minus').click(function(e) {
        //     if ($(this).find('.product-quantity').val() > 1)
        //         $(this).find('.product-quantity').get(0).value--;
    
        //         $(this).find('.product-line-price').text($(this).parent().find('.product-quantity').val() * price);
        // });
    })

    

    
});