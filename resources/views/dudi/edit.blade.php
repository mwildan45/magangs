@section('css')

  <link rel="stylesheet" href="{{asset('assets/additional/css/froala_editor.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/froala_style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/code_view.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/draggable.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/colors.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/emoticons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/image_manager.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/image.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/line_breaker.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/table.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/char_counter.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/video.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/fullscreen.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/file.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/quick_insert.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/help.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/third_party/spell_checker.css')}}">
  <link rel="stylesheet" href="{{asset('assets/additional/css/plugins/special_characters.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('assets/additional/checkbox.css')}}">

@stop

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
<div class="col-md-8 col-sm-8 col-xs-12">
<div class="job-alerts-item">
<h3 class="alerts-title">Preview Resubmition</h3>
<form action="{{route('dudi.update', $dudi->id)}}" method="POST" class="form" enctype="multipart/form-data">
<div class="row">
<div class="col-6">
	{{ csrf_field() }}
	{{ method_field('put') }}
<div class="form-group is-empty">
<label class="control-label">Judul</label>
<input class="form-control" type="text" name="judul" value="{{$dudi->judul}}">
<span class="material-input"></span>
</div>
<div class="form-group is-empty">
<label class="control-label">Lokasi</label>
<textarea class="form-control" name="lokasi">{{$dudi->lokasi}}</textarea>
<span class="material-input"></span>
</div>
<div class="form-group is-empty">
<label class="control-label">Jumlah Anak</label>
<input class="form-control" type="text" name="jumlah" value="{{$dudi->jumlah}}">
<span class="material-input"></span>
</div>
</div>
<div class="col-6">
<div class="form-group is-empty">
<label class="control-label">Email Pengaplikasian</label>
<input class="form-control" type="text" name="email" value="{{$dudi->email}}">
<span class="material-input"></span>
</div>
@foreach($dudi->multi_jurusan as $mul)
<div class="form-group job-search-form">
<label class="control-label">Jurusan</label>
<div class="search-category-container">
<label class="styled-select">
<select name="jurusan_id[]" required="">
<option value="{{$mul->jurusan->id}}" selected>{{$mul->jurusan->nama_jurusan}} ({{$mul->jurusan->tag}})</option>
@foreach($jurusans as $jurs)
<option value="{{$jurs->id}}">{{$jurs->nama_jurusan}} ({{$jurs->tag}})</option>
@endforeach
</select>
</label>
</div>
</div>
<input type="hidden" name="id[]" value="{{$mul->id}}">
@endforeach
<br>
<div class="can-toggle demo-rebrand-1">
  <input id="d" type="checkbox" name="status" value="{{$dudi->status}}" {{($dudi->status == 'Ditutup') ? '' : 'checked' }}>
  <label for="d">
    <div class="can-toggle__label-text" style="
    font-size: 20px;
    font-weight: bold;
    padding: 2px;
    border-bottom: 2px solid #cacaca;">Status</div>
    <div class="can-toggle__switch" data-checked="Dibuka" data-unchecked="Ditutup"></div>
  </label>
  <p class="note">Status dimana postingan tempat anda akan ditunjukkan atau tidak.</p>
</div>
</div>
</div>
<div class="form-group is-empty">
<label class="control-label">Deskripsi</label>
<textarea id="editor" name="deskripsi">{!!$dudi->deskripsi!!}</textarea>
<span class="material-input"></span>
</div>
<button type="submit" id="submit" class="btn btn-common">Save Change</button>
</form>
</div>
</div>
</div>
</div>
</div>

@endsection

@section('js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="{{asset('assets/additional/js/froala_editor.min.js')}}" ></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/align.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/char_counter.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/code_beautifier.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/code_view.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/colors.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/draggable.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/emoticons.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/entities.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/font_size.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/font_family.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/fullscreen.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/line_breaker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/inline_style.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/link.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/lists.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/paragraph_format.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/quick_insert.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/table.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/url.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/help.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/special_characters.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/additional/js/plugins/word_paste.min.js')}}"></script>

  <script>
    $(function(){
      $('#editor').froalaEditor()
    });
  </script>



@stop