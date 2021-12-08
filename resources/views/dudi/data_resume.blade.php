@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Student Submission</h3>
<p style="font-weight: bold;color: #000;">Semua pengajuan siswa tersimpan disini.</p>
</div>
</div>
</div>
</div>
</div>

<div class="section">
<div class="container">
<div class="row">
@include('dudi._sidebar')
<div class="col-lg-8 col-md-12 col-xs-12">
<div class="job-alerts-item candidates">
<h5 style="font-size: 19px;color: #9a9a9a;">Kuota Awal : {{$totalQuota}} Anak</h5>
<h3 class="alerts-title">Pengajuan Siswa ({{$ajukan->count()}})</h3>
@if($ajukan->count() > 0)
@foreach($ajukan as $data)
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb img-pjuandudi" src="{{url('assets/img/users/siswa/', $data->siswa->foto)}}" alt=""></a>
<div class="manager-info">
<div class="manager-name">
<h4 class="h4-pjuandudi"><i class="lni-user"></i><a href="#"> {{$data->siswa->nama_lengkap}}</a></h4>
<p class="pcus-pengajuandudi"><i class="lni-laptop"></i> {{$data->siswa->jurusan->nama_jurusan}} <span style="color: red;">({{$data->siswa->kelas}})</span></p>
<p class="pcus-pengajuandudi"><i class="lni-home"></i> {{$data->siswa->alamat}}</p>
</div>
<div class="manager-meta">
<span class="rate"><i class="lni-graduation"></i> {{$data->siswa->sekolah}}</span>
<span class="rate"><i class="lni-phone"></i> {{$data->siswa->no_hp}}</span>
</div>
</div>
</div>
<div class="update-date">
<p class="status">
<strong>Diajukan tanggal :</strong> {{$data->created_at->format('j F Y')}}
</p>
<div class="action-btn" style="display: -webkit-inline-box;">
<a class="btn btn-xs btn-gray" href="{{ route('siswa.show', $data->siswa->id) }}">Lihat</a>
<form action="{{route('apply.update', $data->siswa->id)}}" method="post" enctype="multipart/form-data" id="terima" data-name="{{$data->siswa->nama_lengkap}}">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <input type="hidden" name="status" value="Diterima">
	<button type="submit" class="btn btn-xs btn-success" name="status" value="Diterima">Terima</button>
</form>
<form action="{{route('apply.update', $data->siswa->id)}}" method="post" enctype="multipart/form-data" id="tolak" data-name="{{$data->siswa->nama_lengkap}}">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <input type="hidden" name="status" value="Ditolak">
	<button type="submit" class="btn btn-xs btn-danger" name="status" value="Ditolak" style="margin-left: 5px;">Tolak</button>
</form>
</div>
</div>
</div>
@endforeach
@else
<p class="p-custom">Masih Belum Ada Siswa Yang Mengajukan Untuk Sekarang.<hr></p>
@endif
<br><br><br>


<h3 class="alerts-title">Siswa Yang Diterima ({{$terima->count()}}) {{ ($dudi->jumlah == '0') ? 'Kuota Terpenuhi' : '' }}</h3>
@if($terima->count() > 0)
@foreach($terima as $data)
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb img-pjuandudi" src="{{url('assets/img/users/siswa/', $data->siswa->foto)}}" alt="" style="width: 64px;height: 64px;"></a>
<div class="manager-info">
<div class="manager-name">
<h4 class="h4-pjuandudi"><i class="lni-user"></i><a href="#"> {{$data->siswa->nama_lengkap}}</a></h4>
<p class="pcus-pengajuandudi"><i class="lni-laptop"></i> {{$data->siswa->jurusan->nama_jurusan}} <span style="color: red;">({{$data->siswa->kelas}})</span></p>
<p class="pcus-pengajuandudi"><i class="lni-home"></i> {{$data->siswa->alamat}}</p>
</div>
<div class="manager-meta">
<span class="rate"><i class="lni-alarm-clock"></i> {{$data->siswa->sekolah}}</span>
</div>
</div>
</div>
<div class="update-date">
<p class="status">
<strong>Diajukan tanggal :</strong> {{$data->created_at->format('j F Y')}}
</p>
<div class="action-btn">
    <a class="btn btn-xs btn-gray" href="{{ route('siswa.show', $data->siswa->id) }}">Lihat Profil</a>
	<a class="btn btn-xs btn-info">Hubungi</a>
</div>
</div>
</div>
@endforeach
@else
<p class="p-custom" style="color: #ccc;">Data siswa yang diterima akan ditampilkan disini.<hr></p>
@endif
<br><br>


<h3 class="alerts-title" style="color: red;">Siswa Yang Ditolak ({{$tolak->count()}})</h3>
@if($tolak->count() > 0 )
@foreach($tolak as $data)
<div class="manager-resumes-item">
<div class="manager-content">
<a href="resume.html"><img class="resume-thumb img-pjuandudi" src="{{url('assets/img/users/siswa/', $data->siswa->foto)}}" alt="" style="width: 64px;height: 64px;"></a>
<div class="manager-info">
<div class="manager-name">
<h4 class="h4-pjuandudi"><i class="lni-user"></i><a href="#"> {{$data->siswa->nama_lengkap}}</a></h4>
<p class="pcus-pengajuandudi"><i class="lni-laptop"></i> {{$data->siswa->jurusan->nama_jurusan}} <span style="color: red;">({{$data->siswa->kelas}})</span></p>
<p class="pcus-pengajuandudi"><i class="lni-home"></i> {{$data->siswa->alamat}}</p>
</div>
<div class="manager-meta">
<span class="rate"><i class="lni-alarm-clock"></i> {{$data->siswa->sekolah}}</span>
</div>
</div>
</div>
<div class="update-date">
<p class="status">
<strong>Diajukan tanggal :</strong> {{$data->created_at->format('j F Y')}}
</p>
<div class="action-btn" style="display: -webkit-inline-box;">
    <a class="btn btn-xs btn-gray" href="{{ route('siswa.show', $data->siswa->id) }}">Lihat Profil</a>
    <form action="{{route('apply.destroy', $data->id)}}" method="post">
      {{csrf_field()}}
      {{method_field('delete')}}
      <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus data pengajuan ini?')">Hapus</button>
    </form>
</div>
</div>
</div>
@endforeach
@else
<p class="p-custom" style="color: #ccc;">Data siswa yang ditolak akan ditampilkan disini.<hr></p>
@endif

<!-- <a class="btn btn-common btn-sm" href="add-resume.html">Add new resume</a> -->
</div>
</div>
</div>
</div>
</div>

@section('js')

<script type="text/javascript">

	$('#terima').on('submit', function(e){
	var name = $(this).data('name');
    var form = this;
    e.preventDefault();
    swal({
      title: 'Terima siswa '+name+' ?',
      text: 'Setelah mengklik tombol "Terima", status pengajuan tidak akan bisa diubah kembali.',
      type: 'info',
      showCancelButton: true,
      showCloseButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Terima'
    }).then((result) => {
      if (result.value) {
        return form.submit();
      }
    })
});

	$('#tolak').on('submit', function(e){
	var name = $(this).data('name');
    var form = this;
    e.preventDefault();
    swal({
      title: 'Tolak siswa '+name+' ?',
      text: 'Setelah mengklik tombol "Tolak", status pengajuan tidak akan bisa diubah kembali.',
      type: 'warning',
      showCancelButton: true,
      showCloseButton: true,
      confirmButtonColor: '#fb841d',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tolak'
    }).then((result) => {
      if (result.value) {
        return form.submit();
      }
    })
});

</script>

@stop

@endsection

