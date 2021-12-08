<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nis');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->enum('jk', ['L', 'P']);
            $table->string('sekolah');
            $table->integer('jurusan_id')->unsigned();
            $table->foreign('jurusan_id')->references('id')->on('jurusan');
            $table->string('kelas')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('tentang')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
