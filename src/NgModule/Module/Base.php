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
namespace NgModule;
/**
 * Base Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Base
{
    protected $error;
    protected $errors;
    protected $data;
    protected $result;

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

    /**
     * Get Result returning the origin result of a process
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set Result the origin result of a process.
     *
     * @param mixed $result origin result
     *
     * @return $this
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }
}
