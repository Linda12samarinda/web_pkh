<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Suami Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_suami', 'Name Suami:') !!}
    {!! Form::text('name_suami', null, ['class' => 'form-control']) !!}
</div>

<!-- No Kk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kk', 'No Kk:') !!}
    {!! Form::text('no_kk', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Ibukandung Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_ibukandung', 'Name Ibukandung:') !!}
    {!! Form::text('name_ibukandung', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rek', 'No Rek:') !!}
    {!! Form::text('no_rek', null, ['class' => 'form-control']) !!}
</div>

<!-- No Kartu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kartu', 'No Kartu:') !!}
    {!! Form::text('no_kartu', null, ['class' => 'form-control']) !!}
</div>

<!-- Kriteria Miskin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kriteria_miskin', 'Kriteria Miskin:') !!}
    {!! Form::text('kriteria_miskin', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Kmp Bpnt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kmp_bpnt', 'Kmp Bpnt:') !!}
    {!! Form::text('kmp_bpnt', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lang', 'Lang:') !!}
    {!! Form::text('lang', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Rumah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto_rumah', 'Foto Rumah:') !!}
    {!! Form::file('foto_rumah', null, ['class' => 'form-control' ,'enctype' => 'multipart/from-data']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Rt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rt_id', 'Rt Id:') !!}
    {!! Form::select('rt_id',$rt,null,["class"=>"form-control","required"]); !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('kategories_id', 'Kategori:') !!}
    {!! Form::select('kategories_id',$kategories,null,["class"=>"form-control","required"]); !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bpnts.index') }}" class="btn btn-default">Cancel</a>
</div>
