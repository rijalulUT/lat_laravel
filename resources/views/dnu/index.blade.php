<!DOCTYPE html>
@extends('layout.master')
@section('isi')
	{!! Form::open(['url' => 'dnu','method'=>'POST']) !!}
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

  @if(empty($dnu))
    {{'Silahkan Masukkan Data'}}
  @else
	 @foreach($dnu['header1'] as $key => $header1)
	 {{$header1['kementerian']}}
	 <br>
	 {{$header1['institusi']}}
	 <br>
	 {{$header1['alamatinstitusi']}}
	 @endforeach
   <br>
   <br>
   <br>
	 @foreach($dnu['header2'] as $key => $header2)
	 {{$header2['nama']}}
   <br>
   {{$header2['PS']}}
   <br>
   {{$header2['UPBJJ']}}
	 @endforeach
   <br>
   <br>
   <br>
	 @foreach($dnu['body'] as $key => $body)
	 {{$body['kodemtk']}}
	 <br>
	 {{$body['namamtk']}}
	 <br>
	 {{$body['grade']}}
	 @endforeach

  @endif
@stop
