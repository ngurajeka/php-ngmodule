<?php
/**
 * Base Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules;


/**
 * Base Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
trait Base
{

    protected $code;
    protected $error;
    protected $errors = array();
    protected $data;

    protected function addMsgErrors($msg)
    {
        $this->errors[] = array(
            "message" => $msg,
        );
    }

    protected function addError($error)
    {
        $this->errors[] = $error;
    }

    protected function addErrors($errors)
    {
        foreach ($errors as $error) {
            $this->errors[] = $error;
        }
    }

    /**
     * Set Error Code
     *
     * @param $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get Error Code
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get Error returning the general error of a process
     *
     * @return $mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set Error the general error of a process
     *
     * @param string $error general error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Get Errors returning the detail error(s) of a process.
     * It could be a slice/array.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set Errors the detail error(s) of a process.
     * It could be a slice/array.
     *
     * @param mixed $errors detail error(s)
     *
     * @return $this
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * Get Data returning the parsed data from origin result
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set Data the parsed data from result
     *
     * @param mixed $data parsed data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

}
