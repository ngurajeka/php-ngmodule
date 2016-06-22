<?php
namespace Ng\Modules\Constants\Error;


class Errors
{
    const AVAILABLE         = "Available";
    const EMPTYORINVALID    = "Empty / Invalid";
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
            return sprintf("%s Not %s", $msg, self::AVAILABLE);
        }

        return sprintf("Not %s", self::AVAILABLE);
    }

}
