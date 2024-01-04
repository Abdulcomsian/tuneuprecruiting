saveRating = function(element, applyId) {
    let element_value = dom_el(`.rating-value-${element}`).value;
    var baseUrl = $('#base-url').val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var formData = {
        rating: element_value,
        applyId: applyId,
        _token: csrfToken
    }
    console.log(formData);
    $.ajax({
        type: "POST",
        url: baseUrl+"/apply/rating",
        data: formData,
        dataType: "json",
        success: function(response){

        },
        error: function(error){
            // Handle errors here
            console.log(error);
        }
    });
}
