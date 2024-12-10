<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kecamatan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_prov');
            $table->integer('id_kab');
            $table->string('kode_bps');
            $table->string('nama_bps');
            $table->string('kode_dagri');
            $table->string('kode_dagri2');
            $table->string('nama_dagri');
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
        Schema::dropIfExists('m_kecamatan');
    }
}
