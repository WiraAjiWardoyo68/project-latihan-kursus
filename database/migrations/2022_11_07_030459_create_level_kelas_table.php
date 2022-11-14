<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_kelas', function (Blueprint $table) {
            $table->id('level_kelas_id');
            $table->uuid('level_kelas_uuid')->unique();
            $table->string('level_kelas_name');
            $table->string('level_kelas_ket')->nullable();
            $table->timestamps();
        });

        Schema::table('level_kelas', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_kelas');

        Schema::table('level_kelas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
