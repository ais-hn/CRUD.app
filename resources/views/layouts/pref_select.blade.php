function setCities(prefId) {
    if (!prefId) {
        $("#city_id").empty();
        return;
    }

    var request = $.ajax({
        type: "GET",
        url: "{{ route('pref.select') }}",
        data: {
            "pref_id" : prefId
        }
    });

    request.done(function(responseData) {
        $("#city_id").empty();
        responseData.forEach(function(item, index){
            $("#city_id").append($('<option>').text(item.name).attr('value', item.id));
        });
    });

    request.fail(function(responseData){
        alert(responseData['responseJSON']);
    });
}

$(function() {
    setCities($("#pref_id").val());
});
$("#pref_id").change(function() {
    setCities($("#pref_id").val());
});
