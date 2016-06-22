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


use Ng\Module\Constants\Query\Operator;

/**
 * Query Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
trait Page
{

    protected $pageNumber;
    protected $pageOrder;
    protected $pageSize;

    public function descending($key)
    {
        return $this->setPageOrder(sprintf("%s %s", $key, Operator::U_DESC));
    }

    public function ascending($key)
    {
        return $this->setPageOrder(sprintf("%s %s", $key, Operator::U_ASC));
    }

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param mixed $pageNumber
     *
     * @return Page
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageOrder()
    {
        return $this->pageOrder;
    }

    /**
     * @param mixed $pageOrder
     *
     * @return Page
     */
    public function setPageOrder($pageOrder)
    {
        $this->pageOrder = $pageOrder;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     *
     * @return Page
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }

}
