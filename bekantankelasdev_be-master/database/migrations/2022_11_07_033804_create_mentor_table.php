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
        Schema::create('mentor', function (Blueprint $table) {
            $table->id('mentor_id');
            $table->uuid('mentor_uuid')->unique();
            $table->string('mentor_fullname');
            $table->string('mentor_biodata');
            $table->string('mentor_foto')->nullable();
            $table->timestamps();
        });

        Schema::table('mentor', function (Blueprint $table) {
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
        Schema::dropIfExists('mentor');

        Schema::table('mentor', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
