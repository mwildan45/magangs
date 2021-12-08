<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';

    public function dudi()
    {
    	return $this->belongsTo(Dudi::class);
    }
    public function siswa()
    {
    	return $this->belongsTo(Siswa::class);
    }
}
