@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Bookmarked Magang <br>Place</h3>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
@include('siswa._sidebar')
<div class="col-lg-8 col-md-6 col-xs-12">
<div class="job-alerts-item bookmarked">
<h3 class="alerts-title">Bookmarked Magang</h3>
@if($datas->count() > 0)
@foreach($datas->take(5) as $data)
<a class="job-listings" href="{{route('dudi.show', $data->dudi->id)}}">
<div class="row">
<div class="col-lg-4 col-md-12 col-xs-12">
<div class="job-company-logo">
<img src="{{url('assets/img/users/dudi', $data->dudi->detail_dudi->logo)}}" alt="" class="cusimg-bookmark">
</div>
<div class="job-details">
<h3>{{str_limit($data->dudi->judul, 17)}}</h3>
<span class="company-neme">
{{$data->dudi->detail_dudi->nama_perusahaan}}
</span>
</div>
</div>
<div class="col-lg-4 col-md-12 col-xs-12 text-right">
<div class="location cus-pl">
<i class="lni-map-marker"></i> {{str_limit($data->dudi->lokasi, 15)}}
</div>
</div>
<div class="col-lg-2 col-md-12 col-xs-12 text-right">
<span class="btn-full-time cus-pl">{{$data->created_at->format('j/m/Y')}}</span>
</div>
<div class="col-lg-2 col-md-12 col-xs-12 text-right">
<span class="btn-apply">Lihat</span>
</div>
</div>
</a>
@endforeach
@else
<p class="p-custom">Belum ada Bookmark.</p>
@endif
<br><br>

{{$datas->links("pagination::default")}}

</div>
</div>
</div>
</div>
</div>

@endsection