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
        Schema::create('role', function (Blueprint $table) {
            $table->id('role_id');
            $table->uuid('role_uuid')->unique();
            $table->string('role_name');
            $table->string('role_keterangan');
            $table->timestamps();
        });

        Schema::table('role', function (Blueprint $table) {
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
        Schema::dropIfExists('role');

        Schema::table('role', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }


};
