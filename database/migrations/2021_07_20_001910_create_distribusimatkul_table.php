<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusimatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusimatkul', function (Blueprint $table) {
            $table->id();
            $table->string('totalsks');
            $table->string('totaljam');
            $table->bigInteger('dtlmatkul_id')->unsigned();
            $table->foreign('dtlmatkul_id')->references('id')->on('detailmatkul')->onDelete('cascade');
            $table->bigInteger('smt_id')->unsigned();
            $table->foreign('smt_id')->references('id')->on('pembentukanmatkul')->onDelete('cascade');
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
        Schema::dropIfExists('distribusimatkul');
    }
}
