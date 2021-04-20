<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $bpnt->name }}</p>
</div>

<!-- Name Suami Field -->
<div class="form-group">
    {!! Form::label('name_suami', 'Name Suami:') !!}
    <p>{{ $bpnt->name_suami }}</p>
</div>

<!-- No Kk Field -->
<div class="form-group">
    {!! Form::label('no_kk', 'No Kk:') !!}
    <p>{{ $bpnt->no_kk }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $bpnt->alamat }}</p>
</div>

<!-- Name Ibukandung Field -->
<div class="form-group">
    {!! Form::label('name_ibukandung', 'Name Ibukandung:') !!}
    <p>{{ $bpnt->name_ibukandung }}</p>
</div>

<!-- No Rek Field -->
<div class="form-group">
    {!! Form::label('no_rek', 'No Rek:') !!}
    <p>{{ $bpnt->no_rek }}</p>
</div>

<!-- No Kartu Field -->
<div class="form-group">
    {!! Form::label('no_kartu', 'No Kartu:') !!}
    <p>{{ $bpnt->no_kartu }}</p>
</div>

<!-- Kriteria Miskin Field -->
<div class="form-group">
    {!! Form::label('kriteria_miskin', 'Kriteria Miskin:') !!}
    <p>{{ $bpnt->kriteria_miskin }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $bpnt->status }}</p>
</div>

<!-- Kmp Bpnt Field -->
<div class="form-group">
    {!! Form::label('kmp_bpnt', 'Kmp Bpnt:') !!}
    <p>{{ $bpnt->kmp_bpnt }}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{{ $bpnt->lat }}</p>
</div>

<!-- Lang Field -->
<div class="form-group">
    {!! Form::label('lang', 'Lang:') !!}
    <p>{{ $bpnt->lang }}</p>
</div>

<!-- Foto Rumah Field -->
<div class="form-group">
    {!! Form::label('foto_rumah', 'Foto Rumah:') !!}
    <p><img src="{!! asset($bpnt->foto_rumah) !!}" alt=""> </p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $bpnt->keterangan }}</p>
</div>

<!-- Rt Id Field -->
<div class="form-group">
    {!! Form::label('rt_id', 'Rt Id:') !!}
    <p>{{ $bpnt->rt_id }}</p>
</div>

