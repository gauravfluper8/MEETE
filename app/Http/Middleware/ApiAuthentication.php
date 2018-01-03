<?php

namespace App\Http\Middleware;
use \App\User;
use Closure;

class ApiAuthentication
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
        if(!empty(($request->header('accessToken')))){
            $userDetail = User::where(['remember_token' => $request->header('accessToken')])->first();
            return $next($request);
        } else {
            $response['message'] = __('messages.required.accessToken');
            return response()->json($response,401);
        }
    }
}
