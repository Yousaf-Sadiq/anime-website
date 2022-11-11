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
        Schema::create('meta_settings', function (Blueprint $table) {
            $table->id();
            $table->string("meta_title");
            $table->string("meta_keywords");
            $table->string("meta_description");
            $table->string("anime_id");
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
        Schema::dropIfExists('meta__settings');
    }
};
