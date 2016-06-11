@extends('layouts.app')

@section('content')

  <div class="container goals-admin">

    <div class="match">

      <form method="POST" action="{{ route('admin.goals.update', $goal->id) }}">

	<input type="hidden" name="_method" value="PUT">

	@include('admin.goals.form')

        <button class="btn btn-action">
          Save
        </button>

      </form>

    </div>

  </div>

@endsection
