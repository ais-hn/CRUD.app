function setCities(prefId) {
    if (!prefId) {
        $("#city_id").empty();
        return;
    }

    var request = $.ajax({
        type: "GET",
        url: "{{ route('pref.select', ['pref_id' => $pref->id]) }}",
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
}

$(function() {
    setCities($("#pref_id").val());
});
$("#pref_id").change(function() {
    setCities($("#pref_id").val());
});
