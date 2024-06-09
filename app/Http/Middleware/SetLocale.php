<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (Session::has('locale') && in_array(Session::get('locale'), config('app.locales'))) {
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
