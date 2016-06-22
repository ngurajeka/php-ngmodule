<?php
namespace Ng\Modules\Constants\Errors;


class Errors
{
    const AVAILABLE         = "Available";
    const EMPTYORINVALID    = "Empty / Invalid";
    const EXPIRED           = "Expired";
    const INVALID           = "Invalid";
    const NOTFOUND          = "Not Found";
    const WAS               = "Was";

    public static function notFound($msg)
    {
        if (!empty($msg) AND is_string($msg)) {
            return sprintf("%s %s %s", $msg, self::WAS, self::NOTFOUND);
        }

        return self::NOTFOUND;
    }

    public static function invalid($msg)
    {
        if (!empty($msg) AND is_string($msg)) {
            return sprintf("%s %s", self::EMPTYORINVALID, $msg);
        }

        return self::EMPTYORINVALID;
    }

    public static function notAvailable($msg)
    {
        if (!empty($msg) AND is_string($msg)) {
            return sprintf("%s Is Not %s", $msg, self::AVAILABLE);
        }

        return sprintf("Not %s", self::AVAILABLE);
    }

    public static function expired($msg)
    {
        if (!empty($msg) AND is_string($msg)) {
            return sprintf("%s Has Been %s", $msg, self::EXPIRED);
        }

        return sprintf("Has Been %s", self::EXPIRED);
    }

}
