@extends('layouts.layout')
@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Tentang DU/DI</h3>
</div>
</div>
</div>
</div>
</div>


<div class="about section">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-7 col-xs-12">
<div class="about-content">
<img class="detail-img" src="{{ asset('assets/img/users/dudi/'.$data->detail_dudi->logo)}}" style="margin-top: 5px">
<p class="p-title">{{$data->detail_dudi->nama_perusahaan}}</p>
<div class="info-dudi">
<div class="row">
	<div class="col-lg-12 col-md-4 col-sm-4">
		<span><i class="lni-map-marker"></i> {{$data->detail_dudi->alamat}}</span>
	</div>
	<div class="col-lg-12 col-md-4 col-sm-4">
		<span><i class="lni-envelope"></i> {{$data->email}}</span>
	</div>
	<div class="col-lg-12 col-md-4 col-sm-4">
		<span><i class="lni-world"></i> {{$data->detail_dudi->situs_web}}</span>
	</div>
</div>
</div>
<p class="p-style">{!!$data->detail_dudi->deskripsi!!}</p>
</div>
</div>
<div class="col-lg-4 col-md-5 col-xs-12">
<img class="img-fluid float-right img-detail-dudi" src="{{ asset('assets/img/about/img1.jpg')}}" alt="">
</div>
</div>
</div>
</div>


<section id="counter" class="section bg-cyan">
<div class="container">
<div class="row">


<div class="col-lg-5 col-md-6 col-xs-12">
 <div class="counter-box">
<div class="icon"><i class="lni-home"></i></div>
<div class="fact-count">
<h3><span class="counter">{{$data_dudi}}</span></h3>
<p>Pendaftaran Berhasil Dibuat</p>
</div>
</div>
</div>


<div class="col-lg-4 col-md-6 col-xs-12">
<div class="counter-box">
<div class="icon"><i class="lni-briefcase"></i></div>
<div class="fact-count">
<h3><span class="counter">{{$count_siswa}}</span></h3>
<p>Siswa Terdaftar</p>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6 col-xs-12">
<div class="counter-box">
<div class="icon"><i class="lni-pencil-alt"></i></div>
<div class="fact-count">
<h3><span class="counter">{{$count_apply->count()}}</span></h3>
<p>Pengajuan</p>
</div>
</div>
</div>


</div>
</div>
</section>




<section id="testimonial" class="section">
<div class="container">
<div class="section-header">
<h2 class="section-title">Data Anak Yang Sedang Magang Di DU/DI Ini.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>
</div>
<div class="row justify-content-center">
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<div id="testimonials" class="touch-slider owl-carousel">
@if($pengajuan->count() > 0)
@foreach($pengajuan as $siswa)
<div class="item">
<div class="testimonial-item">
<div class="author">
<div class="img-thumb">
 <img src="{{asset('assets/img/users/siswa/'.$siswa->siswa->foto)}}" alt="" style="width: 60px;height: 60px;">
</div>
</div>
<div class="content-inner">
<p class="description">{{$siswa->siswa->tentang}}</p>
<div class="author-info">
<h2><a href="#">{{$siswa->siswa->nama_lengkap}}</a></h2>
<span>{{$siswa->siswa->sekolah}}</span><br>
<span>{{$siswa->siswa->jurusan->nama_jurusan}}</span>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 text-center mt-4">
<a href="{{route('jurusan.index')}}" class="btn btn-common">Lihat Semua Daftar Anak <br>Yang Telah Magang Di DU/DI Ini.</a>
</div>
@endforeach
@else
<h2 style="font-size: 15px;text-align: center;">(Masih belum ada siswa smk yang mendaftar di DU/DI ini)</h2>
@endif
</div>
</div>
</div>
</div>
</section>



<section class="how-it-works section bg-gray">
<div class="container">
<div class="section-header">
<h2 class="section-title">How It Works?</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="work-process">
<span class="process-icon">
<i class="lni-user"></i>
</span>
<h4>Create an Account</h4>
<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="work-process step-2">
<span class="process-icon">
<i class="lni-search"></i>
</span>
<h4>Search Jobs</h4>
<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="work-process step-3">
<span class="process-icon">
<i class="lni-cup"></i>
</span>
<h4>Apply</h4>
<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
</div>
</div>
</div>
</div>
</section>

@endsection