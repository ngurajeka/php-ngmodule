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
namespace Ng\Modules;


/**
 * Errors Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
trait Errors
{

    protected function handle($errors)
    {
        /**
         * Ex: {"status": {"message": "General", "errors": [{"field": "fieldName", "detail": "errorDetail"}]}}
         */
        if (!is_string($errors)) {

            if (method_exists($this, "setCode")) {
                $this->setCode(409);
            }

            if (method_exists($this, "setError")) {
                $this->setError(
                    sprintf("Error given was an %s", gettype($errors))
                );
            }

            return false;
        }

        $errors = json_decode($errors, true);
        $lastError = json_last_error();
        if ($lastError != 0) {

            if (method_exists($this, "setCode")) {
                $this->setCode(409);
            }

            if (method_exists($this, "setError")) {
                switch ($lastError) {
                case JSON_ERROR_DEPTH:
                    $this->setError("Maximum stack depth exceeded");
                    break;
                case JSON_ERROR_STATE_MISMATCH:
                    $this->setError("Underflow or the modes mismatch");
                    break;
                case JSON_ERROR_CTRL_CHAR:
                    $this->setError("Unexpected control character found");
                    break;
                case JSON_ERROR_SYNTAX:
                    $this->setError("Syntax error, malformed JSON");
                    break;
                case JSON_ERROR_UTF8:
                    $this->setError(
                        "Malformed UTF-8 characters, possibly incorrectly encoded"
                    );
                    break;
                default:
                    $this->setError("Uknown Error");
                    break;
                }
            }

            return false;
        }

        if (method_exists($this, "setCode")) {
            $this->setCode(409);
        }

        if (isset($errors["status"]["message"])
            and method_exists($this, "setError")
        ) {
            $this->setError($errors["status"]["message"]);
        }

        if (isset($errors["status"]["errors"])
            and method_exists($this, "setErrors")
        ) {
            if (is_array($errors["status"]["errors"])) {
                $this->setErrors($errors["status"]["message"]);
            }
        }

        return true;
    }

}
