
@section('admincss')

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/extra-libs/DataTables/datatables.css')}}">
<style type="text/css">
    td.details-control{
        background: url('{{asset("assets/admin/images/details_open.png")}}') no-repeat;
        background-position: center;
        cursor: pointer;
        padding: 5px;
    }
</style>


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
                                <table id="users-table" class="table table-striped table-bordered table-hover">
                                	<thead>
                                            <tr>
                                                <th>More</th>
                                                <th>Judul</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Lokasi</th>
                                                <th>Kuota</th>
                                                <th>Status</th>
                                                <th>Filled</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
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
            var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("getDudiJson") }}',
            columns: [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                {data: 'judul', name: 'judul'},
                {data: 'detail_dudi.nama_perusahaan', name: 'detail_dudi.nama_perusahaan'},
                {data: 'lokasi', name: 'lokasi'},
                {data: 'jumlah', name: 'jumlah'},
                {data: 'status', name: 'status'},
                {data: 'filled', name: 'filled'},
                {data: 'created_at', name: 'created_at'}
            ],
            order: [[7, 'desc']]
            });

            // Add event listener for opening and closing details
            $('#users-table tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });

            /* Formatting function for row details - modify as you need */
            function format ( d ) {
                // `d` is the original data object for the row
                var id = d.id;
                return '<table class="table">'+
                    '<tr>'+
                        '<td>Deskripsi :</td>'+
                        '<td>'+d.deskripsi+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Jurusan :</td>'+
                        '<td>'+d.multi_jurusan+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Tgl. Dimulai :</td>'+
                        '<td>'+d.date_begin+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Tgl. Berakhir :</td>'+
                        '<td>'+d.date_end+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Lama :</td>'+
                        '<td>'+d.lama+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Nama Instansi : </td>'+
                        '<td>'+d.detail_dudi.nama_perusahaan+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Alamat Utama DU/DI :</td>'+
                        '<td>'+d.detail_dudi.alamat+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Situs DU/DI :</td>'+
                        '<td>'+d.detail_dudi.situs_web+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Deskripsi DU/DI :</td>'+
                        '<td>'+d.detail_dudi.deskripsi+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Action :</td>'+
                        '<td><a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a> <a href="{{route("dudi.show",'+d.id+')}}" class="btn btn-info"><i class="fa fa-eye"></i></a> <a href="#" class="btn btn-warning" title="Block"><i class="fa fa-times-circle"></i></a> '+
                        '</tr>'+
                    '</table>';
            }
        </script>

@stop