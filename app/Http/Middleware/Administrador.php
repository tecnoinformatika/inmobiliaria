<?php

namespace App\Http\Middleware;

use Closure;

class Administrador {

    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        switch ($this->auth->user()->rol_id) {
            case 1:
                break;
            case 2:
                return redirect()->to('ventas');
                break;
        }
        return $next($request);
    }

}
