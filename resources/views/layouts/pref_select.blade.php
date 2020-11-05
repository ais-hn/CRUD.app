function setCities(prefId) {
    if (!prefId) {
        $("#city_id").empty();
        return;
    }
    var request = $.ajax({
        type: "GET",
        url: "{{ route('pref_select') }}",
        data: {
            "pref_id" : prefId
        }
    });
    request.done(function($cities) {
         //オブジェクトデータをJSON化
        var responseData = JSON.parse($cities);
        $("#city_id").empty();
        responseData.forEach(function(item, index){
            $("#city_id").append($('<option>').text(item.name).attr('value', item.id));
        });
    });
    request.fail(function($cities){
        //JSONをオブジェクトデータの形式に変換
        var json = JSON.stringify($cities);
        JSON.parse(json, function(key, value) {
            if (key == 'error') {
                alert(value);
            }
        });
    });
}

$(function() {
    setCities($("#pref_id").val());
});
$("#pref_id").change(function() {
    setCities($("#pref_id").val());
});
