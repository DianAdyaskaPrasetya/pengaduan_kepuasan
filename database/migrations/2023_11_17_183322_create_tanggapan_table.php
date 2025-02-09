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
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id('id_tanggapan');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_pengaduan');
            $table->date('tgl_tanggapan');
            $table->text('tanggapan');
            $table->timestamps();
            
            $table->index('id_petugas');
            $table->index('id_pengaduan');
            $table->foreign('id_petugas')->references('id')->on('users');
            $table->foreign('id_pengaduan')->references('id_pengaduan')->on('pengaduans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapans');
    }
};
