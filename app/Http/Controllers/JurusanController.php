<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Siswa;
use App\User;
use App\Dudi;
use App\Detail_Dudi;
use App\Jurusan;
use App\Added_Jurusan;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Jurusan::where('verify', 'Accept')->get();
        return view('jurusan.index', compact('datas'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query1');
        $query2 = $request->get('query2');
        $idjur = $request->get('jurusan');

        if ($query != "" && $query2 == "") {
            $hasil = Dudi::with(['jurusan', 'detail_dudi'])
                    ->where('judul','like','%'.$query.'%')
                    ->orWhereHas('detail_dudi', function ($q) use ($query) {
                        $q->where('nama_perusahaan', 'like', '%'.$query.'%');
                    })
                    ->whereHas('multi_jurusan', function($e) use ($idjur) {$e->where('jurusan_id', $idjur); })
                    ->where('status', 'Dibuka')
                    ->orderBy('created_at', 'desc')->paginate(8);   
        }else if ($query == "" && $query2 != "") {
            $hasil = Dudi::with(['detail_dudi'])
                    ->where('lokasi', 'like', '%'.$query2.'%')
                    ->whereHas('multi_jurusan', function($e) use ($idjur) {$e->where('jurusan_id', $idjur); })
                    ->where('status', 'Dibuka')
                    ->orderBy('created_at', 'desc')->paginate(8);
        }else{
            $hasil = Dudi::with(['jurusan', 'detail_dudi'])
                    ->where('jurusan_id', $idjur)
                    ->where('judul', 'like', '%'.$query.'%')
                    ->where('lokasi', 'like', '%'.$query2.'%')
                    ->orWhereHas('detail_dudi', function ($q) use ($query) {
                        $q->where('nama_perusahaan', 'like', '%'.$query.'%');
                    })
                    ->where('lokasi', 'like', '%'.$query2.'%')
                    ->whereHas('multi_jurusan', function($e) use ($idjur) {$e->where('jurusan_id', $idjur); })
                    ->where('status', 'Dibuka')
                    ->orderBy('created_at', 'desc')->paginate(8);
        }
        
        $jurusan = Jurusan::get();
        $randata = Dudi::with(['jurusan', 'detail_dudi'])
                    ->orderByRaw('RAND()')->get();

        $rpl = Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 1); })->count();
        $jb =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 3); })->count();
        $ps =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 4); })->count();
        $dkv =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 5); })->count();
        $tphp =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 6); })->count();
        $mm =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 2); })->count();

        return view('result', compact('hasil', 'query', 'query2', 'jurusan', 'randata', 'rpl', 'dkv', 'ps', 'tphp', 'jb', 'mm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurusan = new Jurusan;

        $jurusan->nama_jurusan = $request->get('nama_jurusan');
        $jurusan->tag = $request->get('tag');
        $jurusan->verify = "Submited";
        $jurusan->save();

        Added_Jurusan::insert([
            'jurusan_id' => $jurusan->id,
            'nama' => $request->get('nama'),
            'from_sekolah' => $request->get('sekolah'),
        ]);

        Alert::success('Berhasil Disubmit', 'Tunggu sampai admin memverifikasi jurusan kamu!');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $idj = Jurusan::where('tag', $slug)->first();

        $jurusan = Jurusan::get();
        $datas = Dudi::with(['detail_dudi', 'multi_jurusan'])
                    ->whereHas('multi_jurusan', function($e) use ($idj){
                        $e->where('jurusan_id', $idj->id);
                    })->where('status', 'Dibuka')->where('filled', 'Belum')
                    ->orderBy('created_at', 'desc')->paginate(8);
        $randata = Dudi::with(['jurusan', 'detail_dudi'])
                    ->orderByRaw('RAND()')->get();

        $rpl = Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 1); })->count();
        $jb =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 3); })->count();
        $ps =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 4); })->count();
        $dkv =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 5); })->count();
        $tphp =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 6); })->count();
        $mm =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 2); })->count();

        return view('jurusan.show', compact('datas', 'randata', 'jurusan', 'idj', 'rpl', 'dkv', 'ps', 'tphp', 'jb', 'mm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $jurusan = Jurusan::find($id);

        if ($request->get('accept')) {
            $jurusan->verify = "Accept";
        }else if ($request->get('decline')) {
            $jurusan->verify = "Decline";
        }
        $jurusan->update();

        Alert::success('Success', 'Added Successfull');
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
