<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailDudiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('siswa_id');
            $table->string('dudi_id');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('dudi_id')->references('id')->on('dudi')->onDelete('cascade');
            $table->enum('status', ['Diajukan', 'Diterima', 'Ditolak'])->nullable();
            $table->string('period')->nullable();
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
        Schema::dropIfExists('daftar');
    }
}
