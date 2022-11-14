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
        Schema::create('jenis_kelas', function (Blueprint $table) {
            $table->id('jenis_kelas_id');
            $table->uuid('jenis_kelas_uuid')->unique();
            $table->string('jenis_kelas_name');
            $table->string('jenis_kelas_ket')->nullable();
            $table->timestamps();
        });

        Schema::table('jenis_kelas', function (Blueprint $table) {
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
        Schema::dropIfExists('jenis_kelas');

        Schema::table('jenis_kelas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

};
