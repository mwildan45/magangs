<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dudi;
use App\Siswa;
use App\User;
use App\Jurusan;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::get();
        $dudi = Dudi::where('jumlah', '!=', '0')->where('status', 'Dibuka')->where('filled', 'Belum')->orderBy('created_at', 'desc')->get();
        
        $rpl = Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 1); })->where('status', 'Dibuka')->where('filled', 'Belum')->count();
        $jb =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 3); })->where('status', 'Dibuka')->where('filled', 'Belum')->count();
        $ps =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 4); })->where('status', 'Dibuka')->where('filled', 'Belum')->count();
        $dkv =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 5); })->where('status', 'Dibuka')->where('filled', 'Belum')->count();
        $tphp =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 6); })->where('status', 'Dibuka')->where('filled', 'Belum')->count();


        return view('index', compact('siswa', 'dudi', 'rpl', 'jb', 'ps', 'dkv', 'tphp'));
    }

    public function contact()
    {
        return view('contact');
    }
}
