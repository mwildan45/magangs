@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Cari Jurusan</h3>
</div>
</div>
</div>
</div>
</div>

@if($datas->count() > 0)

<section class="job-browse section">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="wrap-search-filter row">
<div class="col-lg-5 col-md-5 col-xs-12">
<input type="text" class="form-control" placeholder="Keyword: Name, Tag">
</div>
<div class="col-lg-5 col-md-5 col-xs-12">
<input type="text" class="form-control" placeholder="Location: City, State, Zip">
</div>
<div class="col-lg-2 col-md-2 col-xs-12">
<button type="submit" class="btn btn-common float-right">Filter</button>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
@foreach($datas as $ddata)
<a class="job-listings" href="job-details.html">
<div class="row">
<div class="col-lg-4 col-md-4 col-xs-12">
 <div class="job-company-logo">
<img src="{{url('assets/img/users/dudi/',$ddata->logo)}}" alt="" style="width: 50px;height: 50px;">
</div>
<div class="job-details">
<h3>{{$ddata->judul}}</h3>
<span class="company-neme">
{{$ddata->nama_dudi}}
</span>
</div>
</div>
<div class="col-lg-2 col-md-2 col-xs-12 text-center">
<span class="btn-open">
{{$ddata->jurusan->tag}}
</span>
</div>
<div class="col-lg-2 col-md-2 col-xs-12 text-right">
<div class="location">
<i class="lni-map-marker"></i> {{$ddata->lokasi}}
</div>
</div>
<div class="col-lg-2 col-md-2 col-xs-12 text-right">
<span class="btn-full-time">{{$ddata->status}}</span>
</div>
<div class="col-lg-2 col-md-2 col-xs-12 text-right">
<span class="btn-apply">Apply Now</span>
</div>
</div>
</a>
@endforeach


<ul class="pagination">
<li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
</ul>

</div>
</div>
</div>
</section>

@else

<div class="container">
<div class="row">
<div class="col-lg-12">
<h1 class="small-title text-left">Masih Belum Ada Hasil Dalam Jurusan Ini</h1>
</div>
</div>
</div>


<section id="featured" class="section bg-gray pb-45">
<div class="container">
<h4 class="post-title">Cari Di Jurusan Lain</h4>
<div class="row">
@foreach($randata->take(3) as $lain)
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="job-featured">
<div class="icon">
<img src="{{url('assets/img/users/dudi/',$lain->logo)}}" alt="" style="width: 50px;height: 50px;">
</div>
<div class="content">
<h3><a href="{{ route('dudi.show', $lain->id) }}">{{$lain->judul}}</a></h3>
<p class="brand">{{$lain->nama_dudi}}</p>
<div class="tags">
<span><i class="lni-map-marker"></i> {{$lain->lokasi}}</span>
<span><i class="lni-user"></i>{{$lain->detail_dudi->situs_web}}</span>
</div>
<span class="full-time">{{$lain->jurusan->tag}}</span>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>

@endif
@endsection