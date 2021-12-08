@extends('layouts.layout')
@section('content')

</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Create Your Account</h3>
</div>
</div>
</div>
</div>
</div>


<section id="content" class="section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-6 col-xs-12">
<div class="page-login-form box">
<h3>
Create Your account
</h3>
<form class="login-form" action="{{route('register')}}" method="POST">
    {{csrf_field()}}
<div class="form-group">
<div class="input-icon">
<i class="lni-user"></i>
<input type="text" class="form-control" name="username" value="{{ old('username') }}" required="required" placeholder="Username" style="padding-bottom: 13px;
    padding-top: 13px;">
@if($errors->has('username'))
<div class="help-block">
    <strong>{{ $errors->first('username')}}</strong>
</div>
@endif
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-envelope"></i>
<input type="text" class="form-control" name="email"  value="{{old('email')}}" required="" placeholder="Email Address" style="padding-bottom: 13px;
    padding-top: 13px;">
@if($errors->has('email'))
<div class="help-block">
    <strong>{{ $errors->first('email')}}</strong>
</div>
@endif
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" name="password" class="form-control" placeholder="Password" style="padding-bottom: 13px;
    padding-top: 13px;">
@if($errors->has('password'))
<div class="help-block">
    <strong>{{ $errors->first('password')}}</strong>
</div>
@endif
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-unlock"></i>
<input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password" style="padding-bottom: 13px;
    padding-top: 13px;">
</div>
</div>
<div class="form-group">
    <div class="input-icon">
        <i class="lni-user"></i>
        <select class="form-control" name="level" required="" style="padding-top: 13px;height: 100%;padding-bottom: 13px;">
            <option selected="true" disabled="">--Pilih Mau Jadi Apa!--</option>
            <option value="dudi">DU/DI</option>
            <option value="siswa">Siswa</option>
        </select>
        @if($errors->has('level'))
        <div class="help-block">
            <strong>{{ $errors->first('level')}}</strong>
        </div>
        @endif
    </div>
</div>
<br>
<p>By registering you accept and agree to be bound by the following <a href="#">terms and conditions</a>. 
</p>
<button class="btn btn-common log-btn mt-3">Register</button>
<p class="text-center">Already have an account?<a href="{{route('login')}}"> Sign In</a></p>
</form>
</div>
</div>
</div>
</div>
</section>

@endsection
