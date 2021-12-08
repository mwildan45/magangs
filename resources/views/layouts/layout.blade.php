<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.uideck.com/items/thehunt/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 06:37:48 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="Grayrids">
<title>MagangS&trade; 2018</title>

<link href="{{asset('assets/img/icon.png')}}" rel="shortcut icon">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/line-icons.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}"><!--  -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
@section('css')
@show
</head>
<body onload="zoom()">

<header id="home" class="hero-area">

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
<div class="container">
<div class="theme-header clearfix">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('assets/img/logo1.png')}}" alt="" width="160px"></a>
</div>
<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto w-100 justify-content-end">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Jurusan
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="{{route('jurusan.index')}}">Lhat Di Semua Jurusan</a></li>
<li><a class="dropdown-item" href="{{route('jurusan.create')}}">Tambah Jurusan</a></li>
</ul>
</li>
<!-- <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Blog
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a></li>
<li><a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
<li><a class="dropdown-item" href="blog-full-width.html"> Blog full width</a></li>
<li><a class="dropdown-item" href="single-post.html">Blog Single Post</a></li>
</ul>
</li> -->
<li class="nav-item">
<a class="nav-link" href="{{route('dudi.index')}}">
Lihat Semua
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{URL::to('/contact')}}">
Kontak Kami
</a>
</li>
@guest
<li class="nav-item">
<a class="nav-link" href="{{route('login')}}">Sign In</a>
</li>
<li class="button-group">
<a href="{{route('data.index')}}" class="button btn btn-common">Posting Tempat</a>
</li>
@else
<li class="nav-item dropdown active">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{ Auth::user()->username }}
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="{{route('data.index')}}">Akun</a></li>
@if(Auth::user()->level == 'dudi')
<li><a class="dropdown-item" href="{{URL::to('/data/dudi/data-resume')}}">Lihat Daftar Pengajuan</a></li>
@else
<li><a class="dropdown-item" href="{{URL::to('/data/siswa/notification')}}">Notifikasi<!--  <span class="notinumber">2</span> --></a></li>
@endif
<li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></a></li>
</ul>
</li>

@if(Auth::user()->level == 'dudi')
<li class="button-group">
<a href="{{route('data.index')}}" class="button btn btn-common">Posting Tempat</a>
</li>
@else
<li class="button-group">
<a href="{{route('dudi.index')}}" class="button btn btn-common">Cari Tempat</a>
</li>
@endif
@endguest
</ul>
</div>
</div>
</div>
<div class="mobile-menu" data-logo="{{asset('assets/img/logo-mobile.png')}}"></div>
</nav>

@yield('content')

<footer>

<section class="footer-Content">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-xs-12">
<div class="widget">
<div class="footer-logo mb-2"><center><img src="{{asset('assets/img/logo_smk.png')}}" alt="" style="width: 25%;height: 25%;"><h3 class="block-title" style="margin-top: 20px;">SMKN 2 Mojokerto</h3></center></div>
<div class="textwidget">
<p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
</div>
<ul class="mt-3 footer-social">
<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
<li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
<li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
<li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
</ul>
</div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<div class="widget">
<h3 class="block-title">Quick Links</h3>
<ul class="menu">
<li><a href="#">About Us</a></li>
<li><a href="#">Support</a></li>
<li><a href="#">License</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#">Contact</a></li>
</ul>
</div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<div class="widget">
<h3 class="block-title">All Navigation</h3>
<ul class="menu">
<li><a href="#">Front-end Design</a></li>
<li><a href="#">Android Developer</a></li>
<li><a href="#">CMS Development</a></li>
<li><a href="#">IOS Developer</a></li>
<li><a href="#">Iphone Developer</a></li>
</ul>
</div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12">
<div class="widget">
<h3 class="block-title">Address</h3>
<ul class="contact-list">
<li><i class="lni-phone-handset"></i> <span><a href="https://wa.me/6281559567884">+62-8155-9567-884</a> <br> +62-8151-5787-455 </span></li>
<li><i class="lni-envelope"></i> <span>apaaja99x@gmail.com</a></span></li>
<li><i class="lni-map-marker"></i> <span>61484 Kesamben, Jombang, Indonesia.</span></li>
</ul>
</div>
</div>
 </div>
</div>
</section>


<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info text-center">
<p>Designed and Developed by <a href="https://youtube.com/" rel="nofollow">M.Wildan A.S. - XII RPL 1</a></p>
</div>
</div>
</div>
</div>
</div>

</footer>


<a href="#" class="back-to-top">
<i class="lni-arrow-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


<script data-cfasync="false" src="{{asset('assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
@include('sweetalert::alert')
@section('js')
@show

<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
</script>


<!-- What are you looking for? -->
</html>