@section('admincss')

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/extra-libs/DataTables/datatables.css')}}">

@stop

@extends('layouts.admin')
@section('isi')

@include('admin._sidebar')

 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Show All Jurusan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">All Data</a></li>
                                    <li><a href="#">Jurusan</a></li>
                                    <li class="active">Show All</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama Lengkap</th>
                                                <th>Alamat</th>
                                                <th>J. Kelamin</th>
                                                <th>Sekolah</th>
                                                <th>Jurusan</th>
                                                <th>Kelas</th>
                                                <th>No Hp</th>
                                                <th>Foto</th>
                                                <th>Tentang</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($datas as $data)
                                            <tr>
                                                <td title="{{$data->nis}}">{{str_limit($data->nis,5)}}</td>
                                                <td title="{{$data->nama_lengkap}}">{{str_limit($data->nama_lengkap,15)}}</td>
                                                <td title="{{$data->alamat}}">{{str_limit($data->alamat,25)}}</td>
                                                <td>{{ ($data->jk == 'L') ? 'Laki-laki' : 'Perempuan'}}</td>
                                                <td>{{$data->sekolah}}</td>
                                                <td>{{$data->jurusan->tag}}</td>
                                                <td>{{$data->kelas}}</td>
                                                <td>{{$data->no_hp}}</td>
                                                <td>
                                                    <div class="round-img">
                                                        <img class="rounded-circle" src="{{url('assets/img/users/siswa', $data->foto)}}"></img>
                                                    </div>
                                                </td>
                                                <td>{{str_limit($data->tentang, 30)}}</td>
                                                <td><a href="#" class="btn btn-sm btn-success">Edit</a> <a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Nama Jurusan</th>
                                                <th>Tag</th>
                                                <th>Nama Penambah</th>
                                                <th>Sekolah</th>
                                                <th>Date Created</th>
                                                <th>Status</th> 
                                            </tr>
                                        </tfoot> -->
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('adminjs')

    <script src="{{asset('assets/admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable({
            "order": [[ 1, "desc" ]]
          });
      } );
  </script>

@stop