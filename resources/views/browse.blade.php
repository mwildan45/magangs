@section('js')
<script type="text/javascript">
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
@stop


@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Tempat Magang</h3>
<p style="font-weight: bold;color: #000;">Temukan tempat magang sesuai keinginanmu disini!</p>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">

<div class="col-lg-12 col-md-12 col-xs-12">
<div class="section-header text-center">
<h2 class="section-title">Jelajahi di Lebih Dari +1000 Tempat</h2>
<p>Semua tempat magang di semua jurusan bisa dicari disini.</p>
</div>
<form action="{{ url('search')}}" method="get">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="wrap-search-filter row">
<div class="col-lg-5 col-md-5 col-xs-12">
<input type="text" class="form-control" name="query1" placeholder="Keyword: Nama Magang, Nama Perusahaan">
</div>
<div class="col-lg-5 col-md-5 col-xs-12">
<input type="text" class="form-control" name="query2" placeholder="Location: Kota, Provinsi">
</div>
<div class="col-lg-2 col-md-2 col-xs-12">
<button type="submit" class="btn btn-common float-right"><i class="lni-search"></i> Cari</button>
</div>
</div>
</div>
</form>
<br><br>
</div>

<div class="col-lg-8 col-md-12 col-xs-12">

<section id="latest-jobs" class="section resection bg-gray">
<div class="container">
<div class="row">
<h5 class="widget-title wtitle-custom">Menampilkan Tempat Magang Di Semua Jurusan</h5>
@foreach($datas as $data)
<div class="col-lg-12 col-md-6 col-xs-12">
<div class="jobs-latest">
<div class="img-thumb">
<img src="{{url('assets/img/users/dudi/',$data->detail_dudi->logo)}}" alt="" class="cusimg">
</div>
<div class="content">
<h3 style="font-weight: bold;"><a href="{{route('dudi.show', $data->id)}}" title="{{$data->judul}}">{{str_limit($data->judul, 35)}}</a></h3>
<p class="brand" style="font-weight: bold;">{{$data->detail_dudi->nama_perusahaan}}</p>
<div class="tags">
<span><i class="lni-map-marker"></i> {{str_limit($data->lokasi, 30)}}</span>
<span><i class="lni-user"></i> {{$data->jumlah}} Kuota Tersisa</span><br>
<span><i class="lni-alarm-clock"></i> Dimulai Pada <a style="color: red;font-weight: bold">{{$data->date_begin->format('j M Y')}}</a></span>
</div>
@foreach($data->multi_jurusan as $mul)
<span class="full-time" data-toggle="tooltip" data-placement="bottom" title="{{$mul->jurusan->nama_jurusan}}">{{$mul->jurusan->tag}}</span>
@endforeach
</div>
<div class="save-icon">
@guest
<form action="{{route('bookmark.store')}}" method="post">
{{csrf_field()}}
<button class="cs-button" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="lni-heart-filled"></i></button>
</form>
@else
@if(Auth::user()->level == 'siswa')
<form action="{{route('bookmark.store')}}" method="post">
{{csrf_field()}}
<input type="hidden" name="dudi_id" value="{{$data->id}}">
<button class="cs-button" data-toggle="tooltip" data-placement="top" title="Bookmark"><i class="lni-heart-filled"></i></button>
</form>
@else
@endif
@endguest
</div>
</div>
</div>
@endforeach

</div>
</div>
</section>

<br><br>
{{ $datas->links("pagination::default") }}


 </div>


<aside id="sidebar" class="col-lg-4 col-md-12 col-xs-12">

<div class="widget ">
<h5 class="widget-title">Jurusan</h5>
<div class="widget-categories widget-box">
<ul class="cat-list">
<li>
<a href="{{route('jurusan.show', $jurusan->find('tag', 'RPL'))}}">Rekayasa Perangkat Lunak <span class="num-posts">({{$rpl}})</span></a>
</li>
<li>
<a href="{{route('jurusan.show', $jurusan->find('tag', 'DKV'))}}">Desain Komunikasi Visual <span class="num-posts">({{$dkv}})</span></a>
</li>
<li>
<a href="{{route('jurusan.show', $jurusan->find('tag', 'JB'))}}">Jasa Boga <span class="num-posts">({{$jb}})</span></a>
</li>
<li>
<a href="{{route('jurusan.show', $jurusan->find('tag', 'PS'))}}">Perbankan Syariah <span class="num-posts">({{$ps}})</span></a>
</li>
<li>
<a href="{{route('jurusan.show', $jurusan->find('tag', 'TPHP'))}}">Agrobisnis Pengolahan Hasil Pertanian <span class="num-posts">({{$tphp}})</span></a>
</li>
<li>
<a href="{{route('jurusan.show', $jurusan->find('tag', 'MM'))}}">Multi Media <span class="num-posts">({{$mm}})</span></a>
</li>
<li>
<a href="{{route('jurusan.index')}}" class="p-custom">Pilih Jurusan Lain</a>
</li>
</ul>
</div>
</div>

<div class="widget">
<h5 class="widget-title">Tempat Lain</h5>
<div class="widget-popular-posts widget-box">
<ul class="posts-list">
@foreach($randata->take(3) as $data)
<li>
<div class="widget-content">
<a href="{{route('dudi.show', $data->id)}}">{{str_limit($data->judul, 40)}}</a>
<span>{{$data->detail_dudi->nama_perusahaan}}<br><i class="lni-calendar"></i> {{$data->created_at->format('d M Y')}}</span>
</div>
<div class="clearfix"></div>
</li>
@endforeach
</ul>
</div>
</div>

<div class="widget">
<h5 class="widget-title">Berkas Lain</h5>
<div class="widget-archives widget-box">
<ul class="cat-list">
<li>
<a href="#">Tempat Magang yang Sudah Dimulai.</a>
</li>
<li>
<a href="#">Tempat Magang yang Ditutup.</a>
</li>
<li>
<a href="#">Tempat Magang yang Telah Terpenuhi.</a>
</li>
</ul>
</div>
</div>
</aside>

</div>
</div>
</div>

@endsection