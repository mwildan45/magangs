<?php

namespace App;

use App\Siswa;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = ['id', 'nama_jurusan', 'tag'];

    public function siswa()
    {
    	return $this->hasMany(Siswa::class);
    }
    public function dudi()
    {
    	return $this->hasMany(Dudi::class);
    }
    public function multi_jurusan()
    {
        return $this->hasOne(Multi_Jurusan::class);
    }
    public function added_jurusan()
    {
        return $this->hasOne(Added_Jurusan::class);
    }

}
