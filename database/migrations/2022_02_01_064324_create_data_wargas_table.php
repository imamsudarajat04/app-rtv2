<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_wargas', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('nama_kk');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->longText('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('pendidikan');
            $table->string('jenis_pekerjaan');
            $table->string('status_perkawinan');
            $table->string('status_dalam_keluarga');
            $table->string('kewarganegaraan');
            $table->string('foto_kk');
            //Dokumentasi Imigrasi
            $table->string('no_paspor')->nullable();
            $table->string('no_kitas_kitap')->nullable();
            $table->string('foto_paspor')->nullable();
            //Data Orangtua
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->enum('bantuan_pemerintah', ['0', '1'])->default('0');
            $table->enum('disabilitas', ['0', '1'])->default('0');
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
        Schema::dropIfExists('data_wargas');
    }
}
