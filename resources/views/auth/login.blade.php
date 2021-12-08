@extends('layouts.layout')

@section('content')


</header>


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Login</h3>
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
Login
</h3>
<form action="{{route('login')}}" method="POST" class="login-form">
    {{ csrf_field() }}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<div class="input-icon">
<i class="lni-user"></i>
<input type="text" id="sender-email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus style="padding-bottom: 13px;
    padding-top: 13px;">
</div>
@if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" class="form-control" name="password" required placeholder="Password" style="padding-bottom: 13px;
    padding-top: 13px;">
</div>
 @if ($errors->has('password'))
    <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif
</div>
<div class="form-group form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
<label class="form-check-label" for="exampleCheck1">Keep Me Signed In</label>
 </div>
 <div class="form-group">
   @if (Request::has('previous'))
        <input type="hidden" name="previous" value="{{ Request::get('previous') }}">
    @else
        <input type="hidden" name="previous" value="{{ URL::previous() }}">
    @endif
</div>
<button class="btn btn-common log-btn">Login</button>
</form>
<ul class="form-links">
<li class="text-center">
<div class="post-header">
<p>Don't have an account? <a href="{{route('register')}}">Click here to register</a></p>
</div>
</li>
<li class="text-center"><a href="{{ route('password.request') }}">Or forgot your password?</a></li>
</ul>
</div>
</div>
</div>
</div>
</section>
<br><br>


@endsection

