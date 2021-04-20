@extends('layouts.app')

@section('content')
<style type="text/css">
    .no-padding {
     padding: 0px; 
 }
</style>

<div class="panel panel-primary" style="width: 100%;height: 100%;">
    <div class="panel-heading" style="width: 100%;height: 100%;">@lang('home.maps')</div>

    <div id="panel">
      <div class="content" style="width: 100%;height: 100%; padding-left: 20px;">
      <ul class="nav nav-tabs nav-left flex-column align-items-center border-2" role="tablist">
        <li class="nav-item float-left">
            <a class="nav-link active black" href ="{{url('/home')}}" ><strong>Semua</strong></a>
        </li>
        <li class="nav-item float-left">
            <a class="nav-link black" onclick="set();" id="baseVerticalLeft-tab1" data-toggle="tab" aria-controls="tabVerticalLeft" aria-expanded="true" ><strong>Lokasi Terdekat</strong></a>
        </li>
    </ul>
          <div id="map"></div>
      </div>
    </div>
</div>
<script>

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

        if (document.location.search == ''){
            //document.location.search = 'lat=-0.589936&&lang=117.170079';
            document.location.search = 'lat='+myLat+'&&lang='+myLong;
        }

        var map = new GMaps({
            el: '#map',
            zoom: 15,
            lat: myLat,
            lng: myLong
        });
        map.addMarker({
            lat: myLat,
            lng: myLong
        });

        // var distante = $d_calculator->CalculateDistance(myLat,myLong, -0.589936, 117.170079);

        @foreach($data as $d)
        @if ($d->distance < 9)
            @if (!empty($d->lat)){
                map.addMarker({
                    lat: '{{$d->lat}}',
                    lng: '{{$d->lang}}',
                    title: '{{$d->name}} #',
                    icon: 'img/{{ $d->kategori->icon }}',
                    infoWindow: {
                        content :  "<div style='float:left'><img src='{!! asset($d->foto_rumah) !!}' width='100' height='90px'></div>"+
                                    "<div style='float:right; padding: 10px;'><b>{{$d->name}}</b><br/>{{$d->no_kk}}<br/> {{$d->alamat}},{{$d->rt->kelurahan->name}}<br>{{$d->rt->kelurahan->kecamatan->name}}<br> <a href='{{route('bpnt.directions',[$d->id])}}'>Rute</a>"+
                                    "<br> <span>Radius {{intval($d->distance)}} KM</span></div>"
                    }
                });
            }
            @endif
        @endif
        @endforeach
    }
    function failure(){
        
    }
</script>

@endsection

