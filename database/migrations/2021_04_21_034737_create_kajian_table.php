<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('detail_id')->unsigned();
            $table->foreign('detail_id')->references('id')->on('detailprofillulusan')->onDelete('cascade');
            $table->bigInteger('bahankajian_id')->unsigned();
            $table->foreign('bahankajian_id')->references('id')->on('bahankajian')->onDelete('cascade');
            $table->string('matkul');
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
        Schema::dropIfExists('kajian');
    }
}
