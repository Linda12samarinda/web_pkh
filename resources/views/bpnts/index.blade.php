@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Bpnts</h1>
        <h1 class="pull-right">
            <a>
              <form class="form-inline ml-3"  action="{{ route('bpnts.index') }}" method="get">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Masukkan Nomer KK" aria-label="Search" name="kk">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <span class="btn btn-primary">Cari</span>
                    </button>
                  </div>
                </div>
              </form>
          </a>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('bpnts.create') }}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('bpnts.table')
            </div>
            <div id="map"></div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

@endsection

