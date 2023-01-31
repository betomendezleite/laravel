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
        Schema::create('capitulos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_temporadas_series');
            $table->foreign('id_temporadas_series')->references('id')->on('temporadas');
            $table->unsignedBigInteger('id_thmdb_series');
            $table->foreign('id_thmdb_series')->references('id')->on('series');
            $table->string('url_1080_s');
            $table->string('url_720_s');
            $table->string('url_480_s');
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
        Schema::dropIfExists('capitulos');
    }
};
