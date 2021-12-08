{{csrf_field()}}

<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
<label class="control-label">Judul Magang</label>
<input type="text" class="form-control" placeholder="Tulis Judul Magang, ex. untuk jurusan RPL dll." name="judul" required="">
 @if ($errors->has('judul'))
    <div class="help-block">
        <strong>{{ $errors->first('judul') }}</strong>
    </div>
@endif
</div>
<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
<label class="control-label">Lokasi</label>
<textarea class="form-control" placeholder="Lokasi Magang" required="" name="lokasi" rows="4"></textarea>
 @if ($errors->has('lokasi'))
    <div class="help-block">
        <strong>{{ $errors->first('lokasi') }}</strong>
    </div>
@endif
</div>
<div class="row" style="margin-top: -40px;">
	<div class="col-lg-7 col-md-8 col-xs-12">
		<div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }} job-search-form">
		<label class="control-label">Jurusan</label>
		<div class="search-category-container">
		<div class="styled-select add-more">
		<select class="dropdown-product selectpicker" name="jurusan[]" required="">
		<option disabled selected>--Pilih Jurusan--</option>
		@foreach($jurusans as $jurs)
		<option value="{{$jurs->id}}">({{$jurs->tag}}) {{$jurs->nama_jurusan}}</option>
		@endforeach
		</select>
        <a href="javascript:void(0)" class="add-button" title="Add More"><i class="lni-plus"></i></a>
		</div>
		</div>
        <p>(Maksimal 3 Jurusan).</p>
		 @if ($errors->has('jurusan'))
		    <div class="help-block">
		        <strong>{{ $errors->first('jurusan') }}</strong>
		    </span>
		@endif
		</div>
	</div>
	<div class="col-lg-5 col-md-4 col-xs-12">
		<div class="form-group{{ $errors->has('jumlah') ? ' has-error' : '' }} job-search-form">
		<label class="control-label">Jumlah Siswa Yang Diterima</label>
		<input type="number" class="form-control" placeholder="Isi kuota siswa yang akan magang" name="jumlah" id="txtWeight" maxlength="5" onkeyup="this.value = minmax(this.value, 1, 100)" required="">
		<p style="margin:5px;">(Maksimal 100 anak)</p>
		 @if ($errors->has('jumlah'))
		    <div class="help-block">
		        <strong>{{ $errors->first('jumlah') }}</strong>
		    </span>
		@endif
		</div>	
	</div>
</div>
<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
<label class="control-label">Deskripsi</label>
<textarea name="deskripsi" id="editor" required=""></textarea><p>Deskripsikan keterangan, ketentuan magang, syarat-syarat magang ataupun hal-hal lain.</p>
 @if ($errors->has('deskripsi'))
    <div class="help-block">
        <strong>{{ $errors->first('deskripsi') }}</strong>
    </div>
@endif
</div>
<!-- <section id="editor">
<div id="summernote"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quia aut modi fugit, ratione saepe perferendis odio optio repellat dolorum voluptas excepturi possimus similique veritatis nobis. Provident cupiditate delectus, optio?</p></div>
</section> -->
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label class="control-label">Email Pengaplikasian</label>
<input type="text" class="form-control" placeholder="Email Pengaplikasian Siswa" name="email" required="">
<p>Berguna untuk mengirim pengajuan magang dari siswa</p>
 @if ($errors->has('email'))
    <div class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </div>
@endif
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <label class="control-label" for="dateNow">Tanggal Dimulai</label>
        <input type="date" name="date_begin" id="dateNow" class="form-control" placeholder="Atur tanggal dimulainya prakerind" required="">
        <p>(Atur tanggal dimulainya prakerind. Mohon untuk tidak mengatur tanggal yang sudah lewat dari tanggal sekarang).</p>
        @if ($errors->has('date_begin'))
            <div class="help-block">
                <strong>{{ $errors->first('date_begin') }}</strong>
            </div>
        @endif
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <label class="control-label">Tanggal Berakhir</label>
        <input type="date" name="date_end" class="form-control" placeholder="Atur tanggal dimulainya prakerind" required="">
        <p>(Atur tanggal sampai kapan prakerind berlangsung).</p>
        @if ($errors->has('date_end'))
            <div class="help-block">
                <strong>{{ $errors->first('date_end') }}</strong>
            </div>
        @endif
    </div>
</div>
<br>

