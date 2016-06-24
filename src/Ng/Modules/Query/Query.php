<?php
/**
 * Query Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Query;


/**
 * Query Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Query
{


    protected $conditions   = array();
    protected $orders       = array();

    protected $offset       = 0;
    protected $limit        = 10;
    protected $pageNumber   = 1;

    public function flush()
    {
        $this->conditions   = array();
        $this->orders       = array();
        $this->offset       = 0;
        $this->limit        = 10;
        $this->pageNumber   = 1;
    }

    public function addCondition(Condition\Condition $condition)
    {
        $this->conditions[] = $condition;
    }

    public function addOrder(Order\Order $order)
    {
        $this->orders[]     = $order;
    }

    public function hasConditions()
    {
        return !empty($this->conditions);
    }

    public function hasOrders()
    {
        return !empty($this->orders);
    }

    public function getOrder()
    {
        $str    = "";
        if ($this->hasOrders()) {
            foreach ($this->orders as $order) {
                /** @type Order\Order $order */
                $str .= $order->stringify(!empty($str));
            }
        }

        return !empty($str) ? $str : null;
    }

    public function stringify()
    {
        $str    = "";
        if ($this->hasConditions()) {
            foreach ($this->conditions as $condition) {
                /** @type Condition\Condition $condition */
                $str .= $condition->stringify(!empty($str));
            }
        }

        return !empty($str) ? $str : null;
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

}
