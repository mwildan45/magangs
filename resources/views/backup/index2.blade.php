@section('admincss')

<style type="text/css">
    td.details-control{
        background: url('{{asset("assets/admin/dist/js/pages/datatable/details_open.png")}}') no-repeat;
        background-position: center;
        cursor: pointer;
        padding: 5px;
    }
</style>

<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/extra-libs/DataTables/datatables.css')}}">

@stop

@extends('layouts.admin')
@section('isi')

@include('admin._sidebar')

<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class="lastmonth"></div>
                            </div>
                            <div class=""><small>LAST MONTH</small>
                                <h4 class="text-info m-b-0 font-medium">$58,256</h4></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-10">
                                        <span>Wallet Balance</span>
                                        <h4>$3,567.53</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <div style="max-width:130px; height:15px;" class="m-b-40">
                                            <canvas id="balance"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span>Referral Earnings</span>
                                        <h4>$769.08</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="" id="ravenue"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span>Estimated Sales</span>
                                        <h4>5769</h4>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="gaugejs-box">
                                            <canvas id="foo" class="gaugejs" height="50" width="100">guage</canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data All DU/DI</h4>
                                <h6 class="card-subtitle">After the table is initialised, the API is used to build the select inputs through the use of the <code> column().data()</code> method to get the data for each column in turn. The helper methods <code>unique()</code> and <code> sort()</code> are also used to reduce the data for set input to unique and ordered elements. Finally the change event from the select input is used to trigger a column search using the <code>column().search()</code> method.</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="users-table">
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
                
                <!-- ============================================================== -->
                <!-- Notifications, Chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Sales Summery -->
                                <div class="p-t-20">
                                    <div class="row">
                                        <!-- column -->
                                        <div class="col-md-12 col-lg-4">
                                            <ul class="list-style-none notifications m-b-0">
                                                <li class="m-b-40">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-primary m-r-10"><i class="mdi mdi-email-open"></i></button>
                                                        <div>
                                                            <h5 class="m-b-0">You have 3 new messages</h5>
                                                            <span class="text-muted">Daniel, Hannah, Jeffery</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="m-b-40">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-cyan text-white m-r-10"><i class="mdi mdi-rss"></i></button>
                                                        <div>
                                                            <h5 class="m-b-0">Newsfeed Available</h5>
                                                            <span class="text-muted">Breakdancing grandma proves...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="m-b-40">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-orange text-white m-r-10"><i class="mdi mdi-message-processing"></i></button>
                                                        <div>
                                                            <h5 class="m-b-0">15 new comments</h5>
                                                            <span class="text-muted">Jony: hey, this stuff is awesome...</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="m-b-40">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-success m-r-10"><i class="mdi mdi-receipt"></i></button>
                                                        <div>
                                                            <h5 class="m-b-0">2 invoices to pay</h5>
                                                            <span class="text-muted">$3500 - Mark, $4000 - Bianca</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- column -->
                                        <div class="col-md-12 col-lg-8">
                                            <div class="chart1" style="position: relative; height:250px;"></div>
                                            <div class="row m-b-0 m-t-20 text-center">
                                                <!-- col -->
                                                <div class="col-sm-12 col-md-4 m-b-10">
                                                    <span>Wallet Balance</span>
                                                    <h3 class="m-b-0">$3,567.56</h3>
                                                </div>
                                                <!-- col -->
                                                <!-- col -->
                                                <div class="col-sm-12 col-md-4 m-b-10">
                                                    <span>Referral Earnings</span>
                                                    <h3 class="m-b-0">$769.08</h3>
                                                </div>
                                                <!-- col -->
                                                <!-- col -->
                                                <div class="col-sm-12 col-md-4 m-b-10">
                                                    <span>Estimated Sales</span>
                                                    <h3 class="m-b-0">5489</h3>
                                                </div>
                                                <!-- col -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!--     -->
                <!-- ============================================================== -->
                <!-- Email Campaigns -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Email Campaigns</h4>
                                        <h5 class="card-subtitle">Overview of Email Campaigns</h5>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <div class="dl">
                                            <select class="custom-select">
                                                <option value="0" selected>Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-40 m-b-0">
                                    <!-- column -->
                                    <div class="col-sm-12 col-lg-6">
                                        <div id="visitor" style="height:260px; width:100%;" class="m-t-20"></div>
                                    </div>
                                    <!-- column -->
                                    <div class="col-sm-12 col-lg-6">
                                        <span class="display-6 d-block text-info font-medium">45%</span>
                                        <span class="text-muted">Open Ratio for Campaigns</span>
                                        <ul class="list-style-none">
                                            <li class="m-t-20"><i class="fa fa-circle m-r-5 text-info font-12"></i> Open Ratio <span class="float-right">45%</span></li>
                                            <li class="m-t-20"><i class="fa fa-circle m-r-5 text-cyan font-12"></i> Clicked Ratio <span class="float-right">14%</span></li>
                                            <li class="m-t-20"><i class="fa fa-circle m-r-5 text-orange font-12"></i> Un-Open Ratio <span class="float-right">25%</span></li>
                                            <li class="m-t-20"><i class="fa fa-circle m-r-5 text-purple font-12"></i> Bounced Ratio <span class="float-right">17%</span></li>
                                        </ul>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- Products, Profile -->
                <!-- ============================================================== -->
                
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->

        @endsection

        @section('adminjs')
        <script src="{{asset('assets/admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
        
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
                        '<td>Deskripsi : </td>'+
                        '<td>'+d.deskripsi+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Nama Perusahaan/Instansi : </td>'+
                        '<td>'+d.detail_dudi.nama_perusahaan+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Alamat Utama DU/DI : </td>'+
                        '<td>'+d.detail_dudi.alamat+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Situs DU/DI : </td>'+
                        '<td>'+d.detail_dudi.situs_web+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Deskripsi DU/DI : </td>'+
                        '<td>'+d.detail_dudi.deskripsi+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Info Akun : </td>'+
                        '<td>Username : '+d.user.username+'<br>Email Akun : '+d.user.email+'</td>'+
                        '</tr>'+
                    '<tr>'+
                        '<td>Action : </td>'+
                        '<td><a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a> <a href="{{route("dudi.show",'+d.id+')}}" class="btn btn-info"><i class="fa fa-eye"></i></a></td>'+
                        '</tr>'+
                    '</table>';
            }
        </script>


        @stop