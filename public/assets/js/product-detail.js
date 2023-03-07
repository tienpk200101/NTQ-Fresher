$(document).ready(function(){
    var data_click = {
        color: 'purple',
        size: 's'
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

        $.ajax({
            type: "post",
            url: "/choose-var",
            data: data_input,
            success: function (response) {
                response = Object.assign({
                        'price': 0,
                        'order': 0,
                        'revenue': 0,
                        'images': [],
                        'stock': 0
                }, response);

                let index = response.image_index;
                if(index >= 0 && index < $('.swiper-wrapper').children().length){
                    swiper.autoplay.stop();
                    swiper.slideTo(index);
                }

                $('.price-show').text(response.price);
                $('.order-show').text(response.order);
                $('.stock-show').text(response.stock);
                $('.revenue-show').text(response.revenue);
            }
        });
    }

    

    $('.btn-check').click(function(e){
        data_click.size = $(this).val();
        chooseProduct(data_click);
    });

    $('.choose-color > div').click(function () { 
        data_click.color = $(this).data('color');
        chooseProduct(data_click);
    });

});