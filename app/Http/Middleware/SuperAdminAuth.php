<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminAuth
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
        $url = $request->url();
        $secret_key = 'ch1233tdrtgDS4';
        $secret_iv = 'chan0913ew25';

        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
        $fromUrl = base64_encode( openssl_encrypt( $url, $encrypt_method, $key, 0, $iv ) );
    
        $redirectToUrl = "tnf/Auth/Restricted/Super/Login?Rqst=".$fromUrl;

        if(!Session()->has('CstmSupAdmLogedId')){
            return redirect($redirectToUrl)->with("fail","Please Login To continue");
        }
        return $next($request);
    }
}
