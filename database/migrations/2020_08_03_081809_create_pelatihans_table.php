<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('harga');
            $table->string('tipe');
            $table->string('trainer');
            $table->string('kode_unik_voucher');
            $table->string('kategori');
            $table->string('level');
            $table->string('pengalaman_kerja_peserta');
            $table->string('kemampuan_dasar_peserta');
            $table->string('kemampuan_teknis_peserta');
            $table->mediumText('deskripsi');
            $table->string('alat_training');
            $table->string('bahan_materi');
            $table->string('publish');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihans');
    }
}
