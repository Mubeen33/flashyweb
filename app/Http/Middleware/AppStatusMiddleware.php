<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Application;

class AppStatusMiddleware
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
        $data = Application::where('type', 'site')->first();
        if ($data && intval($data->active_mood) === 0) {
            //under maintainance
            return redirect()->route('frontend.application.get');
        }
        return $next($request);
    }
}
