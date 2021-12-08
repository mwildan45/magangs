<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Siswa;
use App\User;
use App\Dudi;
use App\Detail_Dudi;
use App\Jurusan;
use App\Pengajuan;
use App\Notification;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $siswa = Siswa::with(['jurusan'])->where('user_id', Auth::user()->id)->first();

            if (User::has('siswa')) {
                if ($siswa) {
                    $datas = Notification::with(['siswa', 'dudi'])
                        ->where('siswa_id', Auth::user()->siswa->id)->orderBy('created_at', 'desc')->paginate(8);
                    $ncount = Notification::with(['siswa', 'dudi'])
                        ->where('siswa_id', Auth::user()->siswa->id)->count();

                    return view('siswa.notification', compact('datas', 'ncount', 'siswa'));
                }else{
                    return redirect()->to('login');
                }
            }else{
                return redirect()->to('login');
            }
        }else{
            Alert::error('Login First', 'Anda harus login terlebih dahulu');
            return redirect()->to('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
