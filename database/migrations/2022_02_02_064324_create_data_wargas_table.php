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
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kategori_usia')
                ->nullable();
            $table->string('jenis_kelamin');
            $table->string('no_telp');
            $table->unsignedBigInteger('religions_id');
            $table->foreign('religions_id')
                ->references('id')
                ->on('religions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_pos');
            $table->longText('alamat_sebelumnya')
                ->nullable();
            $table->longText('alamat');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('pendidikan');
            $table->string('jenis_pekerjaan')
                ->nullable();
            $table->enum('status_perkawinan', ['0', '1', '2', '3']);
            $table->enum('status_dalam_keluarga', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            //Foto KTP dan KK
            $table->string('foto_kk');
            $table->string('foto_ktp')
                ->nullable();
            //Data Orangtua
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->enum('warga_pindahan', ['0', '1'])
                ->default('0');
            $table->enum('bantuan_pemerintah', ['0', '1'])
                ->default('0');
            $table->enum('disabilitas', ['0', '1'])
                ->default('0');
            $table->enum('verification', ['0','1'])
                ->default('0');
            $table->boolean("is_death")
                ->nullable()
                ->default(0);
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
