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
namespace Ng\Module\Query;


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

    private function add($d, $f, $o, $v, $s)
    {

        if (!isset($this->query[$f])) {
            $this->query[$f] = array("separator" => $d, "conditions" => array());
        }

        $q = array("opr" => $o, "value" => $v, "separator" => $s);
        $this->query[$f]["conditions"][] = $q;

    }

    private function addWhere($f, $o, $v, $d)
    {
        $this->add($d, $f, $o, $v, "AND");
    }

    private function orWhere($f, $o, $v, $d)
    {
        $this->add($d, $f, $o, $v, "OR");
    }

    private function stringify(array $query)
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

                $s = sprintf(
                    "%s %s %v", $field, getOpr($cond["opr"]), $cond["value"]
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
            $o = "in";
            break;
        case "not":
            $o = "<>";
            break;
        case "notin":
            $o = "not in";
            break;
        }
        return $o;
    }

    private function sample()
    {
        $sample = array(
            "field1" => array(
                "conditions"    => array(
                    array("opr" => "equals", "value" => 1),
                    array("opr" => "equals", "value" => 3, "separator" => "OR"),
                ),
            ),
            "field2" => array(
                "separator"     => "OR",
                "conditions"    => array(
                    array("opr" => "greaterthan", "value" => 1),
                    array("opr" => "lessthan", "value" => 3, "separator" => "AND"),
                ),
            ),
        );

        /* return "(field1 = 1 OR field1 = 3) OR (field2 > 1 AND field2 < 3)"; */
        return $this->stringify($sample);
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
