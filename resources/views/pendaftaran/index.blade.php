

@extends('layouts.layout')
@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Account {{(Auth::user()->level == 'siswa') ? 'Siswa' : 'DU/DI'}}</h3>
</div>
</div>
</div>
</div>
</div>

@if(Auth::user()->level == 'siswa')
<div class="section">
<div class="container">
<div class="row">
@include('siswa._sidebar')
<div class="col-lg-8 col-md-8 col-xs-12">
<div class="inner-box my-resume">
<div class="author-resume">
<div class="thumb">
<img src="{{asset('assets/img/users/siswa/'.$siswa->foto)}}" alt="" style="width: 125px;height: 125px;">
</div>
<div class="author-info">
<h3>{{$siswa->nama_lengkap}}</h3>
<p class="sub-title"><i class="lni-licencse"></i> NIS : {{$siswa->nis}}</p>
<p><span class="address"><i class="lni-map-marker"></i> {{$siswa->alamat}}</span><br> <span><i class="lni-phone"></i> {{$siswa->no_hp}}</span></p>
<div class="social-link">
<a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>
<a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>
<a href="#" class="google"><i class="lni-google-plus"></i></a>
<a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>
</div>
</div>
</div>
<div class="about-me item">
<h3>Tentang Saya</h3>
<p>{{$siswa->tentang}}</p>
</div>
<div class="education item">
<h3>Pendidikan</h3>
<h4>Sekolah di {{$siswa->sekolah}}</h4>
<p><h5>Jurusan {{$siswa->jurusan->nama_jurusan}} ({{$siswa->jurusan->tag}})</h5></p>
<span class="date">Kelas {{$siswa->kelas}}</span>
<br>
</div>
</div>
</div>
</div>
</div>
</div>
@else
<div class="section">
<div class="container">
<div class="row">
@include('dudi._sidebar')
<div class="col-lg-8 col-md-8 col-xs-12">
<div class="inner-box my-resume">
<div class="author-resume">
<div class="thumb">
<img src="{{asset('assets/img/users/dudi/'.$dudi->detail_dudi->logo)}}" alt="" style="width: 125px;height: 125px;">
</div>
<div class="author-info">
	
<h3 style="font-size: 18px;">{{$dudi->detail_dudi->nama_perusahaan}}</h3>
<p class="sub-title"><i class="lni-world"></i> Website : {{$dudi->detail_dudi->situs_web}}</p>
<p><span class="address"><i class="lni-map-marker"></i> {{$dudi->detail_dudi->alamat}}</span> <br><span><i class="lni-envelope"></i> Email : {{$dudi->detail_dudi->user->email}}</span></p>
<div class="social-link">
<a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>
<a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>
<a href="#" class="google"><i class="lni-google-plus"></i></a>
<a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>
</div>
</div>
</div>
<div class="about-me item">
<h3>Tentang Instansi/Perusahaan</h3>
<p>{{$dudi->detail_dudi->deskripsi}}</p>
</div>
<br><br>
<div class="row">
	<div class="col-lg-12">
		<div class="s">
		<p style="text-align: center;
			    font-weight: bold;
			    font-size: 17px;
			    border-top: 2px solid #cacaca;padding-top: 10px;">Status Magang Untuk Saat Ini: {!!($dudi->status == 'Dibuka') ? '<b style="color: #26ae61;">DIBUKA</b>' : '<b style="color: #ef4d42;">DITUTUP</b>'!!}</p>
		<div class="education item">
		<div class="action-btn" style="margin-top: -10px">
		<center>
		<a href="{{route('dudi.show', $dudi->id)}}" class="btn btn-xs btn-success detail-dudi-btn">Preview</a>
		<a href="{{route('dudi.edit', $dudi->id)}}" class="btn btn-xs btn-info detail-dudi-btn">Edit Info Magang</a>
		<a href="{{route('dudi.create')}}" class="btn btn-xs btn-danger detail-dudi-btn">Buat Pendaftaran Baru</a>
		</center>
		</div>
		</div>		
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endif
@endsection