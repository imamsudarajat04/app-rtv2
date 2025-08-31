<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerificationFieldsToDataWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_wargas', function (Blueprint $table) {
            // Add verification fields if they don't exist
            if (!Schema::hasColumn('data_wargas', 'verification_notes')) {
                $table->text('verification_notes')->nullable()->comment('Catatan verifikasi dari admin');
            }
            
            if (!Schema::hasColumn('data_wargas', 'verified_at')) {
                $table->timestamp('verified_at')->nullable()->comment('Waktu verifikasi');
            }
            
            if (!Schema::hasColumn('data_wargas', 'verified_by')) {
                $table->unsignedBigInteger('verified_by')->nullable()->comment('ID admin yang memverifikasi');
                $table->foreign('verified_by')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_wargas', function (Blueprint $table) {
            // Drop foreign key first
            if (Schema::hasColumn('data_wargas', 'verified_by')) {
                $table->dropForeign(['verified_by']);
                $table->dropColumn('verified_by');
            }
            
            // Drop other columns
            $table->dropColumn([
                'verification_notes',
                'verified_at'
            ]);
        });
    }
}
