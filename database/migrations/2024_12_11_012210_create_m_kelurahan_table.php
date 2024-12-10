<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_prov');
            $table->integer('id_kab');
            $table->integer('id_kec');
            $table->string('kode_bps');
            $table->string('nama_bps');
            $table->string('kode_dagri');
            $table->string('kode_dagri2');
            $table->string('nama_dagri');
            $table->integer('tipe')->comment('1 = kelurahan', '2 = desa');
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
        Schema::dropIfExists('m_kelurahan');
    }
}
