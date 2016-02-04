<?php
/*
 *Membuat Custom Model berisi query
 */

// Wajib menggunakan namespace
namespace App\Models;

use DB;
use PDO;
class Pendaftaran{

    public static function DaftarMahasiswa(){
    	$test = DB::select( DB::raw("SELECT * FROM mahasiswa"));
        return $test;
     }

     public static function DaftarMahasiswaPDO(){
           /**
            * Query menggunakan PDO
            * pada awal file harus mendeklarasikan use PDO
            * SetAttribute harus memiliki \PDO::ATTR_EMULATE_PREPARES, agar type data yang di return sesuai dengan type data pada database
            */
            $db = new PDO("mysql:host=localhost;dbname=laravel5", "root", "");
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
            $sth = $db->query( "SELECT * FROM mahasiswa");
            if($sth){
                $mahasiswa = $sth->fetchAll(PDO::FETCH_CLASS);
                return $mahasiswa;
            }else{
                 return $db->errorInfo();
            }




     }
     public function DaftarMahasiswaWebService()
     {
       /**
        * Query menggunakan webservice
        */
        $service = file_get_contents('http://localhost/webservice/list.php');
        $select= json_decode($service,true);
      	return $select;
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
    	// $select = DB::select( DB::raw("SELECT * FROM mahasiswa WHERE nomor = :id"), array(
      //    'id' => $id,
      //    ));

      $service = file_get_contents('http://localhost/webservice/show.php?id='.$id);
      $select= json_decode($service,true);
    	return $select;
    }

   public static function EditMahasiswa($id,$nim,$nama){
    	$edit = DB::update( DB::raw("UPDATE mahasiswa SET nim= :nim, nama = :nama WHERE nomor = :id"), array(
         'id' => $id,'nim' => $nim, 'nama' => $nama
         ));
    	return $edit;

   }

    public static function DeleteMahasiswa($id){
    	$delete = DB::delete( DB::raw("DELETE FROM mahasiswa WHERE nomor = :id"), array(
         'id' => $id
         ));
    	return $delete;

   }

}
?>
