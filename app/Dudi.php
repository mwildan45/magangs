<?php

namespace App;

use App\Detail_Dudi;
use App\Jurusan;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    protected $table = 'dudi';
    protected $primaryKey = 'id'; // or null
    protected $fillable = ['judul', 'lokasi', 'deskripsi', 'jumlah', 'email', 'date_begin', 'date_end', 'lama', 'status', 'filled'];
    public $incrementing = false;
    protected $dates = ['date_begin', 'date_end'];
    
    public function detail_dudi()
    {
        return $this->belongsTo(Detail_Dudi::class, 'detaildudi_id');
    }
    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }
    public function pengajuan()
    {
        return $this->hasOne(Pengajuan::class);
    }
    public function bookmark()
    {
        return $this->hasOne(Bookmark::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function multi_jurusan()
    {
        return $this->hasMany(Multi_Jurusan::class);
    }
    public function foto()
    {
        return $this->hasMany(Photo::class);
    }
}
