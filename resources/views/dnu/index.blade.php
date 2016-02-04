<!DOCTYPE html>
@extends('layout.master')
@section('isi')
	{!! Form::open(['url' => 'dnu']) !!}
		<div class="form-group">
		    NIM:
			<input	type = "text" name='nim' class='form-control'>
		</div>

		<div class="form-group">
		    Masa:
			<input	type = "text" name='masa' class='form-control'>
		</div>

		<div class="form-group">
			<input type="submit" value="Simpan" name = 'simpan' class = 'btn btn-primary'>
		</div>
	{!! Form::close() !!}

  @if(empty($body))
    {{'Silahkan Masukkan Data'}}
    @else
   {{$header1['kementerian']}}
   <br>
   {{$header1['institusi']}}
   <br>
   {{$header1['alamatinstitusi']}}
   <br>
   <br>
   <br>
   {{$header2['nama']}}
   <br>
   {{$header2['PS']}}
   <br>
   {{$header2['UPBJJ']}}
   <br>
   <br>
   <br>
   {{$body['kodemtk']}}
   <br>
   {{$body['namamtk']}}
   <br>
   {{$body['grade']}}
  @endif
@stop
