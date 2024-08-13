<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('death_data', function (Blueprint $table) {
            $table->id();
            $table->string("no_akte_kematian")
                ->unique();
            $table->string("no_ktp")
                ->unique();
            $table->string("name");
            $table->longText("address");
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
        Schema::dropIfExists('death_data');
    }
}
