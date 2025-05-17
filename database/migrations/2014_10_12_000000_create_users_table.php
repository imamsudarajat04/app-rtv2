<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //Khusus name harus diisi dan harus data real
            $table->string('name');
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('no_hp');
            $table->string('password');
            //Khusus RT dan RW wajib diisi untuk menentukan wilayah
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->text('address');
            $table->enum('role', ['superadmin', 'rt', 'rw']);
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
