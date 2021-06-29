<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BahankajianKajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahankajian_kajian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kajian_id')->unsigned();
            $table->foreign('kajian_id')->references('id')->on('kajian')->onDelete('cascade');
            $table->bigInteger('bahankajian_id')->unsigned();
            $table->foreign('bahankajian_id')->references('id')->on('bahankajian')->onDelete('cascade');
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
        Schema::dropIfExists('bahankajian_kajian');
    }
}
