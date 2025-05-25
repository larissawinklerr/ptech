<?php

namespace App\Http\Middleware;

use Closure;


class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        /////return $next($request);
        return response('Acesso negado! Rota exige autenticação!');
    }
}
