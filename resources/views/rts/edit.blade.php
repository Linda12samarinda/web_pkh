@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rt
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rt, ['route' => ['rts.update', $rt->id], 'method' => 'patch']) !!}

                        @include('rts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection