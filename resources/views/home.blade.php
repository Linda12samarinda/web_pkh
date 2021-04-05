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
          <div id="map"></div>
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
</script>

@endsection

