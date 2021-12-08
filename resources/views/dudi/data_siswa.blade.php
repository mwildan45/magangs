@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Daftar Penerimaan Siswa</h3>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
<h3 style="width:100%;color: #333333;font-size: 20px;text-align: center;padding-bottom: 15px;border-bottom: 1px #ccc solid;">Daftar semua siswa yang mengajukan pada pendaftaran yang berjudul </br><a href="#">{{$dudi->judul}}</a>.</h3>
@if($siswa->count() > 0)
@foreach($siswa as $data)
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb" src="{{asset('assets/img/users/siswa/'.$data->siswa->foto)}}" alt="" style="width: 64px;height: 64px;"></a>
<div class="manager-info">
<div class="manager-name">
<h4><a href="#">{{$data->siswa->nama_lengkap}}</a></h4>
<h5>{{$data->siswa->alamat}}</h5>
<h5>No Telp. {{$data->siswa->no_hp}}</h5>
</div>
<div class="manager-meta">
<span class="location"><i class="lni-map-pin"></i> NIS : {{$data->siswa->nis}}</span>
<span class="rate"><i class="lni-graduation"></i> Kelas {{$data->siswa->kelas}}, {{$data->siswa->sekolah}}</span>
<span><i></i> {{($data->siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan')}}</span>
</div>
</div>
</div>
<div class="item-body">
<div class="content">
<p>{!! $data->siswa->tentang !!}.</p>
</div>
<div class="resume-skills">
<div class="tag-list float-left">
<span>{{$data->siswa->jurusan->nama_jurusan}}</span>
</div>
<div class="resume-exp float-right">
<a href="#" class="btn btn-common btn-xs">{{$data->status}}</a>
</div>
</div>
</div>
</div>
</div>
@endforeach
@else
<div class="col-lg-12 col-md-12 col-xs-12">
<h2 style="text-align: center;">There's No Siswa Application Data At This Application Yet.</h2>
</div>
@endif
</div>
</div>
</div>


@endsection