@extends('layouts.app')

@section('content')
    <div class="page_content bg_gray">
        <div class="uo_header">
            <div class="wrapper cf">
                <div class="wbox ava">
                    <figure><img src="{{ asset('imgc/user_ava_1_140.jpg') }}" alt="Helena Afrassiabi" /></figure>
                </div>
                <div class="main_info">
                    <h1>Helena Afrassiabi</h1>
                    <div class="midbox">
                        <h4>560 points</h4>
                        <div class="info_nav">
                            <a href="#">Get Free Points</a>
                            <span class="sepor"></span>
                            <a href="#">Win iPad</a>
                        </div>
                    </div>
                    <div class="stat">
                        <div class="item">
                            <div class="num">30</div>
                            <div class="title">total orders</div>
                        </div>
                        <div class="item">
                            <div class="num">14</div>
                            <div class="title">total reviews</div>
                        </div>
                        <div class="item">
                            <div class="num">0</div>
                            <div class="title">total gifts</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uo_body">
            <div class="wrapper">
                <div class="uofb cf">
                    <div class="l_col adrs">
                        <h2>Add New Address</h2>

                        <form id="form" action="{{ route('address.store') }}" method="POST">
                            @csrf
                            <div class="field">
                                <label>Name *</label>
                                <input name="name" type="text" value="" palceholder="" class="vl_empty" />
                            </div>
                            <div class="field">
                                <label>Your city *</label>
                                <select name="city_id" class="vl_empty" id="city" required>
                                    <option class="plh"></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" data="{{ $city->name }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Your area *</label>
                                <select name="area_id" id="area">
                                    <option class="plh"></option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Street</label>
                                <input id="street" name="street" type="text" value="" palceholder="" class="vl_empty" />
                            </div>
                            <div class="field">
                                <label>House # </label>
                                <input id="house" name="house" type="text" value="" palceholder="House Name / Number" />
                            </div>

                            <div class="field">
                                <label class="pos_top">Additional information</label>
                                <textarea name="additional"></textarea>
                            </div>
                            <input id="coordinates" type="hidden" name="coordinates" value="">
                            <div class="field">
                                <input id="add" type="submit" value="add address" class="green_btn" />
                            </div>
                        </form>
                    </div>

                    <div class="r_col">
                        <h2>My Addresses</h2>

                        <div class="uo_adr_list">
                            @foreach($addresses as $address)
                                <div class="item">
                                    <h3>{{ $address->name }}</h3>
                                    <p>{{ $address }} </p>
                                    <div class="actbox">
                                        <a href="{{ route('address.destroy', ['id' => $address->id]) }}" class="bcross"></a>
                                    </div>
                                    @include('components.maps', ['coordinates' => $address->coordinates])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
                $.getJSON('https://maps.google.com/maps/api/geocode/json?address="Украина,'
                    +city+','+area+','+street+''+house+'"&language=ru-RU&sensor=false&key=AIzaSyBdyKrHYLdvcYwJ5vur68y5KvGpxCe8XB4',
                    function(data) {
                        coor = data.results[0].geometry.location.lat + ',' + data.results[0].geometry.location.lng;
                        $('#coordinates').val(coor)
                    });
            });

        });
    </script>
@endsection
