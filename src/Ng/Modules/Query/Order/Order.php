<?php
/**
 * Order Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Query\Order;


/**
 * Order Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Order
{
    const ASCENDING     = "ASC";
    const DESCENDING    = "DESC";

    protected $field;
    protected $order;

    public function __construct($field, $order=self::DESCENDING)
    {
        $this->field    = $field;
        $this->order    = $order;
    }

    public function getField()
    {
        return $this->field;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function stringify($delimiter=false)
    {
        $str = sprintf("%s %s", $this->getField(), $this->getOrder());
        if ($delimiter == true) {
            $str = sprintf(", %s", $str);
        }

        return $str;
    }

}
