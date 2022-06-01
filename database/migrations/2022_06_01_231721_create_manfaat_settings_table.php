<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManfaatSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manfaat_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('icon_one')->default('bx bxl-dribbble');
            $table->string('title_one');
            $table->text('short_description_one');
            $table->string('icon_two')->default('bx bx-file');
            $table->string('title_two');
            $table->text('short_description_two');
            $table->string('icon_three')->default('bx bx-tachometer');
            $table->string('title_three');
            $table->text('short_description_three');
            $table->string('icon_four')->default('bx bx-layer');
            $table->string('title_four');
            $table->text('short_description_four');
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
        Schema::dropIfExists('manfaat_settings');
    }
}
