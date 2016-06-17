@extends('layouts.app')

@section('content')

  <div class="container goals-admin">

    <div class="match">

      <div class="row">
	<a href="{{ url('admin/matches') }}" class="btn btn-action">Match List</a>
      </div>

      <form method="POST" action="{{ route('admin.matches.update', $match->id) }}">

	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
          <div class="col-xs-6">
            {{ $match->teamHome->name }}
          </div>
          <div class="col-xs-6">
            {{ $match->teamAway->name }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <input type="number" name="score_home" value="{{ $match->score_home }}">
          </div>
          <div class="col-xs-6">
            <input type="number" name="score_away" value="{{ $match->score_away }}">
          </div>
        </div>

        <button class="btn btn-action">
          Save
        </button>

      </form>

      <div class="row">
        <div class="col-xs-6">
          @foreach ($match->goalsHome as $goal)
	    <div class="col-xs-12">
	      {{ $goal->minute }} - {{ $goal->scored_by }}{{ !empty($goal->link) ? ' - L' : '' }}
	      <a href="{{ route('admin.goals.edit', $goal->id) }}" class="btn btn-action btn-sm">
		Edit
	      </a>
	    </div>
	  @endforeach
	</div>
        <div class="col-xs-6">
          @foreach ($match->goalsAway as $goal)
	    <div class="col-xs-12">
	      {{ $goal->minute }} - {{ $goal->scored_by }}{{ !empty($goal->link) ? ' - L' : '' }}
	      <a href="{{ route('admin.goals.edit', $goal->id) }}" class="btn btn-action">
		Edit
	      </a>
	    </div>
	  @endforeach
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <a class="btn btn-action" href="{{ route('admin.goals.create', ['team' => 'home', 'match_id' => $match->id]) }}">
	    Add Home Goal
	  </a>
        </div>
        <div class="col-xs-6">
          <a class="btn btn-action" href="{{ route('admin.goals.create', ['team' => 'away', 'match_id' => $match->id]) }}">
	    Add Away Goal
	  </a>
        </div>
      </div>

    </div>

  </div>

@endsection
