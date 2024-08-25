<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "admin" ) {
           $data_pengaduan = pengaduan::orderBy('id','DESC')->select('pengaduans.id','pengaduans.id_siswa','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','users.nis','users.role')
           ->join('users','pengaduans.id_siswa','=','users.id' ) -> where('users.role','siswa',) -> where ('pengaduans.status','Proses')
           ->get();
        } else {
            $data_pengaduan = pengaduan::orderBy('id','DESC')->select('pengaduans.id','pengaduans.id_siswa','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','users.nis','users.role')
           ->join('users','pengaduans.id_siswa','=','users.id' ) -> where('users.role','siswa',) -> where ('pengaduans.status','Proses') -> where('id_siswa', Auth::user()->id)
           ->get();
        }
         /**
        $data_pengaduan = pengaduan::table('pengaduans')
        ->select('pengaduans.id_pengaduan', 'pengaduans.tgl_pengaduan', 'pengaduans.isi_laporan', 'pengaduans.foto', 'pengaduans.status', 'masyarakats.nama', 'masyarakats.nik', 'masyarakats.telp')
        ->join('masyarakats','pengaduans.id_masyarakat','=','masyarakats.id_masyarakat')->orderBy('id_pengaduan','DESC')->get();

      

        return view('content.pengaduan.view-data-pengaduan',compact('data_pengaduan'));
        
        
        $data_pengaduan = pengaduan::orderBy('id_pengaduan','DESC')->get();
            */
        return view('content.pengaduan.view-data-pengaduan',compact('data_pengaduan'));
    }

    public function create(){
        return view('content.pengaduan.tambah-pengaduan');
    }
    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    /**
     * tambah pengaduan
     */
    public function store(Request $request){   
        $this->validate($request, [
            'id'           => 'required|max:50',
            'tanggal_adu'   => 'required|max:150',
            'isi_laporan'   => 'required|max:100',
            'kategori'      => 'required|max:100',
            'sub_kategori'  => 'required|max:100'
        ]);

        //create post
        pengaduan::create([
            'tgl_pengaduan'         =>$request->tanggal_adu,
            'id_siswa'              =>$request->id,
            'isi_laporan'           =>$request->isi_laporan,
            'kategori'              =>$request->kategori,
            'sub_kategori'          =>$request->sub_kategori,
            'status'                => 'Proses'
        ]);
        
        return redirect()->route('view-data-pengaduan');
    }



    public function show($id){
        $data_pengaduan = pengaduan::orderBy('id','DESC') -> select('pengaduans.id','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','users.nis','users.role')
        ->join('users','pengaduans.id_siswa','=','users.id') -> find($id);

        return view('content.pengaduan.update-pengaduan')->with(compact('data_pengaduan'));
    }
     /**
     * edit pengaduan
     */
    public function edit(Request $request, $id)
    {
        $kategori=$request -> kategori;
        if($kategori == 0){
            $data_pengaduan = pengaduan::find($id);
            $data_pengaduan->tgl_pengaduan  = $request->tgl_pengaduan;
            $data_pengaduan->id_siswa       = $request->id_siswa;
            $data_pengaduan->isi_laporan    = $request->isi_laporan;
        }else{
            $data_pengaduan = pengaduan::find($id);
            $data_pengaduan->tgl_pengaduan  = $request->tgl_pengaduan;
            $data_pengaduan->id_siswa       = $request->id_siswa;
            $data_pengaduan->kategori       = $request->kategori;
            $data_pengaduan->sub_kategori   = $request->sub_kategori;
            $data_pengaduan->isi_laporan    = $request->isi_laporan;
        }
        
        $data_pengaduan->save();


        return redirect()->route('view-data-pengaduan');
    }
     /**
     * cetak
     */
    public function cetak_pdf()
    {
        $data_pengaduan = pengaduan::orderBy('id','DESC')->select('pengaduans.id','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','users.nis','users.role')
        ->join('users','pengaduans.id_siswa','=','users.id' ) -> where('users.role','siswa',)
        ->get();
 
    	$pdf = PDF::loadview('content.pengaduan.cetak_pengaduan',['data_pengaduan'=>$data_pengaduan]);
    	return $pdf->download('laporan-pengaduan.pdf');
    }
     /**
     * hapus pengaduan
     */
    public function destroy($id)
    {
        pengaduan::destroy($id);
        tanggapan::destroy('id_pengaduan','=',$id);
        

        return redirect()->route('view-data-pengaduan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
