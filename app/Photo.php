<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'foto';
    public $timestamps = false;

    public function dudi()
    {
    	return $this->belongsTo(Dudi::class);
    }
}
