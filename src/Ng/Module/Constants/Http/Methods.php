<?php
namespace Ng\Module\Constants\Http;


class Methods
{
    const GET       = "GET";
    const HEAD      = "HEAD";
    const POST      = "POST";
    const PUT       = "PUT";
    const PATCH     = "PATCH";
    const DEL       = "DELETE";
    const OPT       = "OPTIONS";

    public static function getMethods($string=false)
    {
        $methods = array(
            self::GET,
            self::PATCH,
            self::PUT,
            self::POST,
            self::DEL,
            self::OPT,
        );

        if ($string) {
           return join(",", $methods);
        }

        return $methods;
    }

}
