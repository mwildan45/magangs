<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Siswa;
use App\User;
use App\Dudi;
use App\Detail_Dudi;
use App\Jurusan;
use App\Notification;
use App\Photo;
use App\Multi_Jurusan;
use App\Pengajuan;
use Auth;
use DB;
use Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswa = Siswa::with(['jurusan'])->where('user_id', Auth::user()->id)->first();
        $id_dudi = Detail_Dudi::with(['dudi'])->where('user_id', Auth::user()->id)->first();

        $jurusans = Jurusan::get();
        if (Auth::user()) {
            if (User::has('siswa')) {
                
                if ($siswa || $id_dudi) {
                    if(Auth::user()->level == 'siswa'){
                        $ncount = Notification::with(['siswa', 'dudi'])->where('siswa_id', Auth::user()->siswa->id)->count();
                        return view('pendaftaran.index', compact('siswa', 'dudi', 'ncount'));
                    }else{
                        $dudi = Dudi::with(['detail_dudi'])->where('detaildudi_id', $id_dudi->id)->first();
                        $ajukan = Pengajuan::with(['siswa', 'dudi'])->where('dudi_id', $dudi->id)
                                ->where('status', 'Diajukan')->get();
                        $cSubmission = $ajukan->count();
                        return view('pendaftaran.index', compact('siswa', 'dudi', 'cSubmission'));
                    }
                }else{
                    // alert()->success('InfoAlert','Lorem ipsum dolor sit amet.');
                    if (Auth::user()->level == 'dudi') {
                        Alert::success('Silahkan Isi Data DU/DI Anda', 'Setelah mengisi data tempat anda, anda bisa langsung mempostingnya.')->autoClose(5000)->showCloseButton('aria-label');
                    }else{
                        Alert::success('Isi Dahulu', 'Isi dahulu data-data kamu!')->autoClose(2000);
                    }
                    return view('pendaftaran.create', compact('jurusans'));
                }
            }else{
                return redirect()->to('/');
            }
            
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->get('siswa')) {

            $this->validate($request, [
                'nis' => 'required|string|max:15|unique:siswa',
                'nama_lengkap' => 'required|string|max:255',
                'alamat' => 'required|string',
                'jk' => 'required',
                'sekolah' => 'required|string|max:255',
                'jurusan' => 'required',
                'kelas' => 'required',
                'no_hp' => 'required|string|max:15',
                'tentang' => 'required|string',
                'foto' => 'required|mimes:jpg,jpeg,bmp,png',
            ]);

            $siswa = new Siswa;
            $siswa->id = Uuid::generate(4);
            $siswa->nis = $request->get('nis');
            $siswa->nama_lengkap = $request->get('nama_lengkap');
            $siswa->alamat = $request->get('alamat');
            $siswa->jk = $request->get('jk');
            $siswa->sekolah = $request->get('sekolah');
            $siswa->jurusan()->associate($request->get('jurusan'));
            $siswa->kelas = $request->get('kelas');
            $siswa->no_hp = $request->get('no_hp');
            $siswa->tentang = $request->get('tentang');

            if($request->file('foto')) {
            $file = $request->file('foto');
            $track = Auth::user()->id;
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).$track.'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('foto')->move("assets/img/users/siswa/", $fileName);
            $siswa->foto = $fileName;
            } else {
                $siswa = NULL;
            }

            $siswa->user()->associate($request->user());

            $siswa->save();
            alert()->success('Berhasil Daftar.','Selamat Mencari!');

        }else if($request->get('dudi')) {

            $dateNow = Carbon::now();
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
                'nama' => 'required|string|max:225',
                'deskripsi_dudi' => 'required|string|max:225',
                'alamat' => 'required|string|max:225',
                'logo' => 'required|mimes:jpg,jpeg,bmp,png',
                'foto.*' => 'required|mimes:jpg,jpeg,bmp,png|max:1000',
                'foto' => 'max:5',
            ],$msg);

            $dudi = new Dudi;
            $detail = new Detail_Dudi;
            $foto = new Photo;
            $multi = new Multi_Jurusan;
            $id_detail = Uuid::generate(4);
            $id_dudi = Uuid::generate(4);

            //saving data to detail_dudi tables
            $detail->id = $id_detail;
            $detail->user()->associate($request->user());
            $detail->nama_perusahaan = $request->get('nama');
            $detail->deskripsi = $request->get('deskripsi_dudi');
            $detail->alamat = $request->get('alamat');
            $detail->situs_web = $request->get('situs');
            
            //saving the logo in detail_dudi table
            if($request->file('logo')) {
            $file = $request->file('logo');
            $track = Auth::user()->id;
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).$track.'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('logo')->move("assets/img/users/dudi/", $fileName);
            $detail->logo = $fileName;
            } else {
                $detail->logo = NULL;
            }
            $detail->save();

            //saving data to dudi tables
            $dudi->id = $id_dudi;
            $dudi->detaildudi_id = $detail->id;
            $dudi->judul = $request->get('judul');
            $dudi->lokasi = $request->get('lokasi');
            $dudi->deskripsi = $request->get('deskripsi');
            // $dudi->jurusan()->associate($request->get('jurusan'));
            $dudi->jumlah = $request->get('jumlah');
            $dudi->email = $request->get('email');
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

            alert()->success('Berhasil Disubmit!','Anda bisa mengatur akun anda di halaman ini.')->autoClose(5000)->showCloseButton('aria-label');

        }else{
            return view('index');
        }
        
        
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
        $datas = Siswa::findOrFail($id);
        return view('pendaftaran.index', compact('datas'));
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
        $detail = Detail_Dudi::where('id', $id)->first();
        $detail->nama_perusahaan = $request->nama;
        $detail->alamat = $request->alamat;
        $detail->situs_web = $request->situs;
        $detail->deskripsi = $request->deskripsi;
        //saving the logo in detail_dudi table
        if($request->file('logo')) {
            if(file_exists(public_path('assets/img/users/dudi/'. $detail->logo))){
                $dd = unlink(public_path('assets/img/users/dudi/'. $detail->logo));
            }
            // $dd = \File::delete(public_path() . 'assets/img/users/dudi/', $detail->logo); // Delete old flyer
            
            $file = $request->file('logo');
            $track = Auth::user()->id;
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).$track.'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('logo')->move("assets/img/users/dudi/", $fileName);
            $detail->logo = $fileName;
        } else {
            $detail->logo = $detail->logo;
        }
        $detail->update();

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
