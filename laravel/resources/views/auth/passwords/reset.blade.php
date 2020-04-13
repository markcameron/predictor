@extends('layouts.app')

@section('styles')
  <link href="/css/login.css" rel="stylesheet">
@stop

@section('content')

  <div class="container">
    <div class="row">

      <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-bottom">
          <form role="form" method="POST" action="{{ url('password/reset') }}" class="login-form">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="sr-only" for="email">E-Mail</label>
              <input type="text" name="email" placeholder="E-Mail" class="form-email form-control" id="form-email" value="{{ $email or old('email') }}">
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="sr-only" for="password">New Passord</label>
              <input type="password" name="password" placeholder="New Passord" class="form-password form-control" id="form-password">
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

            <button type="submit" class="btn">Change Password</button>

          </form>
        </div>
      </div>

    </div>
  </div>

@endsection
