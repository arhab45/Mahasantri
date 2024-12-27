@extends('adminlte::page')  
@section('tittle', 'Edit Mahasantri')
@section('content_header')
     <h1>Edit Mahasantri</h1>
@stop
@section('content') {{-- isi konten Edit Mahasantri --}}


@php 
$rs1= App\Models\Matakuliah::all();
$rs2= App\Models\Jurusan::all();
$rs3= App\Models\Dosen::all();
@endphp 

@foreach($data AS $d)
<form action="{{ route('mahasantri.update',$d->id) }}" method="POST">
@csrf
@method('put')
{{-- cross-site request forgery (CSRF) = pencegahan serangan yang dilakukan
oleh pengguna yang tidak terautentifikasi --}}
<div class="form-group">
    <label>Nama</label><input type="text" name="nama" value="{{ $d->nama }}" class="form-control"/>
</div>
<div class="form-group">
    <label>Nim</label><input type="text" name="nim" value="{{ $d->nim }}" class="form-control"/>
</div>


<div class="form-group">
<label>Jurusan</label>
<select name="jurusan_id" class="form-control" >
<option value="">-- Pilih Jurusan --</option>
@foreach($rs2 as $jrs)
@php
$sel2 = ($jrs->id == $d->jurusan_id) ? 'selected' : '';
@endphp
<option value="{{ $jrs->id }}"  {{ $sel2 }}>{{ $jrs->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Kuliah</label>
<select name="matakuliah_id" class="form-control" >
<option value="">-- Pilih Mata Muliah --</option>
@foreach($rs1 as $mk)
@php
$sel2 = ($mk->id == $d->jurusan_id) ? 'selected' : '';
@endphp
<option value="{{ $mk->id }}"  {{ $sel2 }}>{{ $mk->nama }}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Dosen</label>
<select class="form-control" name="dosen_id" >
<option value="">-- Pilih Dosen --</option>
@foreach($rs3 as $dp)
@php
$sel3 = ($dp->id == $d->dosen_id) ? 'selected' : '';
@endphp
<option value="{{ $dp->id }}"  {{ $sel3 }}>{{ $dp->nama }}</option>
@endforeach
</select>
</div>

<br/>
<a href="{{ route('mahasantri.index') }}" class="btn btn-primary btn-md" role="button" ><i class="fa fa-arrow-left"> Back</i></a>
<button type="submit" class="btn btn-primary"> Update</button>
</form>
@endforeach
@stop
@section('css')
     <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
     <script> console.log('Hi!'); </script>
@stop