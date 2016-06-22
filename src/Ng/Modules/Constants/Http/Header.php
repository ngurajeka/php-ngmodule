<?php
namespace Ng\Modules\Constants\Http;


class Header
{
    const ACAC      = "Access-Control-Allow-Credentials";
    const ACAH      = "Access-Control-Allow-Headers";
    const ACAHV     = "Origin, X-Requested-With, Content-Range, Content-Disposition, Content-Type, Authorization";
    const ACAM      = "Access-Control-Allow-Methods";
    const ACAO      = "Access-Control-Allow-Origin";

    const ORIGIN    = "*";

    const CONTENT_TYPE  = "Content-Type";
    const APPJSON       = "application/json; charset=UTF-8";
    const JSON          = "application/json";

    const FORMURLENCODED    = "application/x-www-form-urlencoded";
}
