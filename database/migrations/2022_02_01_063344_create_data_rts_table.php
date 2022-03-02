<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_rts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rt');
            $table->string('rw');
            $table->longText('address');
            $table->string('phone');
            $table->string('village');
            $table->string('districts');
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
        Schema::dropIfExists('data_rts');
    }
}
