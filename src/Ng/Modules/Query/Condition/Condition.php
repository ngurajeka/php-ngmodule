<?php
/**
 * Condition Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Query\Condition;


/**
 * Condition Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Condition
{
    const SEPARATOR_AND = "AND";
    const SEPARATOR_OR  = "OR";

    const OP_EQUAL                  = "=";
    const OP_GREATER_THAN           = ">";
    const OP_GREATER_THAN_OR_EQUALS = ">=";
    const OP_LESS_THAN              = "<";
    const OP_LESS_THAN_OR_EQUALS    = "<=";
    const OP_IN                     = "IN";

    const OP_STR_EQUAL                  = "e";
    const OP_STR_GREATER_THAN           = "gt";
    const OP_STR_GREATER_THAN_OR_EQUAL  = "gte";
    const OP_STR_LESS_THAN              = "lt";
    const OP_STR_LESS_THAN_OR_EQUAL     = "lte";
    const OP_STR_IN                     = "in";

    protected $field;
    protected $value;
    protected $operator;
    protected $separator;

    public function __construct($f, $v, $o, $s=self::SEPARATOR_AND)
    {
        $this->field        = $f;
        $this->value        = $v;
        $this->operator     = $o;
        $this->separator    = $s;
    }

    public function getField()
    {
        return $this->field;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function getSeparator()
    {
        return $this->separator;
    }

    public function stringify($separator=false)
    {
        $str = sprintf("(%s %s '%s')", $this->getField(), $this->getOperator(), $this->getValue());
        if ($separator) {
            $str = sprintf("%s %s", $this->getSeparator(), $str);
        }

        return $str;
    }

}

