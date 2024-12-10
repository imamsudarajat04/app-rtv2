<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_provinsi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bps');
            $table->string('nama_bps');
            $table->string('kode_dagri');
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
        Schema::dropIfExists('m_provinsi');
    }
}
