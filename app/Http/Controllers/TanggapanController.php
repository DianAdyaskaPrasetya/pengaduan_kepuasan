<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use App\Models\tanggapan;
use App\Models\user;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;


class TanggapanController extends Controller
{
    //
    public function index(){
        if (Auth::user()->role == "admin" ) {
        $data_tanggapan = tanggapan::orderBy('id','DESC')->select('tanggapans.id','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','pengaduans.id_siswa','tanggapans.tanggapan')
        ->join('users','tanggapans.id_admin','=','users.id') ->join('pengaduans','pengaduans.id','=','tanggapans.id_pengaduan') ->get();
        }else{
         $data_tanggapan = tanggapan::orderBy('id','DESC')->select('tanggapans.id','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','pengaduans.id_siswa','tanggapans.tanggapan')
        ->join('users','tanggapans.id_admin','=','users.id') ->join('pengaduans','pengaduans.id','=','tanggapans.id_pengaduan')->get();
        }    
        return view('content.tanggapan.view-data-tanggapan',compact('data_tanggapan'));
    }

    public function create(){

    }
     /**
     * tambah tanggapan
     */
    public function store(Request $request){
        
        $this->validate($request, [
            'tanggapan' => 'required|max:100',
            'id_admin' => 'required|max:20',
            'id_pengaduan' => 'required|max:20',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            
            

        ]);
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'images/tanggapan';
		$file->move($tujuan_upload,$nama_file);

        //create post
        tanggapan::create([
           
            'tanggapan'         => $request->tanggapan,
            'id_admin'          => $request->id_admin,
            'id_pengaduan'      => $request->id_pengaduan,
            'tgl_tanggapan'     => date('Y-m-d'),
            'foto'              => $nama_file,
        ]);
        $data_pengaduan = pengaduan::find($request->id_pengaduan);
        $data_pengaduan->status = 'Selesai';
        
        $data_pengaduan->save();

        return redirect()->route('view-data-pengaduan')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }
    

    public function show($id_pengaduan)
    {

        $data_tanggapan = tanggapan::find($id_pengaduan);

        return view('view-data-pengaduan')->with(compact('data_tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * update tanggapan
     */
    public function edit(Request $request)
    {
        $file = $request->file('file');
       
        if($file==NULL){
        $data_tanggapan = tanggapan::find($request->id_tanggapan);
        $data_tanggapan->tanggapan          = $request->tanggapan;
        }else {
            
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'images/tanggapan';
            $file->move($tujuan_upload,$nama_file);
            
        $data_tanggapan = tanggapan::find($request->id_tanggapan);
        $data_tanggapan->tanggapan          = $request->tanggapan;
        $data_tanggapan->foto               = $nama_file;
        }
        
        $data_tanggapan->save();
        return redirect()->route('view-data-tanggapan')->with(['success' => 'Data Berhasil Diedit!']);
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
    public function cetak_pdf()
    {
        $data_tanggapan = tanggapan::orderBy('id','DESC')->select('tanggapans.id','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','pengaduans.id_siswa','tanggapans.tanggapan')
        ->join('users','tanggapans.id_admin','=','users.id') ->join('pengaduans','pengaduans.id','=','tanggapans.id_pengaduan') ->get();
 
    	$pdf = PDF::loadview('content.tanggapan.cetak_tanggapan',['data_tanggapan'=>$data_tanggapan]);
    	return $pdf->download('laporan-tanggapan.pdf');
    }    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        function store($id){
        $data_pengaduan = pengaduan::where('id','=' ,tanggapan::find($id)->get('id_pengaduan')->select('id_pengaduan'));
        $data_pengaduan->status = 'Proses';
        
        $data_pengaduan->save();
        }
        
        tanggapan::destroy($id);
        
        return redirect()->route('view-data-tanggapan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
