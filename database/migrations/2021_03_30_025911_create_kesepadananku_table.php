<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesepadanankuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kesepadananku', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kudikti_id')->unsigned();
            $table->foreign('kudikti_id')->references('id')->on('dashboard')->onDelete('cascade');
            $table->text('kuprodi');
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
        Schema::dropIfExists('kesepadananku');
    }
}
