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
        Schema::create('kategori_kelas', function (Blueprint $table) {
            $table->id('kategori_kelas_id');
            $table->uuid('kategori_kelas_uuid')->unique();
            $table->string('kategori_kelas_nama');
            $table->string('kategori_kelas_ket')->nullable();
            $table->timestamps();
        });

        Schema::table('kategori_kelas', function (Blueprint $table) {
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
        Schema::dropIfExists('kategori_kelas');

        Schema::table('kategori_kelas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

};
