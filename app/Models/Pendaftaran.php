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
}
?>