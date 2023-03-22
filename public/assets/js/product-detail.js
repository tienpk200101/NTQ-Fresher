$(document).ready(function(){
    var product_variables;

    $.ajax({
        type: 'GET',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        url: '/get-product-valiable',
        success: function (response){
            product_variables = response.data;
        }
    });

    console.log(product_variables);

    var data_click = {
        color: 'purple',
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
        let data_input = {
            color: data.color,
            size: data.size,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        // data.products.forEach(function (product) {
            console.log(product_variables);
        // })

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
        data_click.size = $(this).val();
        chooseProduct(data_click);
    });

    $('.choose-color > div').click(function () {
        data_click.color = $(this).data('color');
        data_click.image_index = $(this).data('id')
        chooseProduct(data_click);
    });

});
