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

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            if (Auth::user()->level == 'dudi') {
        
            Alert::error('Error!!', 'Anda Bukan Siswa')->autoClose(3000);
            return redirect()->to('/data');

            } else if (Auth::user()->level == 'siswa') {
                if (User::has('siswa')) {
                    //validasi dudi jika telah diajukan
                    $dudi = Pengajuan::where('dudi_id', $request->dudi_id)
                            ->where('siswa_id', Auth::user()->siswa->id)->get();
                    $valid = Pengajuan::where('siswa_id', Auth::user()->siswa->id)
                            ->where('status', 'Diajukan')->count();
                    $diterima = Pengajuan::where('siswa_id', Auth::user()->siswa->id)
                            ->where('status', 'Diterima')->count();
                    $addMore = Pengajuan::where('siswa_id', Auth::user()->siswa->id)
                            ->latest()->first();
                    // dd($count);
                    if ($dudi->count() > 0) {
                        Alert::error('Gagal Diajukan', 'Kamu telah mengajukan ke DU/DI ini')->autoClose(3000)->showCloseButton('aria-label');
                        return redirect()->to('/data/siswa/data-application');
                    } else {
                        if ($valid >= 1) {
                            Alert::error('Gagal', 'Kamu harus menunggu sampai pengajuan kamu sebelumnya selesai ditinjau.')->autoClose(4000)->showCloseButton('aria-label');
                            return redirect()->to('/data/siswa/data-application');
                        } else {
                            if ($addMore->period == 'sudah selesai' || $addMore->period == 'ditolak') {
                                Pengajuan::create([
                                    'siswa_id' => Auth::user()->siswa->id,
                                    'dudi_id' => $request->get('dudi_id'),
                                    'status' => 'Diajukan',
                                ]);
                                
                                Alert::success('Berhasil Diajukan', 'Tunggu sampai ada notifikasi penerimaan')->autoClose(2000);
                                return redirect()->to('/data/siswa/data-application');
                            }else{
                                Alert::error('Gagal', 'Kamu masih diterima di tempat DU/DI yang lain!')->autoClose(4000)->showCloseButton('aria-label');
                                return redirect()->to('/data/siswa/data-application');
                            }
                        }
                    }
                }else{
                    return redirect()->to('login');
                }
            } else {
                Alert::error('Who The Fuck Are You?!!', 'Get the fuck out of my system!!');
                return redirect()->to('/');
            }    
        } else {

            Alert::error('Gagal!', 'Anda Harus Login Terlebih Dahulu!')->showCloseButton('aria-label');
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
        $dedudi = Detail_Dudi::where('user_id', Auth::user()->id)->first();
        $dd = $dedudi->dudi->first();
        $dudi = Dudi::where('id', $dd->id)->first();
        $dududu = $request->get('status');

        if ($dududu == 'Diterima') {
            DB::table('daftar')->where('siswa_id', $id)->where('dudi_id', $dd->id)->update([
                'status' => "Diterima"
            ]);
            
        }else if($dududu == 'Ditolak') {
            DB::table('daftar')->where('siswa_id', $id)->where('dudi_id', $dd->id)->update([
                'status' => "Ditolak"
            ]);
        }else{
            DB::table('daftar')->where('siswa_id', $id)->where('dudi_id', $dd->id)->update([
                'status' => "Diajukan"
            ]);
        }

        if ($request->get('status') == 'Ditolak') {
            alert()->info('Ditolak', 'Siswa akan segera mendapatkan notifikasi langsung')->autoClose(2000)->showCloseButton('aria-label');

            $notif = new Notification;
            $notif->siswa_id = $id;
            $notif->dudi_id = $dd->id;
            $notif->isi = 'Maaf, pengajuan kamu ke DU/DI "'.$dudi->detail_dudi->nama_perusahaan.'" <a style="color:red;font-weight:bold;">DITOLAK</a>. Hubungi DU/DI yang bersangkutan untuk informasi lebih lanjut.';
            $notif->save();
            
        }else{
            alert()->success('Berhasil Diterima', 'Siswa akan mendapatkan notifikasi tentang penerimaan segera!')->autoClose(2000)->showCloseButton('aria-label');
            $notif = new Notification;
            $notif->siswa_id = $id;
            $notif->dudi_id = $dd->id;
            $notif->isi = 'Selamat, pengajuan kamu ke DU/DI "'.$dudi->detail_dudi->nama_perusahaan.'" <a style="color:#26ae61;font-weight:bold;">BERHASIL DITERIMA!</a> Hubungi DU/DI yang bersangkutan untuk informasi lebih lanjut.';
            $notif->save();

            $id = Dudi::find($dd->id);
            $jumlah = $id->jumlah;
            $sisa = $jumlah-1;
            $tutupValid = DB::table('dudi')->where('id', $dd->id)->update([
                            'jumlah' => $sisa
                        ]);
            $jj = Dudi::find($dd->id);
            if ($jj->jumlah <= '0') {
                DB::table('dudi')->where('id', $dd->id)->update([
                    'status' => 'Ditutup',
                    'filled' => 'Ya'
                ]);
            }
        }
        
        return redirect()->to('/data/dudi/data-resume');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengajuan::find($id)->delete();

        Alert::toast('Berhasil Dihapus', 'success', 'top-right');
        return back();
    }
}
