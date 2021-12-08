<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'daftar';
    protected $fillable = ['siswa_id', 'dudi_id', 'status'];


    public function siswa()
    {
    	return $this->belongsTo(Siswa::class);
    }
    public function dudi()
    {
    	return $this->belongsTo(Dudi::class);
    }
}
