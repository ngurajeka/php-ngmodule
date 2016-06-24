<?php
/**
 * Errors Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Errors;


/**
 * Errors Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Errors
{
    protected $errors = array();

    public function append()
    {
        $args = func_get_args();
        array_walk($args, function($arg) {
            if ( ! $arg instanceOf Error\Error ) {
                return;
            }

            $this->addError($arg);
        });
    }

    public function merge(Errors $errors)
    {
        if ($errors->has()) {
            foreach ($errors->get() as $error) {
                /** @type Error\Error $error */
                $this->append($error);
            }
        }
    }

    public function flush()
    {
        $this->errors   = array();
    }

    public function clean($sort=true)
    {
        $del    = function(&$p) { if ( empty($p) ) { unset($p); } };
        $errors = $this->errors;
        array_walk($errors, $del);
        if ($sort == true) { sort($errors); }
        $this->errors   = $errors;
    }

    private function addError(Error\Error $error)
    {
        $this->errors[] = $error;
    }

    public function has()
    {
        return !empty($this->errors);
    }

    public function get()
    {
        return $this->errors;
    }

    public function toArray()
    {
        $errors = array();
        foreach ($this->get() as $err) {
            /** @type Error\Error $err */
            $errors[] = $err->toArray();
        }

        return $errors;
    }

}
