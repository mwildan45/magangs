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
use App\Bookmark;
use App\Notification;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookmarkController extends Controller
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
                    $ncount = Notification::with(['siswa', 'dudi'])
                            ->where('siswa_id', Auth::user()->siswa->id)->count();
                    $datas = Bookmark::with(['siswa', 'dudi'])
                            ->where('siswa_id', Auth::user()->siswa->id)->orderBy('created_at', 'desc')->paginate(5);

                    return view('siswa.bookmark', compact('datas', 'ncount', 'siswa'));
                }else{
                    return redirect()->to('login');
                }
            }else{
                return redirect()->to('login');
            }
        }else{
            Alert::error('Login First', 'Kamu harus login terlebih dahulu');
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
        if (Auth::user()) {
            $user = User::has('siswa')->where('id', Auth::user()->id)->first();
            if ($user) {
                if (Auth::user()->level == 'siswa') {
                $count = Bookmark::where('siswa_id', Auth::user()->siswa->id);
                $valid = Bookmark::where('siswa_id', Auth::user()->siswa->id)->where('dudi_id', $request->dudi_id)->count();

                    if ($count->count() >= 10) {
                        Alert::toast('Kamu hanya bisa membookmark tempat maksimal 10!', 'error', 'top-right')->autoClose(3000);
                        return back();
                    }else{
                        if ($valid > 0) {
                            Alert::toast('Kamu sudah membookmark tempat ini!', 'error', 'top-right')->autoClose(5000);
                            return back();
                        }else{
                            $bm = new Bookmark;
                            $bm->siswa_id = Auth::user()->siswa->id;
                            $bm->dudi_id = $request->get('dudi_id');
                            $bm->save();
                            Alert::success('Disimpan Ke Bookmark', 'Kamu bisa melihat daftar bookmark di menu akun kamu.')->showCloseButton('aria-label')->autoClose(4000);
                            return back();
                        }  
                    }  
                }else if (Auth::user()->level == 'dudi') {
                    Alert::error('Gagal !', 'Fitur ini hanya tersedia untuk siswa.')->autoClose(3000);
                    return back();
                }else{
                    Alert::error('Who The Fuck Are You?!!', 'Get the fuck out of my system!!');
                    return redirect()->to('/');
                }       
            }else{
                Alert::error('Gagal!', 'Kamu Harus Mengisi Data Diri Kamu Terlebih Dahulu!')->showCloseButton('aria-label')->autoClose(4000);
                return redirect()->to('data');
            }
        }else{
            Alert::error('Gagal!', 'Kamu Harus Login Terlebih Dahulu!')->showCloseButton('aria-label');
            return redirect()->to('login');
        }
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
