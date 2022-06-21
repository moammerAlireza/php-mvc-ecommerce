<?php
namespace App\classes;

class CSRFToken
{
    //generate Token
    public static function _token()
    {
        if (!session::has('token')) {
            $randomToken= base64_encode(openssl_random_pseudo_bytes(32));
            session::add('token',$randomToken);
        }
        return session::get('token');
    }

    //Verify CSRF Token
    public static function VerifyCSRFToken($requestToken, $regenerate=true)
    {
        if(session::has('token') && session::get('token') === $requestToken){
            if($regenerate){
                session::remove('token');
            }
            return true;
        }
        return false;
    }
}