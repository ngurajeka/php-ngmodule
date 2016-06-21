<?php
namespace Ng\Module\Constants\Error;


class Error
{
    const NOTFOUND          = "Not Found";
    const WAS               = "Was";
    const INVALID           = "Invalid";
    const EMPTYORINVALID    = "Empty / Invalid";

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
}
