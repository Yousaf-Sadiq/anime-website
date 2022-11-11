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
        Schema::table('anime_setting', function (Blueprint $table) {
            //
            $table->string("anime_category",255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anime_setting', function (Blueprint $table) {
            //
            $table->dropColumn("anime_category");
        });
    }
};
