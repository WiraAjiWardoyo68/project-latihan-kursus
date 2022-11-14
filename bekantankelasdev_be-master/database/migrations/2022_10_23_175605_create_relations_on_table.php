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
        Schema::table('pengguna', function (Blueprint $table) {
            // 1. nama kolom foreign,
            // 2. nama kolom primary,
            // 3. nama table primary
            // $table->foreign('pengguna_role')
            //     ->references('role_id')
            //     ->on('role')
            //     ->onDeleteNull();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations_on');
    }
};
