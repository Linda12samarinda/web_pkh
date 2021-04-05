@extends('layouts.app')

@section('content')
<style type="text/css">
    .no-padding {
     padding: 0px; 
 }
</style>

<div class="panel panel-primary" style="width: 100%;height: 100%;">
    <div class="panel-heading" style="width: 100%;height: 100%;">@lang('home.maps')</div>

    <div id="floating-panel">
    <form class="form-horizontal" id="formRute" autocomplete="off">
          <div class="form-group">
            <label class="control-label col-sm-2" >Asal:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="asal" name="asal">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" >Tujuan:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" id="tujuan" name="tujuan">
            </div>
          </div>         
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Rute</button>
            </div>
          </div>
        </form>
    </div>

    <div id="panel" class="row">
      <div class="content col-lg-6 ml-2" style="width: 50%;height: 50%; padding-left: 20px;">
          <div id="map"></div>
      </div>
      <div class="content col-lg-6 " style="width: 50%;height: 50%;">
          <div id="detail"></div>
      </div>
    </div>
</div>

<script>
    var map = new GMaps({
      el: '#map',
      zoom: 15,
      lat: -0.589936,
      lng: 117.170079
  });

    @foreach($data as $d)
    map.addMarker({
        lat: '{{$d->lat}}',
        lng: '{{$d->lang}}',
        title: '{{$d->name}} #',
        icon: 'img/{{$d->kategori->icon}}',
        infoWindow: {
            content :  "<div style='float:left'><img src='{{ asset($d->foto_rumah) }}' width='100' height='90px'></div>"+
                        "<div style='float:right; padding: 10px;'><b>{{$d->name}}</b><br/>{{$d->no_kk}}<br/> {{$d->alamat}},{{$d->rt->kelurahan->name}}<br>{{$d->rt->kelurahan->kecamatan->name}}<br> <a href='{{route('bpnt.directions',[$d->id])}}'>Rute</a> </div>"

        }
    });
    @endforeach

    $(document).ready(function() { 

    $("#formRute").submit(function(e) {

        e.preventDefault();
        //ambil value dari form input asal
        var asal=$("#asal").val();
        //ambil value dari form input tujuan
        var tujuan=$("#tujuan").val();
         //cek apakah asal dan tujuan kosong
         if (asal=="") {
          alert("Tempat asal tidak boleh kosong!");
         }else if (tujuan=="") {
          alert("Tempat tujuan tidak boleh kosong!");
         }else{

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
              zoom:12,
              center: coords,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);   
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('detail'));

            var start = pos;
            var end = new google.maps.LatLng(-0.58835,117.16462);
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

           }

            function failure(){
              
            }

         }

      });

   });
</script>

@endsection

