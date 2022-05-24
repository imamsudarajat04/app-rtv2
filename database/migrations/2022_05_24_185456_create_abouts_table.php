<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('icon_one')->default('bx bx-receipt');
            $table->string('title_one');
            $table->string('subtitle_one');
            $table->string('icon_two')->default('bx bx-cube-alt');
            $table->string('title_two');
            $table->string('subtitle_two');
            $table->string('icon_three')->default('bx bx-images');
            $table->string('title_three');
            $table->string('subtitle_three');
            $table->string('icon_four')->default('bx bx-shield');
            $table->string('title_four');
            $table->string('subtitle_four');
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
        Schema::dropIfExists('abouts');
    }
}
