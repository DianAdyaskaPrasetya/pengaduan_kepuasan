<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable =  [
        'id','tgl_tanggapan','id_admin','id_pengaduan','tanggapan','foto'
     ];
 
     public function admin()
     {
         return $this->belongsTo(user::class);
     }
     public function pengaduan()
     {
         return $this->belongsTo(pengaduan::class);
     }
}
