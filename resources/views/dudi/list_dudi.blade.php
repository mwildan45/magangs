@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>List of Application</h3>
</div>
</div>
</div>
</div>
</div>

<div class="section">
<div class="container">
<div class="row">
@include('dudi._sidebar')
<div class="col-lg-8 col-md-12 col-xs-12">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="job-alerts-item">

<h3 class="alerts-title" style="text-align: center;">Daftar Formulir Pendaftaran yang Telah Dibuat</h3>
@foreach($dudiall as $data)
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb" src="assets/img/jobs/avatar-1.png" alt=""></a>
<div class="manager-info">
<div class="manager-name">
<h4><a href="#">{{$data->judul}}</a></h4>
<h5>Tgl. posting: {{$data->created_at->format('d M Y')}}</h5>
</div>
<div class="manager-meta">
<span class="location"><i class="lni-map-marker"></i> {{$data->lokasi}}</span>
<span class="rate"><i class="ti-time"></i> Status: {!! ($data->status == 'Dibuka') ? '<a style="color:green;font-weight: bold;">Dibuka</a>' : '<a style="color: red;font-weight: bold;">Ditutup</a>' !!}</span>
</div>
</div>
</div>
<div class="item-body">
<div class="content">
<div class="row">
    <div class="col-lg-6">
        <p style="font-weight: bold;">Tanggal Mulai Magang: <font color="red">{{$data->date_begin->format('d M Y')}}</font></p>
        <p style="font-weight: bold;">Tanggal Selesai Magang: <font color="red">{{$data->date_end->format('d M Y')}}</font></p>
    </div>
    <div class="col-lg-6">
        <p style="text-align: right;font-weight: bold;">Lama Magang: {{$data->lama}}</p>
        <p style="text-align: right;font-weight: bold;color: blue;">{{ ($data->filled == 'Ya') ? 'Terpenuhi' : 'Belum Terpenuhi' }}</p>
    </div>
</div>
<br><br>
<center><a href="{{URL::to('/data/dudi/all-application/'.$data->id)}}" class="btn btn-success btn-xs">Lihat Daftar Siswa Yang Magang Di PEndaftaran ini.</a></center>
</div>
<div class="resume-skills">
<div class="tag-list float-left">
@foreach($data->multi_jurusan as $mul)
<span>{{$mul->jurusan->tag}}</span>
@endforeach
</div>
<div class="resume-exp float-right">
<a href="{{route('dudi.show', $data->id)}}" class="btn btn-danger btn-xs">Delete</a>
<a href="{{route('dudi.show', $data->id)}}" class="btn btn-info btn-xs">View</a>
</div>
</div>
<!-- <div class="resume-exp">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a>Daftar Siswa Yang Mengajukan di Pendaftaran ini.</a>
</h4>
</div>
</div>
</div>
<p style="padding: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
</div>
</div>
@endforeach

{{ $dudiall->links("pagination::default") }}

</div>
</div>
</div>
</div>
</div>
</div>
@endsection