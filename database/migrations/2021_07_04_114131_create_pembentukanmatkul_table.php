<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembentukanmatkulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembentukanmatkul', function (Blueprint $table) {
            $table->id();
            $table->integer('tk')->nullable();
            $table->integer('totaltk')->nullable();
            $table->integer('alltotaltk')->nullable();
            $table->float('besarsks')->nullable();
            $table->integer('pembulatansks')->nullable();
            $table->string('psikomotorik')->nullable();
            $table->string('jenismatkul')->nullable();
            $table->integer('jam')->nullable();
            $table->string('smt');
            $table->bigInteger('dtlmatkul_id')->unsigned();
            $table->foreign('dtlmatkul_id')->references('id')->on('detailmatkul')->onDelete('cascade');
            $table->bigInteger('bahankajian_id')->unsigned()->nullable();
            $table->foreign('bahankajian_id')->references('id')->on('bahankajian_kajian')->onDelete('cascade');
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
        Schema::dropIfExists('pembentukanmatkul');
    }
}
