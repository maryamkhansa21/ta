<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailprofillulusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailprofillulusan', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('detail');
            $table->bigInteger('profil_id')->unsigned();
            $table->foreign('profil_id')->references('id')->on('profillulusan')->onDelete('cascade');
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
        Schema::dropIfExists('detailprofillulusan');
    }
}
