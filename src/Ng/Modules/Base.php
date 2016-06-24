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


use Ng\Modules\Errors\Errors;

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
    /** @type Errors $errors */
    protected $errors;

    public function __construct()
    {
        $this->errors = new Errors();
    }

    /**
     * @return Errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

}
