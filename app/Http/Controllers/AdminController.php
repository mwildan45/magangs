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
use App\Added_Jurusan;
use Auth;
use DB;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->level == 'admin') {
                $datas = Dudi::all();
                return view('admin.index', compact('datas'));
            }else{
                return redirect()->to('/');
            }
        }else{
            Alert::error('Login First', 'Admin Login Here First!');
            return redirect()->to('login');
        }
        
    }

    public function dataDudi()
    {
        if (Auth::user()) {
            if (Auth::user()->level == 'admin') {
                $datas = Dudi::all();
                return view('admin.data_dudi', compact('datas'));
            }else{
                return redirect()->to('/');
            }
        }else{
            Alert::error('Login First', 'Admin Login Here First!');
            return redirect()->to('login');
        }
    }

    public function dataSiswa()
    {
        if (Auth::user()->level == 'admin') {

            $datas = Siswa::all();
            return view('admin.data_siswa', compact('datas'));
        }else{
            return redirect()->to('/');
        }
        
    }

    public function dataJurusan()
    {
        if (Auth::user()->level == 'admin') {
            $datas = Jurusan::with(['added_jurusan'])->get();
            
            return view('admin.data_jurusan', compact('datas'));
        }
    }
    public function dataConfirmJurusan()
    {
        if (Auth::user()->level == 'admin') {
            $datas = Jurusan::with(['added_jurusan'])->get();
            
            return view('admin.confirm_jurusan', compact('datas'));
        }
    }


    //Json section in admin
    public function getDudiJson()
    {
        $datas = Dudi::with(['detail_dudi', 'multi_jurusan', 'jurusan'])->get();
        return Datatables::of($datas)->make();
    }

    public function getSiswaJson()
    {
        $datas = Siswa::with(['jurusan', 'pengajuan'])->get();
        return Datatables::of($datas)->make();
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
