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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('pengguna_id');
            $table->uuid('pengguna_uuid')->unique();
            $table->string('pengguna_username');
            $table->string('pengguna_nama_lengkap');
            $table->string('pengguna_email');
            $table->string('pengguna_nowa',20)->nullable();
            $table->longText('pengguna_tinggalsekarang');
            $table->string('pengguna_pekerjaan')->nullable();
            $table->string('pengguna_password');
            $table->string('pengguna_foto');
            $table->foreignuuId('pengguna_role');
            $table->timestamps();
        });

        Schema::table('pengguna', function (Blueprint $table) {
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
        Schema::dropIfExists('pengguna');

        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
};
