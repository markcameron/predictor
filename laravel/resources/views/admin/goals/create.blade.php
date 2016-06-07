@extends('layouts.app')

@section('content')

  <div class="container goals-admin">

    <div class="match">

      <form method="POST" action="{{ route('admin.goals.store') }}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="match_id" value="{{ $request->match_id }}">
	<input type="hidden" name="team" value="{{ $request->team }}">

        <div class="row">
          <div class="col-xs-12">
            <input type="number" name="minute">
          </div>
          <div class="col-xs-12">
            <input type="text" name="scored_by">
          </div>
          <div class="col-xs-12">
            <input type="text" name="link">
          </div>
        </div>

        <button class="btn btn-action">
          Save
        </button>

      </form>

    </div>

  </div>

@endsection
