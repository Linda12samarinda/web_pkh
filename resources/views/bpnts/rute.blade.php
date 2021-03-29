@extends('layouts.app')

@section('content')

 <div id="panel"></div>

    <div class="content" style="width: 100%;height: 100%;">
       <div id="map"></div>
   </div>
</div>

<script>
  $(document).ready(function() { 

            var latm;
            var lngm

            var directionsService = new google.maps.DirectionsService();
            var directionsDisplay = new google.maps.DirectionsRenderer();
            var mapOptions = {
              zoom:12,
            }

            navigator.geolocation.getCurrentPosition (function (pos)
            {
              var latm = pos.coords.latitude;
              var lngm = pos.coords.longitude;
              /*$("#latmap").val (lat);
              $("#lngmap").val (lng);*/
            });

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);              
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('panel'));

            var start = new google.maps.LatLng( -0.58835,117.16462)
            var end = new google.maps.LatLng({{ $bpnt->lat }},{{ $bpnt->lang }} );
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
   });       

</script>

@endsection
