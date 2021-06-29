<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailprofillulusanKajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailprofillulusan_kajian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kajian_id')->unsigned();
            $table->foreign('kajian_id')->references('id')->on('kajian')->onDelete('cascade');
            $table->bigInteger('detailprofillulusan_id')->unsigned();
            $table->foreign('detailprofillulusan_id')->references('id')->on('detailprofillulusan')->onDelete('cascade');
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
        //
    }
}
