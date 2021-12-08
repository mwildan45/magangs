<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmark', function (Blueprint $table) {
            $table->increments('id');
            $table->string('siswa_id')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->string('dudi_id')->nullable();
            $table->foreign('dudi_id')->references('id')->on('dudi')->onDelete('cascade');
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
        Schema::dropIfExists('bookmark');
    }
}
