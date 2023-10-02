<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;


class AuthCheck
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

        if(!Session()->has('logedId')){
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $secret_key = 'ch1233tdrtgDS4';
            $secret_iv = 'chan0913ew25';
    
            $encrypt_method = "AES-256-CBC";
            $key = hash( 'sha256', $secret_key );
            $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    
            
            $output = base64_encode( openssl_encrypt( $actual_link, $encrypt_method, $key, 0, $iv ) );
            

            $NextPage = "http://$_SERVER[HTTP_HOST]/Join-Us/Authentication/Login?Rfrm=".$output;

            return Redirect::to($NextPage)->with("fail","Welcome Back");
        }
        return $next($request);
    }
}
