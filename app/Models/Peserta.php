<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
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
}
