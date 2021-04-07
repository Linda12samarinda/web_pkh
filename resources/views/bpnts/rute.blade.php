@extends('layouts.app')

@section('content')

 <div id="panel" class="row">

    <div class="content col-lg-6" style="width: 50%;height: 50%;">
       <div id="map"></div>
   </div>
   <div class="content col-lg-6" style="width: 50%;height: 50%;">
       <div id="detail"></div>
   </div>
</div>

<script>
$(document).ready(function(){

    x = navigator.geolocation;
    x.getCurrentPosition(success, failure)

    function success(position){
    var pos = {
        enableHighAccuracy: true,
        lat: position.coords.latitude,
        lng: position.coords.longitude
    }; 
    var myLat = position.coords.latitude;
    var myLong = position.coords.longitude;
    var coords = new google.maps.LatLng(myLat,myLong);

    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var mapOptions = {
        zoom:9,
        center: coords,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    if (document.location.search == ''){
        //document.location.search = 'lat=-0.589936&&lang=117.170079';
        document.location.search = 'lat='+myLat+'&&lang='+myLong;
    }
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);   
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('detail'));
    @if ($bpnt->distance < 0.9 )
    var start = pos;
    var end = new google.maps.LatLng({{$bpnt->lat}},{{$bpnt->lang}});
    var request = {
        origin: start,
        destination: end,
        travelMode: 'WALKING'
    };
    directionsService.route(request, function(result, status) {
        if (status == 'OK') {
        directionsDisplay.setDirections(result);
        }
    });
    @else
        var start = pos;
        var end = new google.maps.LatLng({{$bpnt->lat}},{{$bpnt->lang}});
        var request = {
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        };
        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
            directionsDisplay.setDirections(result);
            }
        });
    @endif


    }

    function failure(){
        
    }

});
</script>

@endsection
