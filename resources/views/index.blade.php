@extends('layouts.layout')

@section('content')


<div id="carousel-area">
<div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
<li data-target="#carousel-slider" data-slide-to="1"></li>
<li data-target="#carousel-slider" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" role="listbox">
<div class="carousel-item active">
<img src="assets/img/slider/bg-1.jpg" alt="">
<div class="carousel-caption text-left">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<h2 class="wow fadeInRight" data-wow-delay="0.4s">Temukan tempat magang<br> sesuai keinginanmu</h2>
<p class="wow fadeInRight" data-wow-delay="0.6s">Lebih dari 1000 tempat di berbagai jurusan menunggu untuk kamu pilih!</p>
<a href="{{route('dudi.index')}}" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Lihat Semua</a>
<a href="{{route('jurusan.index')}}" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Pilih Jurusan</a>
</div>
<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
<div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
<img src="assets/img/slider/img-1.png" alt="">
</div>
</div>
</div>
</div>
</div>
<div class="carousel-item">
<img src="assets/img/slider/bg-1.jpg" alt="">
<div class="carousel-caption text-left">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<h2 class="wow fadeInUp" data-wow-delay="0.4s">1000+ Tempat magang <br>menunggu kamu!</h2>
<p class="wow fadeInUp" data-wow-delay="0.6s">Cari dengan nama atau lokasi magang disini <br>dan langsung dapatkan tempat magang sesuai yang kamu pilih.</p><div class="job-search-form">
<form action="{{url('search')}}" method="get">
<div class="row">
<div class="col-lg-5 col-md-5 col-xs-12">
<div class="form-group">
<input class="form-control" type="text" placeholder="Judul atau Nama DU/DI" name="query1">
</div>
</div>
<div class="col-lg-5 col-md-5 col-xs-12">
<div class="form-group">
<input type="text" class="form-control" name="query2" placeholder="Location: Kota, Provinsi">
<i class="lni-map-marker"></i>
</div>
</div>
<div class="col-lg-2 col-md-2 col-xs-12">
<button type="submit" class="button"><i class="lni-search"></i></button>
</div>
</div>
</form>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
<div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
<img src="assets/img/slider/img-2.png" alt="">
</div>
</div>
</div>
</div>
</div>
<div class="carousel-item">
<img src="assets/img/slider/bg-1.jpg" alt="">
<div class="carousel-caption text-left">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<h2 class="wow fadeInRight" data-wow-delay="0.4s">Daftarkan tempat anda <br> dan dapatkan siswa berkualitas!</h2>
<p class="wow fadeInRight" data-wow-delay="0.6s">Segera daftarkan <br> dan dapatkan siswa magang dengan mudah dan cepat di tempat anda.</p>
<a href="{{route('register')}}" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Buat Akun</a>
<a href="{{route('data.index')}}" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Daftarkan Tempat</a>
</div>
<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
<div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
<img src="assets/img/slider/img-3.png" alt="">
</div>
</div>
</div>
</div>
</div>
</div>
<a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>

</header>


<section class="browse-catagories section">
<div class="container">
<div class="section-header">
<h2 class="section-title">Telusuri Berdasarkan Jurusan</h2>
<p>As the world's #1 magang site, with over 200 million unique visitors every month from over 1000 different school countries</p>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-xs-12">
<a href="{{route('jurusan.show', $dudi->find('tag', 'RPL') )}}" class="img-box">
<div class="img-box-content">
<h4>Rekayasa Perangkat Lunak</h4>
<span>{{$rpl}} Tempat</span>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/catagories/rpl.JPG" alt="">
</div>
</a>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-12">
<a href="{{route('jurusan.show', $dudi->find('tag', 'JB') )}}" class="img-box">
<div class="img-box-content">
<h4>Jasa Boga</h4>
<span>{{$jb}} Tempat</span>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/catagories/jb.jpg" alt="" style="height: 305px">
</div>
</a>
</div>
<div class="col-lg-6 col-md-6 col-xs-12">
<a href="{{route('jurusan.show', $dudi->find('tag', 'PS') )}}" class="img-box">
<div class="img-box-content">
<h4>Perbankan Syariah</h4>
<span>{{$ps}} Tempat</span>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/catagories/ps.jpg" alt="" style="height: 305px">
</div>
</a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-xs-12">
<a href="{{route('jurusan.show', $dudi->find('tag', 'DKV') )}}" class="img-box">
<div class="img-box-content">
<h4>Desain Komunikasi Visual</h4>
<span>{{$dkv}} Tempat</span>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/catagories/dkv.jpg" alt="" style="height: 251px; width: 100%;">
</div>
</a>
</div>
<div class="col-lg-6 col-md-12 col-xs-12">
<a href="{{route('jurusan.show', $dudi->find('tag', 'TPHP') )}}" class="img-box">
<div class="img-box-content">
<h4>Agrobisnis Pengolahan Bahan Pangan</h4>
<span>{{$tphp}} Tempat</span>
</div>
<div class="img-box-background">
<img class="img-fluid" src="assets/img/catagories/tphp.jpg" alt="" style="height: 251px; width: 100%;">
</div>
</a>
</div>
<div class="col-12 text-center mt-4">
<a href="{{route('jurusan.index')}}" class="btn btn-common">Lihat Semua Jurusan</a>
</div>
</div>
</div>
</section>

