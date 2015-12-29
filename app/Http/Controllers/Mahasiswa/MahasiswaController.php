<?php
 
namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;

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
         // $mahasiswas= Mahasiswa::all();
         // return view('Mahasiswa.Mahasiswa',compact('mahasiswas'));
         
         // Contoh query biasa.
        // $mahasiswas  = DB::select( DB::raw("SELECT * FROM mahasiswa"));
        
        // Contoh memanggil custom model.
         $data = new Pendaftaran;
         //$mahasiswas = $data->DaftarMahasiswa();
         $mahasiswas = $data->DaftarMahasiswaPDO();
         return view('Mahasiswa.Mahasiswa',compact('mahasiswas'));
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
        //$mahasiswas  = DB::select( DB::raw("SELECT nama FROM mahasiswa"));
        //$mahasiswas = Pendaftaran::DaftarMahasiswa();
        //return view('Mahasiswa.create', compact('mahasiswas'));
     
       /**
        * Menggunakan Custom Model (mengambil data untuk select list).
        */ 
        $data = new Pendaftaran;
        $mahasiswas = $data->SelectBox();
        return view('Mahasiswa.createhtml', compact('mahasiswas'));
      
        //return view('Mahasiswa.create');

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
       // $peserta = $request->all();
       // Peserta::create($peserta);

       /** Fungsi $request->('nama_form')
         * Mengambil nilai dari inputan yang kita mau
         * Menggunakan use Illuminate\Http\Request
         */


        $nim = $request->input('nim');
        $nama= $request->input('nama');
        $validator = Validator::make(
            [
                'nim' =>  $nim,
                'nama' => $nama
            ],
            [
                'nim' => 'required',
                'nama' => 'required'
            ]
        );
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
        // $mahasiswas = DB::insert(DB::raw("INSERT into mahasiswa (nim, nama) values (:nim, :nama)"), array(
        // 'nim' => $nim, 'nama' =>$nama 
        // ));

        // $pesertas= DB::insert(DB::raw("INSERT into peserta (nim, nama) values (:nim, :nama)"), array(
        // 'nim' => $nim, 'nama' =>$nama 
        // ));

        // proses validasi
        if ($validator->fails())
        {
           $messages = $validator->messages();
           return $messages;
        }else{
             // Submit handled untuk 2 tombol
             if (Input::get('simpan')){

                // Menggunakan Custom Model untuk menyimpan data. 
                  $data = new Pendaftaran;
                  $mahasiswas = $data->CreateMahasiswa($nim,$nama);
                  return redirect('mahasiswa');

             }elseif (Input::get('daftar')) {

                 return $nama;

             }
        }
       

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
         * menggunakan select id dari lcfirst(str)aravel.
         * menggunakan models
         * kelemahan: harus mempunyai kolom Id pada database (namun bisa diperbaiki dengan cara mendeklarasikan primary id pada model)
         */
           // $mahasiswa=Mahasiswa::find($id);
           // return view('Mahasiswa.show',compact('mahasiswa'));


        /**
         * menggunakan raw query.
         * kelemahan: harus menggunakan foreach, dikarenakan data berupa array
         * tidak menggunakan models
         * bentuk query dibawah ini untuk melindungi dari SQL injection.
         */
        // $mahasiswas = DB::select( DB::raw("SELECT * FROM mahasiswa WHERE nomor = :id"), array(
        // 'id' => $id,
        // )); 
        
      
       /**
         * menggunakan Custom Model.
         * kelemahan: harus menggunakan foreach, dikarenakan data berupa array
         */
        $data = new Pendaftaran;
        $mahasiswas = $data->LihatMahasiswa($id);
        foreach ($mahasiswas as $key => $mahasiswa) {
            return view('Mahasiswa.show',compact('mahasiswa'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa=Mahasiswa::find($id);
        return view('Mahasiswa.edit',compact('mahasiswa'));
        //return $mahasiswa;
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
       $data = new Pendaftaran;
       //$mahasiswaUpdate= Request::all();
       //$mahasiswa= Mahasiswa::find($id);

       $nim = $request->input('nim');
       $nama= $request->input('nama');
       $mahasiswas = $data->EditMahasiswa($id,$nim,$nama);
       //$mahasiswa->update($mahasiswaUpdate);
       return redirect('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  /*
        *Delete menggunakan model eloquent
        */
        // Mahasiswa::find($id)->delete();
        // return redirect('mahasiswa');

        /*
        *Delete menggunakan Custom Model
        */

        $data = new Pendaftaran;
        $mahasiswas = $data->DeleteMahasiswa($id);
       return redirect('mahasiswa');
    }
}
