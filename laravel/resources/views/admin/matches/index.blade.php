@extends('layouts.app')

@section('content')

  <div class="container goals-admin">

    <div class="matches">

      @foreach ($matches as $match)

	<div class="row">
	  <div class="col-xs-7">
	    {{ $match->home_team }} - {{ $match->away_team }}
	  </div>
	  <div class="col-xs-2 text-center">
	    {{ $match->score_home }} - {{ $match->score_away }}
	  </div>
	  <div class="col-xs-3 text-right">
	    <a class="btn btn-action" href="{{ route('admin.matches.edit', $match->id) }}">
	      Edit
	    </a>
	  </div>
	</div>

      @endforeach

    </div>

  </div>

@endsection
