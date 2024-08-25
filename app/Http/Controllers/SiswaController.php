<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\PDF;


class SiswaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data_siswa = user::where('role','=','siswa')->orderBy('id','DESC')->get();

        return view('content.siswa.view-data-siswa',compact('data_siswa'));
    }

    public function create()
    {
      return view('content.siswa.tambah-siswa');
    }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  /**
   * tambah siswa
   */
  public function store(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required|max:6',
            'nama' => 'required|max:50',
            'kelas' => 'required|max:2',
            'username' => 'required|max:18',
            'password' => 'required|max:255',

        ]);
        
        
        //create post
        user::create([
            'nis'     => $request->nis,
            'nama'     => $request->nama,
            'kelas'     => $request->kelas,
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
            'role'  => 'siswa'
        ]);
        
        return redirect()->route('view-data-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_siswa = user::find($id);

        return view('content.siswa.update-siswa')->with(compact('data_siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     *edit siswa
     */
    public function edit(Request $request, $id)
    {
        if(empty($request->password)){

        $data_siswa = user::find($id);
        $data_siswa->nis           = $request->nis;
        $data_siswa->nama          = $request->nama;
        $data_siswa->kelas         = $request->kelas;
        $data_siswa->username      = $request->username;
       

        $data_siswa->save();

        return redirect()->route('view-data-siswa');
    }else{
        $data_siswa = user::find($id);
        $data_siswa->nis           = $request->nis;
        $data_siswa->nama          = $request->nama;
        $data_siswa->kelas         = $request->kelas;
        $data_siswa->username      = $request->username;
        $data_siswa->password      = Hash::make($request->password);

        $data_siswa->save();

        return redirect()->route('view-data-siswa');
    
    }
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
     * cetak
     */
    public function cetak_pdf()
    {
        $data_siswa = user::where('role','=','siswa')->orderBy('id','DESC')->get();
 
    	$pdf = PDF::loadView('content.siswa.cetak_siswa', ['data_siswa' => $data_siswa]);
         return $pdf->stream('Laporan-Data-Siswa.pdf');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * hapus siswa
     */
    public function destroy($id)
    {
        user::destroy($id);

        return redirect()->route('view-data-siswa')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
