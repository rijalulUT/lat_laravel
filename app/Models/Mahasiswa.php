<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Mahasiswa extends Model
{  
	// Deklarasi nama table 	
    public $table = "mahasiswa";
     
    // Fungsi untuk membuat data bisa di input secara massal.
      protected $fillable=[
        'nomor',
        'nim',
        'nama'
    ];

    //fungsi untuk membuat default primary key dari model, menjadi primary key yang kita mau
    protected $primaryKey = 'nomor';

   /**
    *Apabila save data menggunakan model, laravel otomatis akan generate data ke dalam table update_at dan created_at 
    * Fungsi dibawah ini untuk menghilangkan fungsi otomatis tersebut
    * namun lebih baik kita membuat kedua tabel diatas
    */
    //public $timestamps = false;
}
