function completeConfirm(response){
    notScreenRelease = true;
    var buttons = {};
    buttons['キャンセル'] = function(){
        $(this).dialog('close');
        response(false)};

    buttons[ '{{$btn}}' ] = function(){
        $(this).dialog('close');
        response(true)};

    $("#complete-confirm").dialog({
        show: {
            effect: "drop",
            duration: 500
        },
        hide: {
            effect: "drop",
            duration: 500
        },
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: buttons
    });
}
