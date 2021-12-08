<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dudi', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('detaildudi_id');
            $table->foreign('detaildudi_id')->references('id')->on('detaildudi')->onDelete('cascade');
            $table->string('judul');
            $table->string('lokasi');
            $table->string('deskripsi');
            $table->string('jumlah')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('date_begin')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->string('lama')->nullable();
            $table->enum('status', ['Dibuka', 'Ditutup']);
            $table->enum('filled', ['Ya', 'Belum']);
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
        Schema::dropIfExists('dudi');
    }
}
