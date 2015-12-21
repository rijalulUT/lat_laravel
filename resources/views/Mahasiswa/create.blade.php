@extends('layout.master')
@section('content')
{!! Form::open(['url' => 'mahasiswa']) !!}
    <div class="form-group">
        {!! Form::label('NIM', 'NIM:') !!}
        {!! Form::text('nim',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nama', 'Nama:') !!}
        {!! Form::text('nama',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Nama', 'Nama:') !!}   
        {!! Form::select('size', array('S'=>'a'), 'S') !!}
    </div>
    <div class="form-group">
	     <select>
				@foreach ($mahasiswas as $mahasiswa)
					<option value = test>{{$mahasiswa->nama}}</option>
				@endforeach
		</select>
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
@stop




	


