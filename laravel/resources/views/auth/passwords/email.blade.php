@extends('layouts.app')

@section('styles')
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@stop

@section('content')

  <div class="container">
    <div class="row">

      <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-bottom">

          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          <form role="form" method="POST" action="{{ url('password/email') }}" class="login-form">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="sr-only" for="email">E-Mail</label>
              <input type="text" name="email" placeholder="E-Mail" class="form-email form-control" id="form-email" value="{{ $email or old('email') }}">
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <button type="submit" class="btn">E-Mail new password</button>

          </form>

        </div>
      </div>

    </div>
  </div>

@endsection
