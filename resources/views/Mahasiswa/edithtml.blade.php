<!DOCTYPE html>
@extends('layout.master')
@section('isi')
	<h1>Update Mahasiswa</h1>
    {!! Form::model($mahasiswa,['route'=>['mahasiswa.update', $mahasiswa->nomor],'method' => 'PATCH']) !!}

		<div class="form-group">
		    NIM:
			<input	type = "text" name='nim' class='form-control' value ={{$mahasiswa->nim}}>
		</div>

		<div class="form-group">
		    Nama:
			<input	type = "text" name='nama' class='form-control' value = {{$mahasiswa->nama}}>
		</div>
		<div class="form-group">
			<input type="submit" value="Update" class = 'btn btn-primary form-control'>
		</div>
	{!! Form::close() !!}
@stop
