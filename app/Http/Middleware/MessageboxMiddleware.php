<?php

namespace NeverTest\Http\Middleware;

use Closure;
use NeverTest\Messagebox;

class MessageMiddleware
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
        if(Auth::check())
        {
            $messagesCount = Messagebox::where('receiver', '=', Auth::user()->getAuthIdentifier())->count();
            Session::put('messagebox',['count' => $messagesCount]);
        }
        return $next($request);
    }
}
