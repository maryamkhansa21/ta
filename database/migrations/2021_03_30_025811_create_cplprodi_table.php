<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCplprodiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cplprodi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code_id')->unsigned();
            $table->foreign('code_id')->references('id')->on('detailprofillulusan')->onDelete('cascade');
            $table->string('unsur');
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
        Schema::dropIfExists('cplprodi');
    }
}
