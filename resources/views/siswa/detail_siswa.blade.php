@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Browse Resumes</h3>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-6 col-xs-12">
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb" src="{{asset('assets/img/users/siswa/'.$datas->foto)}}" alt=""></a>
<div class="manager-info">
<div class="manager-name">
<h4><a href="#">{{$datas->nama_lengkap}}</a></h4>
<h5>{{$datas->alamat}}</h5>
<h5>No Telp. {{$datas->no_hp}}</h5>

</div>
<div class="manager-meta">
<span class="location"><i class="lni-map-pin"></i> NIS : {{$datas->nis}}</span>
<span class="rate"><i class="lni-graduation"></i> Kelas {{$datas->kelas}}, {{$datas->sekolah}}</span>
<span><i></i> {{($datas->jk == 'L' ? 'Laki-laki' : 'Perempuan')}}</span>
</div>
</div>
</div>
<div class="item-body">
<div class="content">
<p>{!! $datas->tentang !!}</p>
</div>
<div class="resume-skills">
<div class="tag-list float-right">
<span><a href="{{URL::to('/data/dudi/data-resume/')}}">Kembali</a></span>
</div>
<div class="resume-exp float-left">
<a href="#" class="btn btn-common btn-xs">{{$datas->jurusan->nama_jurusan}}</a>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


@endsection