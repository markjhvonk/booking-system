<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Editor
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
        if(! Auth::check() ){
            return redirect('admin/login')->withErrors([
                'message' => "You are not logged in."
            ]);
        }

        if(Auth()->user()->role > 2){
            // return redirect('admin/notAuthorised')->withErrors([
            //     'message' => "You are not allowed to see this page with your current role."
            // ]);
            return back()->withErrors([
                'message' => "You need to be an Editor or Admin to perform this action."
            ]);
        }

        return $next($request);
    }
}
