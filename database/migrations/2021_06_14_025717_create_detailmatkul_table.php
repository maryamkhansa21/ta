<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailmatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailmatkul', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matkul_id')->unsigned();
            $table->foreign('matkul_id')->references('id')->on('kajian')->onDelete('cascade');
            $table->text('dtlmatkul');
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
        Schema::dropIfExists('detailmatkul');
    }
}
