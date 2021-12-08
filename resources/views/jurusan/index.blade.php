@extends('layouts.layout')

@section('content')


</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Semua Jurusan</h3>
<p style="font-weight: bold;color: #000;">Cari Di Semua Jurusan Yang Tersedia Dibawah</p>
</div>
</div>
</div>
</div>
</div>


<section class="category section bg-gray">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-1">
<i class="lni-home"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Multimedia')}}</h3>
<p>(4286 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-2">
<i class="lni-world"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Teknik Komputer Dan Jaringan')}}</h3>
<p>(2000 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-3">
<i class="lni-book"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Akutansi')}}</h3>
<p>(1450 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-4">
<i class="lni-display"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Rekayasa Perangkat Lunak')}}</h3>
<p>(5100 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-5">
<i class="lni-brush"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Desain Komunikasi Visual')}}</h3>
<p>(5079 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-6">
<i class="lni-heart"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Perbankan Syariah')}}</h3>
<p>(3235 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-7">
<i class="lni-funnel"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Tata Boga')}}</h3>
<p>(1800 jobs)</p>
</a>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 f-category">
<a href="browse-jobs.html">
<div class="icon bg-color-8">
<i class="lni-cup"></i>
</div>
<h3>{{$datas->find('nama_jurusan', 'Jasa Boga')}}</h3>
<p>(4286 jobs)</p>
</a>
</div>
</div>
</div>
</section>


<section class="all-categories section">
<div class="container">
<h2 class="categories-title">Cari Di Semua Jurusan</h2>
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12">
<h3 class="cat-title"><span></span>Sekitar {{$datas->count()}} Jurusan <span> Yang Dapat Dipilih</span></h3>
</div>
@foreach($datas->chunk(7) as $chunk)
<div class="col-lg-3 col-md-6 col-xs-12">	
<ul>
@foreach($chunk as $jur)
<li>
<a href="{{ route('jurusan.show', $jur->tag) }}">{{$jur->nama_jurusan}} ({{$jur->tag}})</a>
</li>
@endforeach
</ul>
</div>
@endforeach
<div class="col-md-12 col-sm-12 col-xs-12">
<h3 class="cat-title">Science <span>(34 Sub Categories)</span></h3>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Aeronautical Engineering</a></li>
<li><a href="#">Aerospace Engineering</a></li>
<li><a href="#">Algorthm</a></li>
<li><a href="#">Biology</a></li>
<li><a href="#">Broadcast Engineering</a></li>
<li><a href="#">Circuit Design</a></li>
<li><a href="#">Civil Engineering</a></li>
<li><a href="#">Clean Technology</a></li>
<li><a href="#">Construction Monitoring</a></li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Climate Sciences</a></li>
<li><a href="#">Cryptography</a></li>
<li><a href="#">Data Mining</a></li>
<li><a href="#">Data Science</a></li>
<li><a href="#">Digital Design</a></li>
<li><a href="#">Drones</a></li>
<li><a href="#">Electrical Engineering</a></li>
<li><a href="#">Electronics</a></li>
<li><a href="#">Engineering</a></li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Gelolgy</a></li>
<li><a href="#">Human Science</a></li>
<li><a href="#">Imaging</a></li>
<li><a href="#">Industrial Engineering</a></li>
<li><a href="#">Instrumentation</a></li>
<li><a href="#">Machine Learning</a></li>
<li><a href="#">Mathematics</a></li>
<li><a href="#">Machanical Engineering</a></li>
<li><a href="#">Medical</a></li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Nanotechnology</a></li>
<li><a href="#">Natural Language</a></li>
<li><a href="#">Physics</a></li>
<li><a href="#">Quantum</a></li>
<li><a href="#">Remote Sensing</a></li>
<li><a href="#">Robotics</a></li>
<li><a href="#">Statistics</a></li>
<li><a href="#">Wireless</a></li>
</ul>
</div>
<div class="col-lg-12 col-md-12 col-xs-12">
<h3 class="cat-title">Sales & Marketing <span>(21 Sub Categories)</span></h3>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Display Advertising</a></li>
<li><a href="#">Email Marketing</a></li>
<li><a href="#">Lead Generation</a></li>
<li><a href="#">Market &amp; Customer Research</a></li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Marketing Strategy</a></li>
<li><a href="#">Public Relations</a></li>
<li><a href="#">Telemarketing &amp; Telesales</a></li>
<li><a href="#">Other - Sales &amp; Marketing</a></li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">SEM - Search Engine Marketing</a></li>
<li><a href="#">SEO - Search Engine Optimization</a></li>
<li><a href="#">SMM - Social Media Marketing</a></li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<ul>
<li><a href="#">Climate Sciences</a></li>
<li><a href="#">Cryptography</a></li>
<li><a href="#">Data Mining</a></li>
<li><a href="#">Digital Design</a></li>
</ul>
</div>
</div>
</div>
</section>

@endsection