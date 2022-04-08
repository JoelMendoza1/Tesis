<?php

namespace App\Http\Middleware;
$SymfonyResopnse = 'Symfony\Component\HttpFoundation\Response';
use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $response= $next($request);

        $headers = [
            'Access-Control-Allow-Origin'=> '*',
            'Access-Control-Allow-Methods'=> 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Headers'=> 'x-access-token, Origin, X-Requested-With, Content-Type, Accept , Authorization',
        //, Authorization, Application'
        ];
        foreach ($headers as $key => $value)
        $response->headers->set($key, $value);
        return $response;
 }
}
