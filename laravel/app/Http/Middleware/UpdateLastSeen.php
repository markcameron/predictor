<?php namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Auth;

class UpdateLastSeen {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$continue = $next($request);

    if (Auth::check()) {
      $user = $request->user();
      $user->last_seen = Carbon::now();
      $user->save();
    }

    return $continue;
	}

}
