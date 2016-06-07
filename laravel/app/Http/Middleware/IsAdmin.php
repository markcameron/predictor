<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin {

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next) {
    if (!Auth::check()) {
      if ($request->ajax() || $request->wantsJson()) {
        return response('Unauthorized.', 401);
      } else {
        return redirect()->guest('login');
      }
    }

    $user = Auth::user();
    if (!$user->is_admin) {
      if ($request->ajax() || $request->wantsJson()) {
        return response('Unauthorized.', 401);
      } else {
        return redirect()->guest('login');
      }
    }

    return $next($request);
  }

}
