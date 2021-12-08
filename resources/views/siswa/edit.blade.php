@extends('layouts.layout')

@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Edit Information</h3>
</div>
</div>
</div>
</div>
</div>

<div class="section">
<div class="container">
<div class="row">
@include('siswa._sidebar')
<div class="col-md-8 col-sm-8 col-xs-12">
<div class="job-alerts-item">
<h3 class="alerts-title" style="border-bottom: 2px solid #ccc;padding-bottom: 5px;">Edit Data Diri</h3>
<form action="{{route('siswa.update', $siswa->id)}}" method="POST" class="form" enctype="multipart/form-data">
<div class="row">
<div class="col-6">
	{{ csrf_field() }}
	{{ method_field('put') }}
<div class="form-group is-empty">
<label class="control-label">NIS</label>
<input class="form-control" type="text" name="nis" value="{{$siswa->nis}}" required="">
<span class="material-input"></span>
 @if ($errors->has('nis'))
    <div class="help-block">
        <strong>{{ $errors->first('nis') }}</strong>
    </div>
@endif
</div>
<div class="form-group is-empty">
<label class="control-label">Alamat</label>
<textarea class="form-control" name="alamat" required="">{{$siswa->alamat}}</textarea>
<span class="material-input"></span>
</div>
<br>


</div>
<div class="col-6">
<div class="form-group is-empty">
<label class="control-label">Nama Lengkap</label>
<input class="form-control" type="text" name="nama" value="{{$siswa->nama_lengkap}}" required="">
<span class="material-input"></span>
</div>
<div class="form-group job-search-form">
<label class="control-label">Jenis Kelamin</label>
<div class="search-category-container">
<label class="styled-select">
<select name="jk" required="">
<option value="L" {{$siswa->jk === "L" ? "selected" : ""}}>Laki-laki</option>
<option value="P" {{$siswa->jk === "P" ? "selected" : ""}}>Perempuan</option>
</select>
</label>
</div>
</div>

<br>
</div>
</div>

<div class="form-group is-empty">
<label class="control-label">Sekolah</label>
<input class="form-control" type="text" name="sekolah" value="{{$siswa->sekolah}}" required="">
<span class="material-input"></span>
</div>
<div class="row">
<div class="col-6">
<div class="form-group job-search-form" style="margin-top: 0;">
<label class="control-label">Kelas</label>
<div class="search-category-container">
<label class="styled-select">
<select name="kelas" required="">
<option value="XII" {{$siswa->kelas === "xII" ? "selected" : ""}}>XII</option>
<option value="XI" {{$siswa->kelas === "XI" ? "selected" : ""}}>XI</option>
<option value="X" {{$siswa->kelas === "X" ? "selected" : ""}}>X</option>
</select>
</label>
</div>
</div>
</div>
<div class="col-6">
<div class="form-group job-search-form" style="margin-top: 0;">
<label class="control-label">Jurusan</label>
<div class="search-category-container">
<label class="styled-select">
<select name="jurusan_id" required="">
<option value="{{$siswa->jurusan->id}}" selected>{{$siswa->jurusan->nama_jurusan}}</option>
@foreach($jurusans as $jurs)
<option value="{{$jurs->id}}">{{$jurs->nama_jurusan}} ({{$jurs->tag}})</option>
@endforeach
</select>
</label>
</div>
</div>
</div>
</div>
<div class="form-group is-empty">
<label class="control-label">No.Telp</label>
<input class="form-control" type="text" name="no_hp" value="{{$siswa->no_hp}}" required="">
<span class="material-input"></span>
</div>
<div class="form-group is-empty">
<label class="control-label">Tentang Kamu</label>
<textarea class="form-control" name="tentang" required="">{!!$siswa->tentang!!}</textarea>
<span class="material-input"></span>
</div>
@if($siswa->foto)
	<img src="{{url('assets/img/users/siswa', $siswa->foto )}}" id="showgambar" alt="image" style="width:150px; height: 150px; margin-bottom: 10px;">
@else
	<img src="{{url('assets/img/default.png')}}" id="showgambar" style="width: 150px; height: 150px; margin-bottom: 10px;">
@endif
<div class="custom-file mb-3{{ $errors->has('logo') ? ' has-error' : '' }}">
<label class="control-label">Logo</label>
<input type="file" name="foto" class="custom-file-input" id="validatedCustomFile" value="{{$siswa->foto}}">
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
