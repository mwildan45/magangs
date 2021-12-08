<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multi_Jurusan extends Model
{
    protected $table = 'multi_jurusan';
    public $timestamps = false;

    public function dudi()
    {
    	return $this->belongsTo(Dudi::class);
    }
    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }
}
