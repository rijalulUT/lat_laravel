<!DOCTYPE html>
@extends('layout.master')
@section('isi')
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
			<input type="submit" value="Simpan" name = 'simpan' class = 'btn btn-primary'>
            <input type="submit" value="Back" name = 'back' class = 'btn btn-primary'>
		</div>
	{!! Form::close() !!}
@stop
