<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    $user = $request->user();
    if (isset($user)) {
      if ($request->user()->admin_status == 1) {
        return $next($request);
      }else {
        return redirect('/home');
      }
    }else {
      return redirect('/home');
    }

  }
}
