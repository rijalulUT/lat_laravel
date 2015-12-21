<?php
 
namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
//use Request;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
         // Contoh Query Menggunakan Model
         $mahasiswas= Mahasiswa::all();
         return view('Mahasiswa.Mahasiswa',compact('mahasiswas'));
         
         // Contoh query biasa.
        // $mahasiswas  = DB::select( DB::raw("SELECT * FROM mahasiswa"));
        // return view('Mahasiswa.Mahasiswa',compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {  
       /**
        * Coding dibawah ini hanya uji coba untuk mengambil data pada table, untuk digunakan pada select list
        */

       /**
        *mengambil semua kolom nama pada table mahasiswa
        *mengunakan model
        */
        //$mahasiswas= Mahasiswa::all('nama');

       /**
        *Menggunakan query biasa
        */
        $mahasiswas  = DB::select( DB::raw("SELECT nama FROM mahasiswa"));
        //return view('Mahasiswa.create', compact('mahasiswas'));
        return view('Mahasiswa.createhtml', compact('mahasiswas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
      /** Fungsi Request::all 
        * Berfungsi untuk mengambil semua data pada form inputan
        * Harus deklarasi  use Request 
        * Harus menonaktifkan deklarasi  use Illuminate\Http\Request
        */ 
        //$mahasiswa=Request::all();
      
       /** Fungsi $request->all()
         * Sama Fungsi Request::all  namun menggunakan use Illuminate\Http\Request
         * Harus menonaktifkan deklarasi use Request 
         */ 
        //$mahasiswa = $request->all();

     /**
        * Menyimpan inputan ke table mahasiswa menggunakan model
        * fungsi untuk menyimpan datanya adalah Mahasiswa::create($mahasiswa);
        */
        //Mahasiswa::create($mahasiswa);
        //return redirect('mahasiswa');


       /** Fungsi $request->('nama_form')
         * Mengambil nilai dari inputan yang kita mau
         * Menggunakan use Illuminate\Http\Request
         */
        $nim = $request->input('nim');
        $nama= $request->input('nama');

      /**
        * Menyimpan all data ke table mahasiswa menggunakan model
        * fungsi untuk menyimpan datanya adalah Mahasiswa::create($mahasiswa);
        */
        // $mahasiswa = array(
        //              'nim'=> $nim,
        //              'nama'=>$nama);
        //  Mahasiswa::create($mahasiswa);
        // return redirect('mahasiswa');


        //Query Menggunakan raw query (tidak menggunakan model)
        $mahasiswas = DB::insert(DB::raw("INSERT into mahasiswa (nim, nama) values (:nim, :nama)"), array(
        'nim' => $nim, 'nama' =>$nama 
        ));
        return redirect('mahasiswa');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  

        /**
         * menggunakan select id dari laravel.
         * menggunakan models
         * kelemahan: harus mempunyai kolom Id pada database (namun bisa diperbaiki dengan cara mendeklarasikan primary id pada model)
         */
           $mahasiswa=Mahasiswa::find($id);
           return view('Mahasiswa.show',compact('mahasiswa'));


        /**
         * menggunakan raw query.
         * kelemahan: harus menggunakan foreach, dikarenakan data berupa array
         * tidak menggunakan models
         * bentuk query dibawah ini untuk melindungi dari SQL injection.
         */
        // $mahasiswas = DB::select( DB::raw("SELECT * FROM mahasiswa WHERE nomor = :id"), array(
        // 'id' => $id,
        // )); 

        // foreach ($mahasiswas as $key => $mahasiswa) {
        //     return view('Mahasiswa.show',compact('mahasiswa'));
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
