<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Added_Jurusan extends Model
{
    protected $table = 'Added_Jurusan';

    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }
}
