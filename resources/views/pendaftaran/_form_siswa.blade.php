{{csrf_field()}}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label class="control-label">NIS</label>
<input type="text" class="form-control" name="nis" value="{{ old('nis') }}" placeholder="Tulis NIS kamu disini" required="">
@if ($errors->has('nis'))
   <span class="help-block">
        <strong>{{ $errors->first('nis') }}</strong>
    </span>
@endif
</div>
<div class="form-group">
<label class="control-label">Nama Lengkap</label>
<input type="text" class="form-control" name="nama_lengkap" placeholder="Tulis nama lengkap" required="">
@if ($errors->has('nama_lengkap'))
   <span class="help-block">
        <strong>{{ $errors->first('nama_lengkap') }}</strong>
    </span>
@endif
</div>
<div class="form-group">
<label class="control-label">Alamat</label>
<textarea class="form-control" name="alamat" placeholder="Tulis alamat tempat tinggal" required=""></textarea>
@if ($errors->has('alamat'))
   <span class="help-block">
        <strong>{{ $errors->first('alamat') }}</strong>
    </span>
@endif
</div>
<div class="form-group job-search-form" style="margin-top: 0;">
<label class="control-label">Jenis Kelamin</label>
<div class="search-category-container">
<label class="styled-select" style="padding: 0;">
<select class="form-control" name="jk" required="">
<option value="L">Laki-laki</option>
<option value="P">Perempuan</option>
</select>
</label>
</div>
@if ($errors->has('jk'))
   <span class="help-block">
        <strong>{{ $errors->first('jk') }}</strong>
    </span>
@endif
</div>
<div class="form-group">
<label class="control-label">Sekolah</label>
<input type="text" class="form-control" placeholder="Tulis nama sekolahmu" name="sekolah" required="">
<!-- <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p> -->
@if ($errors->has('sekolah'))
   <span class="help-block">
        <strong>{{ $errors->first('sekolah') }}</strong>
    </span>
@endif
</div>
<div class="row">
<div class="col-6">
<div class="form-group job-search-form" style="margin-top: 0;">
<label class="control-label">Kelas</label>
<div class="search-category-container">
<label class="styled-select" style="padding: 0;">
<select class="form-control" name="kelas" required="">
<option value="XII">XII (12)</option>
<option value="XI">XI (11)</option>
<option value="X">X (10)</option>
</select>
</label>
</div>
@if ($errors->has('kelas'))
   <span class="help-block">
        <strong>{{ $errors->first('kelas') }}</strong>
    </span>
@endif
</div>	
</div>
<div class="col-6">
<div class="form-group job-search-form" style="margin-top: 0;">
<label class="control-label">Jurusan</label>
<div class="search-category-container">
<label class="styled-select" style="padding: 0;">
<select class="form-control" name="jurusan" required="">
<option disabled selected>--Pilih Jurusan--</option>
@foreach($jurusans as $jurs)
<option value="{{$jurs->id}}">{{$jurs->nama_jurusan}} ({{$jurs->tag}})</option>
@endforeach
</select>
</label>
</div>
@if ($errors->has('jurusan'))
   <span class="help-block">
        <strong>{{ $errors->first('jurusan') }}</strong>
    </span>
@endif
</div>	
</div>
</div>

<div class="form-group">
<label class="control-label">Tentang Kamu</label>
<textarea name="tentang" class="form-control"></textarea>
<p>contoh: tahu tentang php, masak, mahir mtk dll.</p>
@if ($errors->has('tentang'))
   <span class="help-block">
        <strong>{{ $errors->first('tentang') }}</strong>
    </span>
@endif
</div>
<div class="form-group">
<label class="control-label">No.HP</label>
<input type="text" class="form-control" name="no_hp" placeholder="Masukkan no.hp kamu">
@if ($errors->has('no_hp'))
   <span class="help-block">
        <strong>{{ $errors->first('no_hp') }}</strong>
    </span>
@endif
</div>
<div class="form-group">
<label class="control-label">Foto Profil Kamu</label><br>
@if(Auth::user()->gambar)
	<img src="{{url('assets/images/user', $Auth::user()->gambar )}}" id="showgambar" alt="image" style="width:150px; height: 150px; margin-bottom: 10px;">
@else
	<img src="{{url('assets/img/default.png')}}" id="showgambar" style="width: 150px; height: 150px; margin-bottom: 10px;">
@endif
<div class="custom-file mb-3">
<label class="control-label">Foto</label>
<input type="file" name="foto" class="custom-file-input" id="validatedCustomFile" required>
<label class="custom-file-label form-control" for="validatedCustomFile">Pilih Foto Kamu...</label>
<div class="invalid-feedback">Example invalid custom file feedback</div>
@if ($errors->has('foto'))
   <span class="help-block">
        <strong>{{ $errors->first('foto') }}</strong>
    </span>
@endif
</div>
</div>
<input type="hidden" name="siswa" value="{{Auth::user()->level}}">
<center>
	<input type="submit" class="btn btn-common" value="Submit Sekarang!" style="margin-top: 30px;">
</center>


