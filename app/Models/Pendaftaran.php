<?php
/*
 *Membuat Custom Model berisi query
 */

// Wajib menggunakan namespace
namespace App\Models;

use DB;
class Pendaftaran{
    public static function DaftarMahasiswa(){
    	$test = DB::select( DB::raw("SELECT * FROM mahasiswa"));
          return $test;
    }

    public static function CreateMahasiswa($nim,$nama){
    	$simpan = DB::insert(DB::raw("INSERT into mahasiswa (nim, nama) values (:nim, :nama)"), array(
	        'nim' => $nim, 'nama' =>$nama 
	        ));


    	return $simpan;
    }
   
    public static function SelectBox(){
    	$select = DB::select( DB::raw("SELECT nama FROM mahasiswa"));

    	return $select;
    }

    public static function LihatMahasiswa($id){
    	$select = DB::select( DB::raw("SELECT * FROM mahasiswa WHERE nomor = :id"), array(
         'id' => $id,
         )); 

    	return $select;
    }

   public static function EditMahasiswa($id,$nim,$nama){
    	$edit = DB::update( DB::raw("UPDATE mahasiswa SET nim= :nim, nama = :nama WHERE nomor = :id"), array(
         'id' => $id,'nim' => $nim, 'nama' => $nama
         )); 
    	return $edit;

   }

}
?>