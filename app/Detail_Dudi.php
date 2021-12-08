<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Dudi extends Model
{
    protected $table = 'detaildudi';
    protected $fillable = ['nama_perusahaan', 'alamat', 'situs_web', 'deskripsi', 'logo'];
    protected $primaryKey = 'id'; // or null
    public $incrementing = false;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function dudi()
    {
    	return $this->hasMany(Dudi::class, 'detaildudi_id', 'id');
    }
}
