@extends('layouts.app')

@section('styles')
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@stop

@section('content')

  <div class="container">
    <div class="row">

      <div class="col-sm-6 col-sm-offset-3 form-box">

        <div class="form-bottom">
          <form role="form" method="POST" action="{{ url('/register') }}" class="login-form">

            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <label class="sr-only" for="first_name">First Name</label>
              <input type="text" name="first_name" placeholder="First Name" class="form-username form-control" id="form-first-name" value="{{ old('first_name') }}">
	      @if ($errors->has('first_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('first_name') }}</strong>
                </span>
              @endif
            </div>

	    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label class="sr-only" for="last_name">Last Name</label>
              <input type="text" name="last_name" placeholder="Last Name" class="form-last-name form-control" id="form-last-name" value="{{ old('last_name') }}">
	      @if ($errors->has('last_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('last_name') }}</strong>
                </span>
              @endif
	    </div>

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

	    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label class="sr-only" for="password_confirmation">Confirm Password</label>
              <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-password-confirmation form-control" id="form-password-confirmation" value="{{ old('password_confirmation') }}">
	      @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
              @endif
            </div>

	    <button type="submit" class="btn">Register</button>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
