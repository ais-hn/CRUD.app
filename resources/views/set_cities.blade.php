function setCities(prefId, cityId) {
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
            if (cityId !== undefined && cityId === item.id) {
                $("#city_id").append($('<option>').text(item.name).attr('value', item.id).prop('selected', true));
            } else {
                $("#city_id").append($('<option>').text(item.name).attr('value', item.id));
            }
        });
    });
}