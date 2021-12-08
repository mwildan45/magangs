@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Tambah Jurusan</h3>
</div>
</div>
</div>
</div>
</div>


<section id="contact" class="section">
<div class="contact-form">
<div class="container">
<div class="row contact-form-area">
<div class="col-md-12 col-lg-6 col-sm-12">
<div class="contact-block">
<h2 style="font-weight: bold;margin-bottom: 35px;">Isikan Detail Jurusanmu disini</h2>
<form action="{{route('jurusan.store')}}" method="POST">
{{csrf_field()}}
<div class="row">
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" id="name" name="nama_jurusan" placeholder="Nama Jurusan" required>
<p style="margin-left: 10px;">Tulis Nama Lengkap Jurusan Kamu</p>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" placeholder="Singkatan Jurusan" id="email" class="form-control" name="tag" required>
<p style="margin-left: 10px;">Tulis Singkatan Dari Jurusan Kamu. ex: RPL, DKV, MM, dll.</p>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" placeholder="Nama Kamu" id="msg_subject" class="form-control" name="nama" required>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control" id="message" name="sekolah" placeholder="Asal Sekolahmu">
</div>
<div class="submit-button">
<button class="btn btn-common" type="submit">Submit Jurusanmu</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="col-md-12 col-lg-6 col-sm-12">
<div class="contact-right-area wow fadeIn">
<h2 style="font-weight: bold;">Bagaimana Kerjanya?</h2>
<div class="contact-info">
<div class="single-contact">
<div class="contact-icon">
<i class="lni-map-marker"></i>
</div>
<p>Isi detail dari jurusan yang belum ada disini.</p>
</div>
<div class="single-contact">
<div class="contact-icon">
<i class="lni-envelope"></i>
</div>
<p>Admin akan segera menindaklanjuti submit an dari kamu.</p>
</div>
<div class="single-contact">
<div class="contact-icon">
<i class="lni-phone-handset"></i>
</div>
<p><a href="#">Jurusan kamu akan tersedia disini!</a></p>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</section>


@endsection