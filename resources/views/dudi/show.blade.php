@section('css')
<!-- 
<link rel="stylesheet" type="text/css" href="{{asset('assets/additional/bamboo.css')}}">

<style type="text/css">
        .demo {
            /*position: absolute;*/
            opacity: 1 !important;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            
            width: 100%;
            height: 300px;
            overflow: hidden;
            border: 2px solid #fefefe;
            box-shadow: 1px 1px 8px 2px rgba(0, 0, 0, .1);
        }
    </style> -->

@stop


@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="breadcrumb-wrapper">
<div class="content">
<h3 class="product-title" style="font-weight: bold;text-align: center;margin-bottom: 10px;">{{$datas->judul}}</h3>
<div class="tags" style="font-weight: bold;text-align: center;">
<span><i class="lni-map-marker"></i> {{$datas->lokasi}}</span>
<span><i class="lni-calendar"></i> Posted at {{$datas->created_at->format('j F Y')}}</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<section class="job-detail section">
<div class="container">
<div class="row justify-content-between">
<div class="col-lg-8 col-md-12 col-xs-12">
<div class="content-area">
<div class="dudi">
<div class="img-dudi">
<img src="{{url('assets/img/users/dudi/',$datas->detail_dudi->logo)}}" alt="" class="detail-img">
</div>
<div class="nama-dudi">
<a href="{{ URL::to('/dudi/index/'.$datas->id) }}" style="margin-left: 15px">{{$datas->detail_dudi->nama_perusahaan}}</a>
</div>
<div class="info-dudi">
<span><i class="lni-envelope"></i> {{$datas->email}}</span>
<span><i class="lni-world"></i> {{$datas->detail_dudi->situs_web}}</span>
<span><i class="lni-users"></i> {{$datas->jumlah}} Kuota Tersisa</span>
</div>
</div>
<h4 class="h4-dudi">Deskripsi Magang</h4>
<br>

<div class="desc">
	<p>{!!$datas->deskripsi!!}</p>	
</div>
<br><br>
<h5 style="color: #26ae61;">Email Pengajuan</h5>
<h6>{{$datas->email}}</h6>
<br><br><br>
<h5 style="color: #26ae61">Foto Tempat DU/DI</h5>
<div id="carousel-area">
<div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
<div class="carousel-inner" role="listbox">
@if(!empty($fotos))
	@php
		$imagesImploded = $fotos->foto;
	  	$imagesExploded = explode('|', $imagesImploded);
	@endphp
	@foreach($imagesExploded as $img)
		<div class="carousel-item {{$loop->first ? 'active' : ''}}">
			<img src="{{url('assets/img/users/dudi/foto/'.trim($img))}}" style="width: 100%;height: 320px;border: 5px solid #d8d8d8;border-radius: 5px;">
		</div>
	@endforeach
@else
@endif
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

</div>
</div>
<div class="col-lg-4 col-md-12 col-xs-12">
<div class="sideber">
<div class="panel-group" id="accordion">
<div class="widghet">
<div class="panel panel-default">
<div class="panel-heading" style="padding: 1px !important;">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="according-a aniton">
Ajukan Magang
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse bg-cyan collapse in">
<div class="panel-body bg-cyan">
<p>Untuk mengajukan ke DU/DI ini, silahkan kirim data diri kamu ke email <b>{{$datas->email}}</b></p>
<br>
<p>
Kamu juga bisa mengajukan ke DU/DI ini dengan resume online kamu. Click link dibawah untuk submit resume online kamu dan email pengajuan kamu ke DU/DI yang dipilih.
</p>
<br>
<div class="month-price btn-common btn-common-add">
@guest
<form action="{{route('apply.store')}}" method="POST">
	{{csrf_field()}}
	<button class="btn-custom">
		<div class="price" style="padding: 10px; font-size: 14px;">Ajukan Sekarang</div><!-- 
		<h8>Tersisa {{$datas->jumlah}} tempat lagi.</h8> -->
	</button>
</form>
@else
@if(Auth::user()->level == 'siswa')
	@if($datas->jumlah == '0')
	<div class="price" style="padding: 10px; font-size: 14px;color: white;background: #ec1010;">Maaf, Kuota Siswa Telah Terpenuhi.</div>
	@elseif($siswajur == 0)
	<div class="price" style="padding: 10px; font-size: 14px;color: white;background: #ec1010;"><a href="{{route('data.index')}}" style="color: white;">Kamu harus mengisi data diri kamu terlebih dahulu!</a></div>
	@else
	<form action="{{route('apply.store')}}" method="POST" id="form-delete">
		{{csrf_field()}}
		<button type="submit" class="btn-custom" id="form-delete">
			<input type="hidden" name="dudi_id" value="{{$datas->id}}">
			<div class="price" style="padding: 10px; font-size: 14px;">Ajukan Sekarang</div>
<!-- 			<h8>Tersisa {{$datas->jumlah}} tempat lagi.</h8> -->
		</button>
	</form>
	@endif
@else
<form action="{{route('apply.store')}}" method="POST" id="form-dudi">
	{{csrf_field()}}
	<button class="btn-custom">
		<div class="price" style="padding: 10px; font-size: 14px;">Ajukan Sekarang</div>
		<!-- <h8>Tersisa {{$datas->jumlah}} tempat lagi.</h8> -->
	</button>
