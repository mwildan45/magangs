@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Notifications</h3>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
@include('siswa._sidebar')
<div class="col-md-8 col-sm-8 col-xs-12">
<div class="job-alerts-item notification">
<h3 class="alerts-title">Notifikasi</h3>
@if($datas->count() > 0)
@foreach($datas->take(7) as $data)
<div class="notification-item">
<div class="thums">
<img src="{{url('assets/img/users/dudi', $data->dudi->detail_dudi->logo)}}" alt="" class="cus-nf">
</div>
<div class="text-left">
<p style="color: #544444;">{!!$data->isi!!}</p>
<span class="time"><i class="lni-alarm-clock"></i>{{$data->created_at->format('h:i - d M Y')}}</span>
</div>
</div>
@endforeach
@else
<p class="p-custom">Belum ada notifikasi</p>
@endif

{{$datas->links("pagination::default")}}

</div>
</div>
</div>
</div>
</div>


@endsection