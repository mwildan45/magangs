<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmark';

    public function siswa()
    {
    	return $this->belongsTo(Siswa::class);
    }
    public function dudi()
    {
    	return $this->belongsTo(Dudi::class);
    }
}
