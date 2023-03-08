start();

function getState(data) { 
    let htmls_state = '';
    
    if(data != '') {
        $.each(data, function(index, value) {
            htmls_state += `<option value="${value.code}" class="state-code">${value.name}</option>`;
        });
    }else {
        htmls_state += `<option value="" class="district-code">No data</option>`;
    }

    $('#state').html(htmls_state);
}

function getDistrict(data, stateCode) {
    let htmls_district = '';
    const districts = data[stateCode ??= ''] ??= '';
    
    if(districts != '') {
        $.each(districts['quan-huyen'], function(index, value){
            htmls_district += `<option value="${value.code}" class="district-code">${value.name}</option>`;
        });
    } else {
        htmls_district = '<option value="" class="district-code">No data</option>';
    }

    $('#district').html(htmls_district);
}

function checkoutValidate() {
    $('.btn-submit').click(function() {
        let data = {
            firstName: $('#billinginfo-firstName').val(),
            lastName: $('#billinginfo-lastName').val(),
            email: $('#billinginfo-email').val(),
            phone: $('#billinginfo-phone').val(),
            address: $('#billinginfo-address').val(),
            country: $('#country').val(),
            state: $('#state').val(),
            zipCode: $('#zip').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            type: "POST",
            url: "/validate-checkout",
            data: data,
            beforeSend: function(){
                $(document).find('span.text-err').html('');
            },
            success: function(response) {
                // alert('Checkout Success!');
                console.log(response.success);
            },
            error: function(response) {
                let errors = response.responseJSON;

                $.each(errors['errors'], function(index, value) {
                    $(`.${index}-err`).text(value[0])
                });
            }
        });
    });
}

function start() {
    $.getJSON("./tree.json", function(data) {
        getState(data);

        // $('#state').change(function () { 
        //     getDistrict(data, $(this).val());
        // });
    });

    checkoutValidate();
}