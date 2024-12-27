@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
<h1>Data Buku</h1>
<br/>
<a href="{{ route('mahasantri.index') }}" class="btn btn-primary btn-md" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content')

@php
$rs1 = App\Models\Dosen::all();
$rs2 = App\Models\matakuliah::all();
$rs3 = App\Models\Jurusan::all();
@endphp

@foreach($ar_mahasantri as $b)
<form method="POST" action="{{ route('mahasantri.store') }}">
@csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
<br>
<div class="form-group">
<label>Id</label>
<input type="text" name="id" class="form-control" value="{{ $b->id }}" disabled/>
</div>

<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="{{ $b->nama }}" disabled/>
</div>

<div class="form-group">
<label>Nim</label>
<input type="text" name="nim" class="form-control" value="{{ $b->nim }}" disabled/>
</div>

<div class="form-group">
<label>Dosen</label>
<input type="text" name="dosen_id" class="form-control" value="{{ $b->dp }}" disabled/>
</div>

<div class="form-group">
<label>Jurusan</label>
<input type="text" name="jurusan_id" class="form-control" value="{{ $b->jrs }}" disabled/>
</div>



@endforeach 
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop