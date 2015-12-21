@extends('layout/master')
@section('content')
    <h1>Biodata Mahasiswa</h1>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">Nomor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nomor" placeholder= {{$mahasiswa->nomor}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nim" placeholder={{$mahasiswa->nim}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" placeholder={{$mahasiswa->nama}} readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('mahasiswa')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop
 