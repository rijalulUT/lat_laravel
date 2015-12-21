<!DOCTYPE html>
@extends('layout.master')
@section('content')
	<h1>Update Mahasiswa</h1>
    {!! Form::model($mahasiswa,['route'=>['mahasiswa.update', $mahasiswa->nomor],'method' => 'PATCH']) !!}

		<div class="form-group">
	        {!! Form::label('NIM', 'NIM:') !!}
	        {!! Form::text('nim',null,['class'=>'form-control']) !!}
    	</div>
	    <div class="form-group">
	        {!! Form::label('Nama', 'Nama:') !!}
	        {!! Form::text('nama',null,['class'=>'form-control']) !!}
	    </div>
		<div class="form-group">
        	{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div>
	{!! Form::close() !!}
@stop