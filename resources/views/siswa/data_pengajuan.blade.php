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
<h3>Siswa Application Pages</h3>
</div>
</div>
</div>
</div>
</div>

<div class="section">
<div class="container">
<div class="row">

@include('siswa._sidebar')

<div class="col-lg-8 col-md-12 col-xs-12">
<div class="job-alerts-item">
<h3 class="alerts-title">Atur Pengajuan</h3>
@if($datas->count() > 0)
@foreach($datas as $data)
<div class="manager-resumes-item">
<div class="manager-content" style="background: #ffffff !important;">
<a href="resume.html"><img class="custom-img" src="{{url('assets/img/users/dudi/', $data->dudi->detail_dudi->logo)}}" alt=""></a>
<div class="manager-info">
<div class="manager-name">
<h4>{{$data->dudi->detail_dudi->nama_perusahaan}}</h4>
<h5 style="margin-top: -5px;font-weight: bold;color: #26ae61;" title="{{$data->dudi->judul}}">{{str_limit($data->dudi->judul,20)}}</h5>
<h5 style="font-size: 13px;"> Diajukan Tgl.{{$data->created_at->format('j F Y')}}</h5>
</div>
<div class="manager-meta">
	@if($data->status == 'Diterima')
	<a class="btn btn-sm btn-success"><i class="fa fa-check"></i> Diterima</a>
	@elseif($data->status == 'Ditolak')
	<a class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Ditolak</a>
	@else
	<a class="btn btn-sm btn-primary"><i class="fa fa-info"></i> Diajukan</a>
	@endif
</div>
</div>
</div>
<div class="update-date" style="background: #f2f7fb;">
<p class="status">
<strong>Periode:</strong> {{$data->dudi->date_begin->format('j M Y')}} - {{$data->dudi->date_end->format('j M Y')}}
</p>
<div class="action-btn">
<a class="btn btn-xs btn-info" href="{{route('dudi.show', $data->dudi->id)}}" title="View"><i class="lni-eye"></i></a>
<a class="btn btn-xs btn-info" href="{{route('dudi.show', $data->dudi->id)}}" title="Hubungi"><i class="lni-phone"></i></a>
<a class="btn btn-xs btn-danger" href="#" title="Magang kamu di perusahaan/instansi ini {{($data->period == $teksDate) ? $teksDate : $data->period}}">{{($data->period == $teksDate) ? $teksDate : $data->period}}</a>
</div>
</div>
</div>

@endforeach
<br>


@else
<div class="applications-content">
<div class="row">
<div class="col-md-12">
<h1>Masih Belum Ada Pengajuan</h1>
<a href="{{route('dudi.index')}}"><h3 class="alerts-title" style="color: #03E95F;">Cari Sekarang!</h3></a>
</div>
</div>
</div>
@endif

<br><br>
<div class="row">
	<div class="col-lg-12">
		<div class="section bg-cyan">
			<p class="p-info">Perhatian ! </p><br><p class="p-info-2" style="color: #333740;">Jika ingin mengajukan ke tempat DU/DI yang lain, kamu harus menunggu sampai pengajuan kamu yang sebelumnya selesai ditinjau oleh DU/DI yang dipilih. Lihat <a href="#">Syarat dan Ketentuan yang Berlaku</a> untuk informasi selengkapnya. Kami berhak melakukan apapun jika terjadi tindakan penyalahgunaan. Hubungi Admin untuk informasi lebih lanjut. 
			<br><br>Untuk mengajukan ke tempat DU/DI yang dipilih untuk kedua kali dan seterusnya, kamu harus menunggu sampai periode magang kamu yang sebelumnya telah selesai.</p>
		</div>
	</div>
</div>

</div>
</div>
</div>
</div>
</div>

@endsection