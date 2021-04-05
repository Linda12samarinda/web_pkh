@extends('layouts.app')

@section('content')

 <div id="panel" class="row"></div>

    <div class="content col-lg-6" style="width: 50%;height: 50%;">
       <div id="map"></div>
   </div>
   <div class="content col-lg-6" style="width: 50%;height: 50%;">
       <div id="detail"></div>
   </div>
</div>

<script>
    function tampilDetail(){          
    map_detail = new google.maps.Map(document.getElementById('map'), {
        zoom: default_zoom
    });  
    directionsDisplay = new google.maps.DirectionsRenderer({map: map_detail});
    addMarker(dst_pos, map_detail, '<?=$bpnt->nama?>');    
    infoWindow = new google.maps.InfoWindow;
 if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
                enableHighAccuracy: true,
                lat: position.coords.latitude,
                lng: position.coords.longitude
            }; 
            origin_pos = pos;
            infoWindow.setPosition(pos);
            infoWindow.setPosition(google.maps.Animation.DROP);
            infoWindow.setContent('<center><b>Lokasi Anda</b></center>' + '<center><img src="assets/open-iconic/png/map-marker-3x.png" alt="left"/></center>');
            infoWindow.open(map_detail);
            map_detail.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map_detail.getCenter());
        });
    } else {          
        handleLocationError(false, infoWindow, map_detail.getCenter());
    }
}
function showRoute(){                               
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    directionsDisplay.setMap(map_detail);    
    calculateAndDisplayRoute(directionsService, directionsDisplay);       
    console.log('Route displayed ' + ++routeDisplayed);
}
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
          origin: origin_pos, //Lokasi Pengguna
          destination: dst_pos, //Tujuan
          travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
}  

    
      // var origin_pos = pos; 
    //   var directionsService = new google.maps.DirectionsService();
    //   var directionsDisplay = new google.maps.DirectionsRenderer();
    //   var mapOptions = {
    //     zoom:12,
    //   }
    //   var map = new google.maps.Map(document.getElementById('map'), mapOptions);              
    //   directionsDisplay.setMap(map);
    //   directionsDisplay.setPanel(document.getElementById('detail'));

    //   var start = new google.maps.LatLng(pos)
    //   var end = new google.maps.LatLng({{ $bpnt->lat }},{{ $bpnt->lang }} );
    //   var request = {
    //     origin: start,
    //     destination: end,
    //     travelMode: 'DRIVING'
    //   };
    //   directionsService.route(request, function(result, status) {
    //     if (status == 'OK') {
    //       directionsDisplay.setDirections(result);
    //     }
    //   });     

</script>

@endsection
