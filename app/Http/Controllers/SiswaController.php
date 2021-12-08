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

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nothing
    }
    
    //display data pengajuan for siswa
    public function dataIndex()
    {
        if (Auth::user()) {
            $siswa = Siswa::with(['jurusan'])->where('user_id', Auth::user()->id)->first();
            if (Auth::user()->level == 'siswa') {
                if (User::has('siswa')) {
                    if ($siswa) {
                        $datas = Pengajuan::with(['siswa', 'dudi'])
                            ->where('siswa_id', Auth::user()->siswa->id)->orderBy('created_at', 'desc')->get();
                        $dataSingle = Pengajuan::with(['siswa', 'dudi'])->where('siswa_id', Auth::user()->siswa->id)->latest()->first();
                        $ncount = Notification::with(['siswa', 'dudi'])
                                ->where('siswa_id', Auth::user()->siswa->id)->count();
                        $dateNow = Carbon::now()->format('Y-m-d H-i-s');

                        if ($dataSingle->status == 'Diajukan') {
                            $teksDate = 'diajukan';
                        }else if($dataSingle->status == 'Ditolak'){
                            $teksDate = 'ditolak';
                        }else{
                            $dateNotYetBegin = Pengajuan::where('siswa_id', Auth::user()->siswa->id)->whereHas('dudi', function($e) use($dateNow){
                                                $e->where('date_begin', '>=', $dateNow);
                                            })->first();
                            $dateGoing = Pengajuan::where('siswa_id', Auth::user()->siswa->id)->whereHas('dudi', function($e) use($dateNow){
                                    $e->where('date_begin', '<=', $dateNow)->where('date_end', '>=', $dateNow);
                                })->first();
                            if ($dateGoing) {
                                $teksDate = 'masih berlangsung';
                            }else if($dateNotYetBegin){
                                $teksDate = 'akan dimulai';
                            }else{
                                $teksDate = 'sudah selesai';
                            }
                        }
                        $updateStats = Pengajuan::where('siswa_id', Auth::user()->siswa->id)->where('dudi_id', $dataSingle->dudi_id)->update([
                                'period' => $teksDate,
                            ]);
                        // dd($datas);
                        return view('siswa.data_pengajuan', compact('datas', 'ncount', 'siswa', 'teksDate'));
                    }else{
                        Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000);
                        return redirect()->to('login'); 
                    }
                }else{
                    Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000);
                    return redirect()->to('login');   
                }
            }else{
                Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000);
                return redirect()->to('login');
            }
        }else{
            Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000);
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
        $datas = Siswa::findOrFail($id);
        return view('siswa.detail_siswa', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->level == 'siswa') {
                $ncount = Notification::with(['siswa', 'dudi'])
                            ->where('siswa_id', Auth::user()->siswa->id)->count();
                $siswa = Siswa::with(['jurusan'])->findOrFail($id);
                $jurusans = Jurusan::get();
                return view('siswa.edit', compact('jurusans', 'siswa', 'ncount'));
            }else{
                Alert::error('Gagal !!', 'Anda dilarang melihat halaman ini !')->autoClose(3000);
                return redirect()->to('login'); 
            }
        }else{
            Alert::warning('Login First', 'Anda harus login terlebih dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
            return redirect()->to('login');
        }
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
        
        if($request->file('foto')) {
            $file = $request->file('foto');
            $track = Auth::user()->id;
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).$track.'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('foto')->move("assets/img/users/siswa/", $fileName);
            $foto = $fileName;
        } else {
            $foto = Siswa::where('id', $id)->first()->foto;
        }

        Siswa::find($id)->update([
            'nis' => $request->nis,
            'nama_lengkap' => $request->nama,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'sekolah' => $request->sekolah,
            'jurusan_id' => $request->jurusan_id,
            'kelas' => $request->kelas,
            'no_hp' => $request->no_hp,
            'tentang' => $request->tentang,
            'foto' => $foto,
        ]);

        Alert::toast('Berhasil Diedit', 'success', 'top-right')->autoClose(5000);
        return back();
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
