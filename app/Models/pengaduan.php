<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class pengaduan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable =  [
        'id','tgl_pengaduan','id_siswa','isi_laporan','kategori','sub_kategori','status'
     ];
 
     public function siswa()
     {
         return $this->belongsTo(user::class);
     }

}
