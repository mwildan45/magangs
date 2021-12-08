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
use App\Photo;
use App\Multi_Jurusan;
use Auth;
use DB;
use Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateNow = Carbon::now()->format('Y-m-d H-i-s');
        $jurusan =  Jurusan::get();
        $randata = Dudi::with(['jurusan', 'detail_dudi'])
                    ->orderByRaw('RAND()')->get();
        $datas = Dudi::with(['detail_dudi', 'multi_jurusan', 'jurusan'])
                    ->where('status', 'Dibuka')->where('filled', 'Belum')
                    ->where('date_begin', '>', $dateNow)
                    ->orderBy('created_at', 'desc')->paginate(8);

        $rpl = Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 1); })->count();
        $jb =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 3); })->count();
        $ps =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 4); })->count();
        $dkv =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 5); })->count();
        $tphp =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 6); })->count();
        $mm =  Dudi::whereHas('multi_jurusan', function($e){ $e->where('jurusan_id', 2); })->count();

        return view('browse', compact('datas', 'randata', 'jurusan', 'rpl', 'dkv', 'ps', 'tphp', 'jb', 'mm'));
    }

    public function showIndex($id)
    {
        $data = Dudi::with(['detail_dudi'])->findOrFail($id);
        $data_dudi = Dudi::with(['detail_dudi'])->where('detaildudi_id', $data->detaildudi_id)->count();
        $count_apply = Pengajuan::with(['dudi', 'siswa'])->whereHas('dudi', function($e) use($data){
                            $e->where('detaildudi_id', $data->detaildudi_id);
                        })->select('siswa');
        $count_siswa = $count_apply->where('status', 'Diterima')->count();
        $pengajuan = Pengajuan::with(['dudi', 'siswa'])->where('dudi_id', $id)->where('status', 'Diterima')->get();

        return view('dudi.index', compact('data', 'pengajuan', 'data_dudi', 'count_siswa', 'count_apply'));
    }

    //data resume/pengajuan
    public function dataResume()
    {
        if (Auth::user()) {
            $session = Detail_Dudi::where('user_id', Auth::user()->id)->first();
            if (User::has('detail_dudi')) {
                if ($session) {
                    if (Auth::user()->level == 'dudi') {
                        $dd = $session->dudi->first();
                        
                        $dudi = Dudi::where('id', $dd->id)->first();
                        
                        $ajukan = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dd->id)
                                    ->where('status', 'Diajukan')->get();
                        $cSubmission = $ajukan->count();
                        $terima = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dd->id)
                                    ->where('status', 'Diterima')->get();
                        $tolak = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dd->id)
                                    ->where('status', 'Ditolak')->get();
                        $totalQuota = $dudi->jumlah + $ajukan->count() + $terima->count() + $tolak->count();

                        return view('dudi.data_resume', compact('ajukan', 'terima', 'tolak', 'dudi', 'cSubmission', 'totalQuota'));
                    }else{
                        Alert::error('Gagal !!', 'Anda dilarang melihat halaman ini !')->autoClose(3000);
                        return redirect()->to('login');
                    }
                }else{
                    Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
                    return redirect()->to('login');
                }
            }else{
                Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
                return redirect()->to('login');
            }
        }else{
            Alert::warning('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
            return redirect()->to('login');
        }
    }

    //page that displaying all application made by siswa
    public function dataApply($id)
    {
        if (Auth::user()) {
            if (Auth::user()->level == 'dudi') {
                $dudi = Dudi::where('id', $id)->first();
                $siswa = Pengajuan::where('dudi_id', $id)->get();
                return view('dudi.data_siswa', compact('dudi', 'siswa'));
            }else{
                Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
                return redirect()->to('login');
            }
        }else{
            Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
            return redirect()->to('login');
        }
    }
    //function for displaying list of all application
    public function dataListApply()
    {
        if (Auth::user()) {
            if (Auth::user()->level == 'dudi') {
                $user = Detail_Dudi::where('user_id', Auth::user()->id)->first();
                $dudi = Dudi::where('detaildudi_id', $user->id)->first();
                $dudiall = Dudi::where('detaildudi_id', $user->id)->paginate(3);
                $apply = Pengajuan::with(['dudi'])->whereHas('dudi', function($e) use ($user) {
                            $e->where('detaildudi_id', $user->id);
                        })->get();
                $ajukan = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dudi->id)
                        ->where('status', 'Diajukan')->get();
                $cSubmission = $ajukan->count();

                return view('dudi.list_dudi', compact('dudiall', 'apply', 'dudi', 'cSubmission'));
            }else{
                Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
                return redirect()->to('login');
            }
        }else{
            Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
            return redirect()->to('login');
        }
    }

    //edit account page
    public function dataAccount()
    {
        if (Auth::user()) {
            if (Auth::user()->level == 'dudi') {
                $user = Detail_Dudi::where('user_id', Auth::user()->id)->first();
                $dudi = Dudi::where('detaildudi_id', $user->id)->first();
                $ajukan = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dudi->id)
                        ->where('status', 'Diajukan')->get();
                $cSubmission = $ajukan->count();
                
                return view('dudi.account_dudi', compact('dudi', 'dudiall', 'apply', 'cSubmission'));
            }else{
                Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
                return redirect()->to('login');
            }
        }else{
            Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
            return redirect()->to('login');
        }
    }

    public function search(Request $request)
    {
        $dateNow = Carbon::now()->format('Y-m-d H-i-s');
        $query = $request->get('query1');
        $query2 = $request->get('query2');

        if ($query != "" && $query2 == "") {
            $hasil = Dudi::with(['jurusan', 'detail_dudi'])
                    ->where('judul','like','%'.$query.'%')
                    ->where('date_begin', '>', $dateNow)
                    ->where('status', 'Dibuka')->where('filled', 'Belum')
                    ->orWhereHas('detail_dudi', function ($q) use ($query) {
                        $q->where('nama_perusahaan', 'like', '%'.$query.'%');
                    })
                    ->where('date_begin', '>', $dateNow)
                    ->where('status', 'Dibuka')->where('filled', 'Belum')
                    ->orderBy('created_at', 'desc')->paginate(8);   
        }else if ($query == "" && $query2 != "") {
            $hasil = Dudi::with(['jurusan', 'detail_dudi'])
                    ->where('lokasi', 'like', '%'.$query2.'%')
                    ->where('date_begin', '>', $dateNow)
                    ->where('status', 'Dibuka')
                    ->orderBy('created_at', 'desc')->paginate(8);
        }else{
            $hasil = Dudi::with(['jurusan', 'detail_dudi'])
                    ->where('judul', 'like', '%'.$query.'%')
                    ->where('lokasi', 'like', '%'.$query2.'%')
                    ->where('date_begin', '>', $dateNow)
                    ->where('status', 'Dibuka')->where('filled', 'Belum')
                    ->orWhereHas('detail_dudi', function ($q) use ($query) {
                        $q->where('nama_perusahaan', 'like', '%'.$query.'%');
                    })
                    ->where('lokasi', 'like', '%'.$query2.'%')
                    ->where('date_begin', '>', $dateNow)
                    ->where('status', 'Dibuka')->where('filled', 'Belum')
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
        if (Auth::user()) {
            if (Auth::user()->level == 'dudi') {
                $user = Detail_Dudi::where('user_id', Auth::user()->id)->first();
                $dudi = Dudi::where('detaildudi_id', $user->id)->first();
                $jurusans = Jurusan::all();
                if ($dudi->status == 'Ditutup' && $dudi->filled == 'Ya') {
                    return view('dudi.create', compact('dudi', 'jurusans'));
                }else{
                    Alert::error('Gagal', 'Anda masih punya pendaftaran yang belum ditutup dan belum terpenuhi!')->autoClose(3000)->showCloseButton('aria-label');
                    return redirect()->to('data');
                }    
            }else{
                Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
                return redirect()->to('login');
            }
        }else{
            Alert::error('Login dahulu', 'Anda harus login dahulu untuk melihat halaman ini')->autoClose(3000)->showCloseButton('aria-label');
            return redirect()->to('login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form validation
        $msg = [
                "foto.max" => "Foto tidak boleh lebih dari 5."
            ];

        $this->validate($request, [
            'judul' => 'required|string|max:225',
            'lokasi' => 'required|string|max:225',
            'deskripsi' => 'required',
            'jurusan' => 'required',
            'jumlah' => 'required',
            'email' => 'required',
            'date_begin' => 'required|date_format:Y-m-d|after:today',
            'date_end' => 'required|date_format:Y-m-d|after:date_begin',
            'foto.*' => 'mimes:jpg,jpeg,bmp,png|max:5000',
            'foto' => 'max:5',
        ],$msg);

        $dudi_id = Detail_Dudi::where('user_id', Auth::user()->id)->first();
        $dudi = new Dudi;
        $dudi->id = Uuid::generate(4);
        $dudi->detaildudi_id = $dudi_id->id;
        $dudi->judul = $request->judul;
        $dudi->lokasi = $request->lokasi;
        $dudi->deskripsi = $request->deskripsi;
        $dudi->jumlah = $request->jumlah;
        $dudi->email = $request->email;
        //date feature of application dudi
        $dateIni = $request->get('date_begin');
        $dateFin = $request->get('date_end');
        // Get year and month of initial date (From)
        $yearIni = date("Y", strtotime($dateIni));
        $monthIni = date("m", strtotime($dateIni));
        // Get year an month of finish date (To)
        $yearFin = date("Y", strtotime($dateFin));
        $monthFin = date("m", strtotime($dateFin));
        // Checking if both dates are some year
        if ($yearIni == $yearFin) {
           $numberOfMonths = ($monthFin-$monthIni) + 1;
        } else {
           $numberOfMonths = ((($yearFin - $yearIni) * 12) - $monthIni) + 1 + $monthFin;
        }

        $dudi->date_begin = $dateIni;
        $dudi->date_end = $dateFin;
        $dudi->lama = $numberOfMonths;

        if ($request->get('status') == 'Dibuka') {
            $dudi->status = 'Dibuka';
        }else{
            $dudi->status = 'Ditutup';
        }
        $dudi->filled = 'Belum';

        $dudi->save();

        //multi jurusan
        $injur = $request->get('jurusan');
        $dudi_id = $dudi->id;
        for ($i=0; $i < count($injur); $i++) { 
            Multi_Jurusan::insert([
                'dudi_id' => $dudi_id,
                'jurusan_id' => $injur[$i],
            ]);
        }

        //saving the foto to foto table
        $fotos = $request->all();
        $images = array();
        if($files = $request->file('foto')){
            foreach($files as $file){
                $idf = Auth::user()->id;
                $dtf = Carbon::now();
                $namef = $file->getClientOriginalName();
                $fileNamef = rand(11111,99999).$idf.'-'.$dtf->format('Y-m-d-H-i-s').'.'.$namef;
                $file->move("assets/img/users/dudi/foto", $fileNamef);
                $images[] = $fileNamef;
            }
        }
        
        /*Insert your data*/
        Photo::insert( [
            'dudi_id' => $dudi->id,
            'foto' =>  implode("|",$images),
        ]);

        alert()->success('Berhasil Dibuat!','Anda bisa mengatur pendaftaran yang baru anda buat di halaman ini.')->autoClose(5000)->showCloseButton('aria-label');

        return redirect()->to('data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Dudi::with(['jurusan', 'detail_dudi', 'multi_jurusan'])->findOrFail($id);
        $fotos = Photo::where('dudi_id', $id)->first();
        $lains = Dudi::with(['multi_jurusan', 'jurusan', 'detail_dudi'])
                ->where('id' ,'!=' , $id)->where('status', 'Dibuka')->where('filled', 'Ya')
                ->orderByRaw('RAND()')->get();

        if (Auth::user()) {
            if (Auth::user()->level == 'siswa') {
                $jur = User::whereHas('siswa', function($e){
                        $e->where('user_id', Auth::user()->id);
                    })->first();
                if ($jur) {
                    $siswajur = $jur->siswa->jurusan_id;
                }else{
                    $siswajur = 0;
                }
            }    
        }

        return view('dudi.show', compact('lains', 'fotos', 'siswajur', 'jur'))->withDatas($datas);
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
            if (Auth::user()->level == 'dudi') {
                $dudi = Dudi::with(['jurusan', 'detail_dudi'])->findOrFail($id);
                $jurusans = Jurusan::get();
                $ajukan = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dudi->id)
                        ->where('status', 'Diajukan')->get();
                $cSubmission = $ajukan->count();

                return view('dudi.edit', compact('jurusans', 'dudi', 'cSubmission'));
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

    //update data pendaftaran dudi
    public function update(Request $request, $id)
    {
        if ($request->get('status') == 'Dibuka') {
            $tt = 'Dibuka';
            $dd = Dudi::find($id)->update([
                'judul' => $request->get('judul'),
                'lokasi' => $request->get('lokasi'),
                'deskripsi' => $request->get('deskripsi'),
                'jumlah' => $request->get('jumlah'),
                'email' => $request->get('email'),
                'status' => $tt,
            ]);
        }else{
            $tt = 'Ditutup';
            $dd = Dudi::find($id)->update([
                'judul' => $request->get('judul'),
                'lokasi' => $request->get('lokasi'),
                'deskripsi' => $request->get('deskripsi'),
                'jumlah' => $request->get('jumlah'),
                'email' => $request->get('email'),
                'status' => $tt,
            ]);
        }

        $mj = Multi_Jurusan::where('dudi_id', $id)->get();
        $getmj = $request->get('jurusan_id');
        $getid = $request->get('id');

        foreach($mj as $prod){
            $key = array_search($prod->id, $getid);
            $prod->jurusan_id = $getmj[$key];
            $prod->save();
        }

        // dd($dd);
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
