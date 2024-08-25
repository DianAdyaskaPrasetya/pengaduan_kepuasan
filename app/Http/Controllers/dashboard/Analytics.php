<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengaduan;
use DB;
use App\Models\Post;
use App\Models\tanggapan;

class Analytics extends Controller
{
  public function index()
  {
    $data_chart = pengaduan::orderBy('kategori')->select('kategori')->distinct()
    ->get();
    $posts = post::all();
    $data_tanggapan = tanggapan::orderBy('id','DESC')->select('tanggapans.id','tanggapans.id_pengaduan','pengaduans.tgl_pengaduan','pengaduans.isi_laporan','pengaduans.kategori','pengaduans.sub_kategori','pengaduans.status','users.nama','pengaduans.id_siswa','tanggapans.tanggapan','tanggapans.foto')
    ->join('users','tanggapans.id_admin','=','users.id') ->join('pengaduans','pengaduans.id','=','tanggapans.id_pengaduan') ->get();
    
    

    return view('content.dashboard.dashboards-analytics',compact('data_chart','posts','data_tanggapan'));
  }
  public function store(Request $request){
        
    $this->validate($request, [
        'komentar' => 'required|max:20',
        'id_user' => 'required|max:20',
        
        

    ]);
    

    //create post
    post::create([
        'user_id'         => $request->id_user,
        'body'          => $request->komentar
    ]);

    return redirect()->route('dashboard');
  }
  public function destroy($id)
    {
        post::destroy($id);

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
