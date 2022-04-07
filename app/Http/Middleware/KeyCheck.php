<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KeyCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $allowKeys = ['mama', 'baby'];

        if (!$request->has('key') or !in_array($request->key, $allowKeys)) {
            return response()->json(["message" => "cannot access data", "errors" => "key ma par loz par"], 403);
        }
        return $next($request);
    }
}
