<div class="col-lg-4 col-md-12 col-xs-12">
<div class="right-sideabr">
<h4>Atur Akun</h4>
<ul class="list-item">
<li><a href="{{route('data.index')}}">Detail Tempat Anda</a></li>
<li><a href="{{URL::to('/data/dudi/data-resume')}}">Data Pengajuan Siswa <span class="notinumber">{{$cSubmission}}</span></a></li>
<li><a href="{{route('dudi.edit', $dudi->id)}}">Atur Info Pendaftaran</a></li>
<li><a href="{{URL::to('/data/dudi/edit-account')}}">Edit Informasi</a></li>
<li><a href="{{URL::to('/data/dudi/list-application')}}">Daftar Pendaftaran</a></li>
<li><a href="index-2.html">Sing Out</a></li>
</ul>
</div>
</div>

