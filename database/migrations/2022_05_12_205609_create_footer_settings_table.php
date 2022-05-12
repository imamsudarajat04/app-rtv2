<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('telepon1');
            $table->string('telepon2');
            $table->string('email');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('whatsapp');
            $table->string('copyright');
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
        Schema::dropIfExists('footer_settings');
    }
}
