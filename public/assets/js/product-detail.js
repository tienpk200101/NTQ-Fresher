$(document).ready(function(){
    var product_variables;

    $.ajax({
        type: 'GET',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        url: '/get-product-variable',
        success: function (response){
            product_variables = response.data;
        }
    });

    console.log(product_variables);

    var data_click = {
        color: '',
        size: 's',
        image_index: 0
    };

    var swiper = new Swiper(".mySwipper", {
        slidesPerView: 1,
        spaceBetween: 30,
        // pagination: {
        //   el: ".swipper-pagination",
        //   clickable: true,
        // },
    });

    function chooseProduct(data) {
        let product_variable_default = {
            id: 0,
            product_id: 0,
            stock: 0,
            image: [],
            description: 0,
            discount: 0,
            regular_price: 0,
            sale_price: 0,
            color: 0,
            size: 0
        }

        let index = data.image_index;
        if(index >= 0 && index < $('.swiper-wrapper').children().length) {
            swiper.autoplay.stop();
            swiper.slideTo(index);
        }

        let product = product_variables.find((product) => {
            return product.color === data.color && product.size === data.size;
        });

        if(product !== undefined) {
            $('.price-show').text(product.sale_price);
            $('.stock-show').text(product.stock);
            // $('.order-show').text(product.order);
        } else {
            $('.price-show').text(0);
            $('.stock-show').text(0);
        }

        // $.ajax({
        //     type: "post",
        //     url: "/choose-var",
        //     data: data_input,
        //     success: function (response) {
        //         console.log(response.product)
        //         let product = response.product;
        //
        //         response = Object.assign({
        //                 'id': 0,
        //                 'product_id': 0,
        //                 'stock': 0,
        //                 'image': [],
        //                 'description': 0,
        //                 'discount': 0,
        //                 'regular_price': 0,
        //                 'sale_price': 0,
        //                 'color': 0,
        //                 'size': 0
        //         }, product);
        //
        //         let index = data.image_index;
        //         if(index >= 0 && index < $('.swiper-wrapper').children().length){
        //             swiper.autoplay.stop();
        //             swiper.slideTo(index);
        //         }
        //
        //         $('.price-show').text(response.sale_price);
        //         // $('.order-show').text(response.order);
        //         $('.stock-show').text(response.stock);
        //         // $('.revenue-show').text(response.revenue);
        //     }
        // });
    }


    $('.btn-check').click(function(e){
        data_click.size = $(this).val().toLowerCase();
        chooseProduct(data_click);
    });

    $('.choose-color > div').click(function () {
        data_click.color = $(this).data('color').toLowerCase();
        data_click.image_index = $(this).data('id')
        chooseProduct(data_click);
    });
});
