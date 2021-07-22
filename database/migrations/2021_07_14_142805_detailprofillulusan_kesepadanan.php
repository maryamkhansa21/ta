<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailprofillulusanKesepadanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailprofillulusan_kesepadanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kesepadananku_id')->unsigned();
            $table->foreign('kesepadananku_id')->references('id')->on('kesepadananku')->onDelete('cascade');
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
