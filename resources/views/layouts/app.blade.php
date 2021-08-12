<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">

    <title>address ::: user office ::: foodclub</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/default.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="cbc">
    <div class="main">
        @include('layouts.header')

        <div class="center_box cb">
            @include('layouts.nav')
            @yield('content')

            @include('layouts.footer')

        </div>
    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#city').change(function () {
            let url = '/areas/' + $(this).val();
            let area = $("#area");
            if ($(this).val() == 0) {
                area.empty();
            } else {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url,
                    success: function(data){
                        area.find('option').remove();
                        if (Object.keys(data.list).length) {
                            area.attr('disabled', false);
                            area.empty();
                            $.each(data.list, function(index, value) {
                                area.append('<option value="'+value+'">'+index+'</option>')
                            });
                        } else {
                            area.attr('disabled', true);
                        }
                    },
                    error: function(jqXHR,textStatus){
                        alert( "Request failed: " + textStatus);
                    }
                });
            }
        });
        $("#form").click(function () {
            city = $('#city option:selected').text();
            area = $('#area option:selected').text();
            street = $('#street').val();
            house = $('#house').val();
            console.log(house)
            $.getJSON('https://maps.google.com/maps/api/geocode/json?address="Украина,'
                +city+','+area+','+street+''+house+'"&language=ru-RU&sensor=false&key=AIzaSyBdyKrHYLdvcYwJ5vur68y5KvGpxCe8XB4',
                function(data) {
                    console.log(data)
                    coor = data.results[0].geometry.location.lat + ',' + data.results[0].geometry.location.lng;
                    $('#coordinates').val(coor)
                });
        });

    });
    {{--    $(function () {})--}}
    {{--    $.getJSON('http://maps.google.com/maps/api/geocode/json?address=milano&sensor=false',function(data) {--}}
    {{--    var location = data.results[0].geometry.location;--}}
    {{--    // coordinates are location.lat and location.lng--}}
    {{--    });--}}
</script>
</body>

</html>
