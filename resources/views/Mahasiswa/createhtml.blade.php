<!DOCTYPE html>
@extends('layout.master')
@section('content')
	{!! Form::open(['url' => 'mahasiswa']) !!}
		<div class="form-group">
		    NIM:
			<input	type = "text" name='nim' class='form-control'>
		</div>

		<div class="form-group">
		    Nama:
			<input	type = "text" name='nama' class='form-control'>
		</div>

		<div class="form-group">
		    Select:
			<select>
				@foreach ($mahasiswas as $mahasiswa)
					<option value = test>{{$mahasiswa->nama}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Submit" class = 'btn btn-primary form-control'>
		</div>
	{!! Form::close() !!}
@stop