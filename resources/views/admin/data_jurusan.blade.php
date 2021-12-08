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
                                                <th>Nama Jurusan</th>
                                                <th>Tag</th>
                                                <th>Nama Penambah</th>
                                                <th>Sekolah</th>
                                                <th>Date Created</th>
                                                <th>Status</th>                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($datas as $data)
                                            <tr>
                                                <td>{{$data->nama_jurusan}}</td>
                                                <td>{{$data->tag}}</td>
                                                <td>{{$data->added_jurusan['nama']}}</td>
                                                <td>{{$data->added_jurusan['from_sekolah']}}</td>
                                                <td>{{$data->created_at}}</td>
                                                <td>{!! ($data->verify == 'Accept') ? '<a href="#" class="btn btn-sm btn-success">' : '<a href="#" class="btn btn-sm btn-danger">' !!}{{$data->verify}}</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Jurusan</th>
                                                <th>Tag</th>
                                                <th>Nama Penambah</th>
                                                <th>Sekolah</th>
                                                <th>Date Created</th>
                                                <th>Status</th> 
                                            </tr>
                                        </tfoot>
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
            "order": [[ 0, "desc" ]]
          });
      } );
  </script>

@stop