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
        Schema::create('anime_setting', function (Blueprint $table) {
            $table->id();
            $table->string("flid");
            $table->string("title",255);
            $table->string("anime_image",255);
            $table->string("season",255);
            $table->string("total_season",255);
            $table->string("anime_description",255);
            $table->string("episodes_status",255);
            $table->string("anime_status",255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_setting');
    }
};
