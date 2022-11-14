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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->uuid('kelas_uuid')->unique();
            $table->string('kelas_name',100);
            $table->string('kelas_jumlahpeserta')->nullable();
            $table->foreignuuId('kelas_kategori');
            $table->foreignuuId('kelas_jenis');
            $table->foreignuuId('kelas_level');
            $table->foreignuuId('kelas_mentor');
            $table->string('kelas_browsur');
            $table->string('kelas_harga');
            $table->timestamps();
        });

        Schema::table('kelas', function (Blueprint $table) {
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
        Schema::dropIfExists('kelas');

        Schema::table('kelas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
};
