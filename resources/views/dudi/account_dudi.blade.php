@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Account</h3>
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
<div class="col-lg-12 col-md-12 col-xs-12">
<div class="job-alerts-item">

<h3 class="alerts-title" style="border-bottom: 1px solid #ccc;padding-bottom: 20px;">Edit Data Instansi/Perusahaan</h3>
<form action="{{route('data.update', $dudi->detail_dudi->id)}}" method="POST" class="form" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('put') }}
<div class="form-group is-empty">
<label class="control-label">Nama Perusahaan</label>
<input class="form-control" type="text" name="nama" value="{{$dudi->detail_dudi->nama_perusahaan}}">
<span class="material-input"></span>
</div>
<div class="form-group is-empty">
<label class="control-label">Alamat Utama</label>
<textarea class="form-control" name="alamat">{{$dudi->detail_dudi->alamat}}</textarea>
<span class="material-input"></span>
</div>
<div class="form-group is-empty">
<label class="control-label">Deskripsi</label>
<textarea class="form-control" name="deskripsi">{{$dudi->detail_dudi->deskripsi}}</textarea>
<span class="material-input"></span>
</div>
<div class="form-group is-empty">
<label class="control-label">Situs Web</label>
<input class="form-control" type="text" name="situs" value="{{$dudi->detail_dudi->situs_web}}">
<span class="material-input"></span>
</div>
@if($dudi->detail_dudi->logo)
	<img src="{{url('assets/img/users/dudi', $dudi->detail_dudi->logo )}}" id="showgambar" alt="image" style="width:150px; height: 150px; margin-bottom: 10px;">
@else
	<img src="{{url('assets/img/default.png')}}" id="showgambar" style="width: 150px; height: 150px; margin-bottom: 10px;">
@endif
<div class="custom-file mb-3{{ $errors->has('logo') ? ' has-error' : '' }}">
<label class="control-label">Logo</label>
<input type="file" name="logo" class="custom-file-input" id="validatedCustomFile" value="{{$dudi->detail_dudi->logo}}">
<label class="custom-file-label form-control" for="validatedCustomFile">Pilih Logo yang Baru...</label>
<div class="invalid-feedback">Example invalid custom file feedback</div>
 @if ($errors->has('logo'))
    <div class="help-block">
        <strong>{{ $errors->first('logo') }}</strong>
    </div>
@endif
</div>

<button type="submit" id="submit" class="btn btn-common">Save Change</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


@section('js')

<script type="text/javascript">
	function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#validatedCustomFile").change(function () {
        readURL2(this);
    });
</script>

@stop
@endsection