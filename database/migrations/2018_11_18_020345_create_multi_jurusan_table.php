<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultiJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_jurusan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dudi_id');
            $table->foreign('dudi_id')->references('id')->on('dudi')->onDelete('cascade');
            $table->integer('jurusan_id')->unsigned();
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multi_jurusan');
    }
}
