<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id');
            $table->date('tgl_pengaduan');
            $table->unsignedBigInteger('id_siswa');
            $table->text('kategori');
            $table->text('sub_kategori');
            $table->text('isi_laporan');
            $table->enum('status',['Proses','Selesai']);
            $table->timestamps();

            $table->index('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(Blueprint $table)
    {
        Schema::dropIfExists('pengaduans');
        $table->dropForeign('pengaduans_id_siswa_foreign');
        $table->dropIndex('pengaduans_id_siswa_index');
        $table->dropColumn('id_siswa');
    }
};
