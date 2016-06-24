<?php
/**
 * QueryString Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Query\Condition\Parser;


use Ng\Modules\Query\Query;

/**
 * QueryString Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class QueryString
{
    protected $queryString;

    protected $query;

    public function extract()
    {
        // create $query
        $this->query = new Query();
        // extraxt filter -> create conditions
        $this->crateConditions();
        // extract order -> create orders
        $this->createOrders();
        // extract page -> pageNumber, limit, offset
        $this->createPageLimitOffset();
    }

    protected function crateConditions()
    {
        if (!isset($this->queryString["filter"])) {
            return;
        }

        if (!is_array($this->queryString["filter"])) {
            return;
        }

        foreach ($this->queryString["filter"] as $filter) {
            if (is_array($filter)) {

            }
        }
    }

    protected function createOrders()
    {

    }

    protected function createPageLimitOffset()
    {

    }

    public function setQueryString($queryString)
    {
        $this->queryString = $queryString;
    }

}