<div class="can-toggle demo-rebrand-1">
  <input id="d" type="checkbox" name="status" value="Dibuka">
  <label for="d">
    <div class="can-toggle__label-text" style="
    font-size: 20px;
    font-weight: bold;
    padding: 2px;
    border-bottom: 1px solid #cacaca;">Status</div>
    <div class="can-toggle__switch" data-checked="Dibuka" data-unchecked="Ditutup"></div>
  </label>
  <p class="note" style="text-align: center;margin-top: 10px;">Silahkan klik tombol ini ke "Dibuka" jika ingin memposting tempat anda secara langsung. <br>(Dibuka = hijau).</p>
</div>

<div class="divider" style="margin-top: 60px;border-top: 2px solid #2d2d2d">
<h3 class="job-title" style="font-weight:bold; font-size:22px;text-align: center;">Detail Perusahaan</h3>
<p style="text-align: center;margin-bottom: 20px;">Section ini berguna untuk mengisi data-data tempat anda. Jadi anda tidak harus daftar ulang untuk membuka pengajuan baru.</p>
</div>
<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
<label class="control-label">Nama Perusahaan/Instansi</label>
<input type="text" class="form-control" placeholder="Tulis nama Perusahaan anda (wajib diisi)." name="nama" required="">
 @if ($errors->has('nama'))
    <div class="help-block">
        <strong>{{ $errors->first('nama') }}</strong>
    </div>
@endif
</div>
<div class="form-group{{ $errors->has('deskripsi_dudi') ? ' has-error' : '' }}">
<label class="control-label">Deskripsi <span>(optional)</span></label>
<textarea class="form-control" placeholder="Deskripsikan tempat anda." name="deskripsi_dudi" rows="7" required></textarea>
 @if ($errors->has('deskripsi_dudi'))
    <div class="help-block">
        <strong>{{ $errors->first('deskripsi_dudi') }}</strong>
    </div>
@endif
</div>
<div class="form-group{{ $errors->has('situs') ? ' has-error' : '' }}">
<label class="control-label">Situs WEB <span>(optional)</span></label>
<input type="text" class="form-control" placeholder="Tulis situs web" name="situs">
<p class="note">Jika tidak punya bisa dilewati. Namun sebaiknya diisi jika ada.</p>
 @if ($errors->has('situs'))
    <div class="help-block">
        <strong>{{ $errors->first('situs') }}</strong>
    </div>
@endif
</div>
<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
<label class="control-label">Alamat Utama</label>
<textarea class="form-control" placeholder="isi alamat utama tempat anda." name="alamat" required=""></textarea>
 @if ($errors->has('alamat'))
    <div class="help-block">
        <strong>{{ $errors->first('alamat') }}</strong>
    </div>
@endif
</div>
@if(Auth::user()->gambar)
	<img src="{{url('assets/images/user', $Auth::user()->gambar )}}" id="showgambar" alt="image" style="width:150px; height: 150px; margin-bottom: 10px;">
@else
	<img src="{{url('assets/img/default.png')}}" id="showgambar" style="width: 150px; height: 150px; margin-bottom: 10px;">
@endif
<div class="custom-file mb-3{{ $errors->has('logo') ? ' has-error' : '' }}">
<label class="control-label">Logo</label>
<input type="file" name="logo" class="custom-file-input" id="validatedCustomFile">
<label class="custom-file-label form-control" for="validatedCustomFile">Pilih Logo...</label>
<div class="invalid-feedback">Example invalid custom file feedback</div>
<label class="control-label">Foto Tempat Anda</label>
 @if ($errors->has('logo'))
    <div class="help-block">
        <strong>{{ $errors->first('logo') }}</strong>
    </div>
@endif
</div>
<br><br>
<div class="custom-file mb-3{{ $errors->has('nama') ? ' has-error' : '' }}">
<input type="file" id="uploadFile" name="foto[]" class="custom-file-input" multiple required>
<label class="custom-file-label form-control" for="validatedCustomFile">Pilih Foto Tempat... (Bisa lebih dari satu. Maks 5)</label>
 @if ($errors->has('foto'))
    <div class="help-block">
        <strong>{{ $errors->first('foto') }}</strong>
    </div>
@endif
</div>
<br/>
  
  <div id="image_preview"></div>

<!-- <input type="hidden" name="status" value="Dicari"> -->
<input type="hidden" name="dudi" value="{{Auth::user()->level}}">
<br><br><br>
<center>
<input type="submit" class="btn btn-common" value="Submit Tempat Anda!" id="dudi_acc">
	
</center>
