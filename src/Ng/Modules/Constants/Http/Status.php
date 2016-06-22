<?php
namespace Ng\Modules\Constants\Http;


class Status
{
    const CONT                      = 100;
    const CONT_MSG                  = "Continue";
    const SWITCHINGPROTOCOLS        = 101;
    const SWITCHINGPROTOCOLS_MSG    = "Switching Protocol";


    const OK            = 200;
    const OK_MSG        = "OK";

    const CREATED       = 201;
    const CREATED_MSG   = "Created";

    const ACCEPTED      = 202;
    const ACCEPTED_MSG  = "Accepted";

    const NONAUTHORITATIVEINFO      = 203;
    const NONAUTHORITATIVEINFO_MSG  = "Non Authoritative Info";

    const NOCONTENT             = 204;
    const NOCONTENT_MSG         = "No Content";
    const RESETCONTENT          = 205;
    const RESETCONTENT_MSG      = "Reset Content";
    const PARTIALCONTENT        = 206;
    const PARTIALCONTENT_MSG    = "Partial Content";

    const MULTIPLECHOICES       = 300;
    const MULTIPLECHOICES_MSG   = "Multiple Choices";
    const MOVEDPERMANENTLY      = 301;
    const MOVEDPERMANENTLY_MSG  = "Moved Permanently";
    const FOUND                 = 302;
    const FOUND_MSG             = "Found";
    const SEEOTHER              = 303;
    const SEEOTHER_MSG          = "See Other";
    const NOTMODIFIED           = 304;
    const NOTMODIFIED_MSG       = "Not Modified";
    const USEPROXY              = 305;
    const USEPROXY_MSG          = "Use Proxy";
    const TEMPORARYREDIRECT     = 307;
    const TEMPORARYREDIRECT_MSG = "Temporary Redirect";

    const BADREQUEST            = 400;
    const BADREQUEST_MSG        = "Bad Request";
    const UNAUTHORIZED          = 401;
    const UNAUTHORIZED_MSG      = "Unauthorized";
    const PAYMENTREQUIRED       = 402;
    const PAYMENTREQUIRED_MSG   = "Payment Required";
    const FORBIDDEN             = 403;
    const FORBIDDEN_MSG         = "Forbidden";
    const NOTFOUND              = 404;
    const NOTFOUND_MSG          = "Not Found";
    const METHODNOTALLOWED      = 405;
    const METHODNOTALLOWED_MSG  = "Method Not Allowed";
    const NOTACCEPTABLE         = 406;
    const PROXYAUTHREQUIRED     = 407;
    const REQUESTTIMEOUT        = 408;
    const CONFLICT              = 409;
    const CONFLICT_MSG          = "Conflict";
    const GONE                  = 410;

    const LENGTHREQUIRED            = 411;
    const PRECONDITIONFAILED        = 412;
    const REQUESTENTITYTOOLARGE     = 413;
    const REQUESTURITOOLONG         = 414;
    const UNSUPPORTEDMEDIATYPE      = 415;

    const REQUESTEDRANGENOTSATISFIABLE      = 416;

    const EXPECTATIONFAILED         = 417;
    const TEAPOT                    = 418;
    const PRECONDITIONREQUIRED      = 428;
    const TOOMANYREQUESTS           = 429;

    const REQUESTHEADERFIELDSTOOLARGE       = 431;
    const UNAVAILABLEFORLEGALREASONS        = 451;

    const INTERNALSERVERERROR       = 500;
    const INTERNALSERVERERROR_MSG   = "Internal Server Error";
    const NOTIMPLEMENTED            = 501;
    const NOTIMPLEMENTED_MSG        = "Method Not Implemented";
    const BADGATEWAY                = 502;
    const SERVICEUNAVAILABLE        = 503;
    const GATEWAYTIMEOUT            = 504;

    const HTTPVERSIONNOTSUPPORTED           = 505;
    const NETWORKAUTHENTICATIONREQUIRED     = 511;
}
