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
            $table->longText('description');
            $table->string('title_one');
            $table->string('subtitle_one');
            $table->string('title_two');
            $table->string('subtitle_two');
            $table->string('title_three');
            $table->string('subtitle_three');
            $table->string('title_four');
            $table->string('subtitle_four');
            $table->string('title_five');
            $table->string('subtitle_five');
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
