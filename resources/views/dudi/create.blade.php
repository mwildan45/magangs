@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/additional/checkbox.css')}}">

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

<style type="text/css">
    input[type=file]{
      display: inline;
    }
    #image_preview{
        border: 2px solid #26ae61;
        padding: 10px;
        border-radius: 10px;
        margin: 10px 0 20px 0;
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }
  </style>

@stop

@extends('layouts.layout')
@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Daftar</h3>
</div>
</div>
</div>
</div>
</div>


<section class="section">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-9 col-md-12 col-xs-12">
<div class="post-job box">
<h3 class="job-title text-center" style="font-weight: bold;font-size: 22px;">Isi Formulir Pendaftaran Siswa</h3>
<p style="text-align: center;margin-bottom: 40px !important;">Section ini berguna untuk mengisi data formulir penerimaan siswa. Anda bisa langsung mempostingnya atau ditunda sampai waktu yang anda tentukan.</p>
<form method="POST" action="{{ route('dudi.store') }}" enctype="multipart/form-data" class="form-ad">
@include('dudi._form')
</form>
</div>
</div>
</div>
</div>
</section>




@endsection

@section('js')
<!-- <script type="text/javascript" src="{{asset('assets/js/imageuploadify.min.js')}}')}}"></script>

<script type="text/javascript">
            $(document).ready(function() {
                $('input[type="file"]').imageuploadify();
            })
        </script>
--><!-- 
<script type="text/javascript" src="{{asset('assets/js/dropzone.min.js')}}')}}"></script> -->
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

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 3; //Input fields increment limitation
    var addButton = $('.add-button'); //Add button selector
    var wrapper = $('.search-category-container'); //Input field wrapper
    var fieldHTML = '<div class="styled-select add-more"><select class="dropdown-product selectpicker" name="jurusan[]" required=""><option disabled selected>--Pilih Jurusan--</option>@foreach($jurusans as $jurs)<option value="{{$jurs->id}}">({{$jurs->tag}}) {{$jurs->nama_jurusan}}</option>@endforeach</select><a href="javascript:void(0)" class="remove-button" style="float: right;padding: 10px;font-size: 25px;color: #f00;" title="Delete This Row"><i class="lni-close"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove-button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script type="text/javascript">
  $("#uploadFile").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("uploadFile").files.length;

     if (total_file>5) {
        alert('foto tidak boleh lebih dari 5.');
     }else{
        for(var i=0;i<total_file;i++)
         {
          $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
         }
     }
     


  });
</script>

<script type="text/javascript">

    
      function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showlogo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputlogo").change(function () {
        readURL1(this);
    });

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
<script type="text/javascript">
function minmax(value, min, max) 
{
    if(parseInt(value) < min || isNaN(parseInt(value))) 
        return min; 
    else if(parseInt(value) > max) 
        return max; 
    else return value;
}
</script>



@stop