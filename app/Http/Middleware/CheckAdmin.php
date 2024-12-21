<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role != 1) {
            return redirect('home')->withErrors(['access' => 'У вас нет прав для выполнения этого действия.']);
        }

        return $next($request);
    }
}
