<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddedJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('added_jurusan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jurusan_id')->unsigned()->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('from_sekolah')->nullable();
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
        Schema::dropIfExists('added_jurusan');
    }
}
