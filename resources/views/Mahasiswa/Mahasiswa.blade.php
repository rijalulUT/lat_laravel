<!DOCTYPE html>
<html>
<head>
	<title>Halaman Mahasiswa</title>

</head>
<body>
@extends('layout/master')
@section('isi')
<h1>Halaman Mahasiswa</h1>
 <a href="{{url('/mahasiswa/create')}}" class="btn btn-success">Tambah Mahasiswa</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>NIM</th>
         <th>Nama</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($mahasiswas['body'] as $mahasiswa)
         <tr>
             <td>{{ $mahasiswa['nomor']}}</td>
             <td>{{ $mahasiswa['nim'] }}</td>
             <td>{{ $mahasiswa['nama'] }}</td>
             <td><a href="{{url('mahasiswa/'.$mahasiswa['nomor'])}}" class="btn btn-primary">Lihat</a></td>
             <td><a href="{{route('mahasiswa.edit',$mahasiswa['nomor'])}}" class="btn btn-warning">Ubah</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['mahasiswa.destroy', $mahasiswa['nomor']]]) !!}
             {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection
</body>
</html>
