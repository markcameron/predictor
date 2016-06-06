@extends('layouts.app')

@section('styles')
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@stop

@section('content')

  <div class="container">
    <div class="row">

      <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
          <div class="col-xs-6 social-login">
            <div class="social-login-buttons">
              <a class="btn btn-link-2" href="{{ url('login/facebook') }}">
                <i class="fa fa-facebook"></i> Facebook
              </a>
            </div>
          </div>
          <div class="col-xs-6 social-login">
            <div class="social-login-buttons">
              <a class="btn btn-link-2" href="{{ url('register') }}">
                Register
              </a>
            </div>
          </div>
        </div>
        <div class="form-bottom">
          <form role="form" method="POST" action="{{ url('/login') }}" class="login-form">

            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="sr-only" for="email">E-Mail</label>
              <input type="text" name="email" placeholder="E-Mail" class="form-email form-control" id="form-email" value="{{ old('email') }}">
	      @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="sr-only" for="password">Password</label>
              <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password" value="{{ old('password') }}">
	      @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>

            <button type="submit" class="btn">Login</button>

	    <div class="form-group forgot-password">
	      <a href="{{ url('password/reset') }}" class="pull-right">Forgot password?</a>
	    </div>
          </form>
        </div>
      </div>

    </div>
  </div>

@endsection
