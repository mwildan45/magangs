<div class="col-lg-4 col-md-12 col-xs-12">
<div class="right-sideabr">
<h4>Atur Akun Kamu</h4>
<ul class="list-item">
<li><a href="{{route('data.index')}}">Data Diri Saya</a></li>
<li><a href="{{ url('/data/siswa/data-application') }}">Lihat Pengajuan</a></li>
<li><a href="{{url('/data/siswa/notification')}}">Notifikasi <span class="notinumber">{{$ncount}}</span></a></li>
<li><a href="{{url('/data/siswa/bookmark')}}">Bookmarked Magang</a></li>
<li><a href="{{route('siswa.edit', $siswa->id)}}">Atur Data Diri</a></li>
<li><a href="index-2.html">Sing Out</a></li>
</ul>
</div>
</div>