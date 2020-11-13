<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>顧客管理</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap">
        <link rel="stylesheet" href="https://getbootstrap.jp/docs/4.5/examples/album/album.css">
        <link rel="stylesheet" href="https://getbootstrap.jp/docs/4.5/examples/example.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    </head>
    <body>
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="{{ route('customers.index') }}" class="navbar-brand d-flex align-items-center">
                        <strong>@yield('title')</strong>
                    </a>
                </div>
            </div>
        </header>

        @yield('content')

        <script>
            @yield('javascript')

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
        </script>
    </body>
</html>
