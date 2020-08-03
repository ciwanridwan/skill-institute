<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('harga');
            $table->string('tipe');
            $table->string('trainer');
            $table->mediumText('deskripsi');
            $table->string('alat_webinar');
            $table->string('publish');
            $table->string('jadwal');
            $table->string('link');
            $table->string('kuota_pendaftaran');
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
        Schema::dropIfExists('webinars');
    }
}