</form>
@endif
@endguest
</div>
<br><br>
<div class="info-sht">
<h3 style="color: red;">Perhatian !</h3>
<p style="color: black;">Setelah mengajukan ke du/di yang dipilih, pengajuan tidak bisa dibatalkan.</p>
</div>
</div>
</div>
</div>
</div>
<div class="widghet widghet-custom">
	<h3 class="h3-widget"><i class="lni-graduation"></i>  Jurusan
	@php $no = 1; @endphp
	@foreach($datas->multi_jurusan as $mul)
		<span class="span-cus-jur">{{$no++}}. {{$mul->jurusan->nama_jurusan}} ({{$mul->jurusan->tag}})</span>
	@endforeach
	</h3>
	<h3 class="h3-widget"><i class="lni-users"></i>  Kuota Siswa<span class="span-cus-jur"> {{$datas->jumlah}} Tersisa</span></h3>
	<h3 class="h3-widget"><i class="lni-alarm-clock"></i> Periode Magang<span class="span-cus-jur"> {{$datas->date_begin->format('j M Y')}} - {{$datas->date_end->format('j M Y')}}</span></h3>
	<h3 class="h3-widget"><i class="lni-timer"></i> Lama Waktu Magang<span class="span-cus-jur"> {{$datas->lama}} Bulan</span></h3>
</div>
<!-- <div class="widghet">
<h3>Magang Location</h3>
<div class="maps">
<div id="map" class="map-full">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d405691.57240383344!2d-122.3212843181106!3d37.40247298383319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb68ad0cfc739%3A0x7eb356b66bd4b50e!2sSilicon+Valley%2C+CA%2C+USA!5e0!3m2!1sen!2sbd!4v1538319316724" allowfullscreen=""></iframe>
</div>
</div>
</div> -->
<div class="widghet">
<h3>Share This Magang</h3>
<div class="share-job">
<form method="post" class="subscribe-form">
<div class="form-group">
<input type="email" name="Email" class="form-control" placeholder="https://joburl.com" required="">
<button type="submit" name="subscribe" class="btn btn-common sub-btn"><i class="lni-files"></i></button>
<div class="clearfix"></div>
</div>
</form>
<ul class="mt-4 footer-social">
<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
<li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
<li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
<li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
</ul>
<div class="meta-tag">
<span class="meta-part"><a href="#"><i class="lni-star"></i> Write a Review</a></span>
<span class="meta-part"><a href="#"><i class="lni-warning"></i> Reports</a></span>
<span class="meta-part"><a href="#"><i class="lni-share"></i> Share</a></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section id="featured" class="section bg-cyan pb-45">
<div class="container">
<h4 class="small-title text-left">Jurusan Lain Yang Sama</h4>
<div class="row">
@if($lains->count() > 0)
@foreach($lains->where('jurusan_id', $datas->jurusan_id)->take(3) as $lain)
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="job-featured">
<div class="icon">
<img src="{{url('assets/img/users/dudi/',$lain->detail_dudi->logo)}}" alt="" style="width: 50px;height: 50px;">
</div>
<div class="content">
<h3><a href="{{ route('dudi.show', $lain->id) }}" style="font-weight: bold" title="{{$lain->judul}}">{{str_limit($lain->judul, 17)}}</a></h3>
<p class="brand" style="font-weight: bold;">{{str_limit($lain->detail_dudi->nama_perusahaan, 17)}}</p>
<div class="tags" style="display: grid;">
<span title="{{$lain->lokasi}}"><i class="lni-map-marker"></i> {{str_limit($lain->lokasi, 20)}}</span>
<span><i class="lni-user"></i> {{$lain->jumlah}} Anak</span>
</div>
@foreach($datas->multi_jurusan as $mul)
<span class="full-time">{{$mul->jurusan->tag}}</span>
@endforeach
</div>
</div>
</div>
@endforeach
@else
There's no magang place at the same jurusan right now
@endif
</div>
</div>
</section>

@endsection

@section('js')

<!-- <script type="text/javascript" src="{{asset('assets/additional/bamboo.js')}}"></script>

 <script type="text/javascript">
        var element = document.querySelector('.demo');
        var sildeshow = bamboo(element, 'fade');
    </script>  -->

@guest
@else
@if(Auth::user()->level == 'siswa')
<script type="text/javascript">
	$('#form-delete').on('submit', function(e){
    var form = this;
    e.preventDefault();
    swal({
      title: 'Kamu yakin ?',
      @foreach($datas->multi_jurusan as $mul)
      @if($siswajur == $mul->jurusan->id)
      html: 'Setelah mengajukan ke du/di yang dipilih, pengajuan tidak bisa dibatalkan.',
      @else
      html: 'Setelah mengajukan ke du/di yang dipilih, pengajuan tidak bisa dibatalkan <div class="sweetp">dan DU/DI yang kamu pilih tidak sesuai dengan jurusan kamu !</div>',
      @endif
      @endforeach
      type: 'warning',
      showCancelButton: true,
      showCloseButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ajukan'
    }).then((result) => {
      if (result.value) {
        return form.submit();
      }
    })
});
</script>
@else
<script type="text/javascript">
	$('#form-dudi').on('submit', function(e){
		var form = this;
		e.preventDefault();
		swal({
		  title: "Gagal !",
		  text: "Anda bukan siswa!",
		  type: 'error',
		  icon: "succeess",
		  confirmButtonText: 'Tutup',
		});
	});
</script>
@endif
@endguest

@stop