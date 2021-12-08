@extends('layouts.admin')
@section('isi')

@section('admincss')
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@stop
<!-- sidebar -->
@include('admin._sidebar')
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Confirm Menu</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">All Data</a></li>
                                    <li><a href="#">Jurusan</a></li>
                                    <li class="active">Confirm Menu</li>
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
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Tag</th>
                                            <th>Nama Penambah</th>
                                            <th>Asal Sekolah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($datas->where('verify', 'Submit') as $index => $data)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>
                                                {{$data->nama_jurusan}}
                                            </td>
                                            <td>{{$data->tag}}</td>
                                            <td>{{$data->added_jurusan['nama']}}</td>
                                            <td>{{$data->added_jurusan['from_sekolah']}}</td>
                                            <td>
                                                <form action="{{route('jurusan.update', $data->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field('put.js')}}
                                                    <input type="submit" name="accept" value="Accept" class="btn btn-success">
                                                    <input type="submit" name="decline" value="Decline" class="btn btn-danger">     
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                        @endforeach
                                    </tbody>
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
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

@stop