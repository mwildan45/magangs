<?php

namespace App;

use App\Jurusan;
use App\Pengajuan;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis', 'nama_lengkap', 'alamat', 'jk', 'sekolah', 'jurusan_id', 'kelas', 'no_hp', 'tentang', 'foto'];
    protected $primaryKey = 'id'; // or null
    public $incrementing = false;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
    public function bookmark()
    {
        return $this->hasMany(Notification::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
