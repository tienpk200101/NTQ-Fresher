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

function start() {
    $.getJSON("./tree.json", function(data) {
        getState(data);

        // $('#state').change(function () { 
        //     getDistrict(data, $(this).val());
        // });
    });
}

start()