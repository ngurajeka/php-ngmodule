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
trait Query
{

    protected $query = array();

    protected function reset()
    {
        $this->query = array();
    }

    private function add($d, $f, $o, $v, $s)
    {

        if (!isset($this->query[$f])) {
            $this->query[$f] = array("separator" => $d, "conditions" => array());
        }

        $q = array("opr" => $o, "value" => $v, "separator" => $s);
        $this->query[$f]["conditions"][] = $q;

    }

    protected function addWhere($f, $o, $v, $d)
    {
        $this->add($d, $f, $o, $v, "AND");
    }

    protected function orWhere($f, $o, $v, $d)
    {
        $this->add($d, $f, $o, $v, "OR");
    }

    protected function stringify(array $query=null)
    {
        $q = "";

        if (empty($query)) {

            if (!is_array($this->query)) {
                return $q;
            }

            if (empty($this->query)) {
                return $q;
            }

            $query = $this->query;
        }

        foreach ($query as $field => $opt) {

            $_q = "";

            foreach ($opt["conditions"] as $cond) {

                if (is_integer($cond["value"])) {
                    $v = $cond["value"];
                } else if (is_array($cond["value"])) {
                    $v = sprintf("(%s)", join(",", $cond["value"]));
                } else {
                    $v = sprintf("'%s'", $cond["value"]);
                }

                $s = sprintf(
                    "%s %s %s", $field, $this->getOpr($cond["opr"]), $v
                );

                if (!empty($_q)) {
                    $d  = isset($cond["separator"]) ? $cond["separator"] : "AND";
                    $_q = sprintf("%s %s %s", $_q, $d, $s);
                    unset($d);
                } else {
                    $_q = $s;
                }

            }

            if (!empty($q)) {
                $d  = isset($opt["separator"]) ? $opt["separator"] : "AND";
                $q  = sprintf("(%s) %s (%s)", $q, $d, $_q);
                unset($d);
            } else {
                $q  = $_q;
            }

        }

        return $q;
    }

    private function getOpr($opr)
    {
        $o = "=";
        switch ($opr) {
        case "equals":
            $o = "=";
            break;
        case "lessthan":
            $o = "<";
            break;
        case "lessthanequals":
            $o = "<=";
            break;
        case "greaterthan":
            $o = ">";
            break;
        case "greaterthanequals":
            $o = ">=";
            break;
        case "in":
            $o = "IN";
            break;
        case "not":
            $o = "<>";
            break;
        case "notin":
            $o = "NOT IN";
            break;
        }
        return $o;
    }

    protected function addOpt(&$opt, $f, $o, $v, $s="AND")
    {
        $opt[] = array(
            "field" => $f, "opr" => $o, "value" => $v, "separator" => $s
        );
    }

    /**
     * @return array
     */
    public function getQuery() {

        return $this->query;
    }

    /**
     * @param array $query
     *
     * @return Query
     */
    public function setQuery($query) {

        $this->query = $query;
        return $this;
    }

}
