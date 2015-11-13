<?php

namespace Agricola\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    
    protected $auth;

    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    
    public function handle($request, Closure $next)
    {   
        //No Está logueado?
        if(!$this->auth->check()){
              return redirect()->guest('/');
        }
        //Es cliente?
        if ($this->auth->user()->tipo == 1) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