<section id="featured" class="section bg-cyan">
<div class="container">
<div class="section-header">
<h2 class="section-title">Tempat Magang Terbaru</h2>
<p>Telah menjadi website pencari magang #1 se-dunia, dengan total lebih dari 10 juta orang yang melihat dari berbagai penjuru dunia.</p>
</div>
<div class="row">
@foreach($dudi->take(6) as $data)
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="job-featured">
<div class="icon">
<img src="{{url('assets/img/users/dudi/',$data->detail_dudi->logo)}}" alt="" style="width: 70px;height: 70px;border-radius: 10px">
</div>
<div class="content">
<h3><a href="{{route('dudi.show', $data->id)}}" style="font-weight: bold;" title="{{$data->judul}}">{{str_limit($data->judul, 15)}}</a></h3>
<p class="brand" style="font-weight: bold;">{{$data->detail_dudi->nama_perusahaan}}</p>
<div class="tags" style="display: grid;">
<span><i class="lni-map-marker"></i> {{str_limit($data->lokasi, 17)}}</span>
<span><i class="lni-user"></i>{{$data->jumlah}} Anak</span>
</div>
@foreach($data->multi_jurusan as $mul)
<span class="full-time">{{$mul->jurusan->tag}}</span>
@endforeach
</div>
</div>
</div>
@endforeach
<div class="col-12 text-center mt-4">
<a href="{{route('dudi.index')}}" class="btn btn-common">Telusuri Semua Tempat</a>
</div>
</div>
</div>
</section>

<section class="how-it-works section">
<div class="container">
<div class="section-header">
<h2 class="section-title">Bagaimana Cara Kerjanya?</h2>
<p>Cukup dengan melakukan hal berikut maka kamu akan dapat tempat magang sesuai keinginanmu gratis!</p>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
<div class="work-process">
<span class="process-icon">
<i class="lni-user"></i>
</span>
<h4>Buat Akun</h4>
<p>Daftarkan diri kamu secara lengkap dan benar sesuai dengan informasi data diri kamu.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="work-process step-2">
<span class="process-icon">
<i class="lni-search"></i>
</span>
<h4>Cari Tempat Magang</h4>
<p>Cari tempat magang sesuai dengan jurusanmu di lebih dari 1000 tempat disini.</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="work-process step-3">
<span class="process-icon">
<i class="lni-cup"></i>
</span>
<h4>Ajukan</h4>
<p>Ajukan ke tempat yang kamu pilih lalu kamu akan mendapatkan notifikasi penerimaan segera!</p>
</div>
</div>
</div>
</div>
</section>


<div id="apply">
<div class="container-fulid">
<div class="row">
<div class="col-lg-6 col-md-12 col-xs-12 no-padding">
<div class="recruiter item-box">
<div class="content-inner">
<h5>Saya</h5>
<h3>Pencari Tempat Magang!</h3>
<p>Jelajah dan temukan tempat magang sesuai jurusan dan keinginanmu dengan cepat dan mudah secara gratis!</p>
<a href="{{route('dudi.index')}}" class="btn btn-border-filled">Cari Tempat</a>
</div>
<div class="img-thumb">
<i class="lni-users"></i>
</div>
</div>
</div>
<div class="col-lg-6 col-md-12 col-xs-12 no-padding">
<div class="jobseeker item-box">
<div class="content-inner">
<h5>Saya</h5>
<h3>Penyedia Tempat Magang!</h3>
<p>Daftarkan tempat anda disini dan dapatkan siswa pilihan dengan cepat dan mudah!</p>
<a href="{{route('data.index')}}" class="btn btn-border-filled">Daftar</a>
</div>
<div class="img-thumb">
<i class="lni-leaf"></i>
</div>
</div>
</div>
</div>
</div>
</div>



<section id="counter" class="section bg-gray">
<div class="container">
<div class="row">

<div class="col-lg-3 col-md-6 col-xs-12">
<div class="counter-box">
<div class="icon"><i class="lni-home"></i></div>
<div class="fact-count">
<h3><span class="counter">800</span></h3>
<p>Magang Posted</p>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6 col-xs-12">
<div class="counter-box">
 <div class="icon"><i class="lni-briefcase"></i></div>
<div class="fact-count">
<h3><span class="counter">80</span></h3>
<p>All Companies</p>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6 col-xs-12">
<div class="counter-box">
<div class="icon"><i class="lni-pencil-alt"></i></div>
<div class="fact-count">
<h3><span class="counter">900</span></h3>
<p>Resumes</p>
</div>
</div>
</div>


<div class="col-lg-3 col-md-6 col-xs-12">
<div class="counter-box">
<div class="icon"><i class="lni-save"></i></div>
<div class="fact-count">
<h3><span class="counter">1200</span></h3>
<p>Applications</p>
</div>
</div>
</div>

</div>
</div>
</section>


 
<section id="download" class="section bg-gray">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-8 col-xs-12">
<div class="download-wrapper">
<div>
<div class="download-text">
<h4>Download Our Best Apps</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et metus effici turac fringilla lorem facilisis, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
<div class="app-button">
<a href="#" class="btn btn-border"><i class="lni-MizTech"></i>Download <br> <span>From Apple Apps Store</span></a>
<a href="#" class="btn btn-common btn-effect"><i class="lni-android"></i> Download <br> <span>From Play Store</span></a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-4 col-xs-12">
<div class="download-thumb">
<img class="img-fluid" src="assets/img/app.png" alt="">
</div>
</div>
</div>
</div>
</section>



@endsection