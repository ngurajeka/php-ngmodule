<?php
/**
 * Error Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Errors\Error;


/**
 * Error Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Error
{
    const NOTFOUND      = "404";
    const NOTFOUND_MSG  = "Not Found";

    protected $code;
    protected $detail;
    protected $field;
    protected $status;
    protected $source;

    public function __construct($c, $d, $f, $st, $src)
    {
        $this->code     = $c;
        $this->detail   = $d;
        $this->field    = $f;
        $this->status   = $st;
        $this->source   = $src;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function getField()
    {
        return $this->field;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function toArray()
    {
        $error = array();

        if (!is_null($this->getCode())) {
            $error["code"]      = $this->getCode();
        }

        if (!is_null($this->getDetail())) {
            $error["detail"]    = $this->getDetail();
        }

        if (!is_null($this->getStatus())) {
            $error["status"]    = $this->getStatus();
        }

        if (!is_null($this->getSource())) {
            $error["source"]    = $this->getSource();
        }

        if (!is_null($this->getField())) {
            $error["field"]     = $this->getField();
        }

        return $error;
    }

    public static function populate($c, $d, $f=null, $st=null, $src=null)
    {
        return new Error($c, $d, $f, $st, $src);
    }

    public static function notFound($d, $f=null, $st=null, $src=null)
    {
        return new Error(self::NOTFOUND, $d, $f, $st, $src);
    }

}
