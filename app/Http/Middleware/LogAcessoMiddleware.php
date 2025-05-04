<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //request - manipular
        //return $next($request);
        dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => 'IP $ip requisitou a rota $rota']);
        
        return Response('Chegamos no middleware e ginalizamod no middleware');
    }
}
