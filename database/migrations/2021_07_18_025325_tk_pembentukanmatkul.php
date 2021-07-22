<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TkPembentukanmatkul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('tk_pembentukanmatkul', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pembentukanmatkul_id')->unsigned();
            $table->foreign('pembentukanmatkul_id')->references('id')->on('pembentukanmatkul')->onDelete('cascade');
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
