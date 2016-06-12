<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="match_id" value="{{ isset($goal->match_id) ? $goal->match_id : $request->match_id }}">
<input type="hidden" name="team" value="{{ isset($goal->team) ? $goal->team : $request->team }}">

<div class="row">
  <div class="col-xs-12">
    <input type="number" name="minute" value="{{ isset($goal->minute) ? $goal->minute : '' }}">
  </div>
  <div class="col-xs-12">
    <input type="text" name="scored_by" value="{{ isset($goal->scored_by) ? $goal->scored_by : '' }}">
  </div>
  <div class="col-xs-12">
    <input type="text" name="link" value="{{ isset($goal->link) ? $goal->link : '' }}">
  </div>
</div>
