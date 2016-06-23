<?php
/**
 * Http Request Module
 *
 * PHP Version 5.4.x
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
namespace Ng\Modules\Http;


use Ng\Modules\Constants\Http\Header;

/**
 * Http Request Module
 *
 * @category Library
 * @package  Library
 * @author   Ady Rahmat MA <adyrahmatma@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/ngurajeka/php-ngmodule
 */
class Request
{

    protected $con;
    protected $response;
    protected $url;

    public function newRequest($url)
    {
        $this->openConnection();
        $this->setup($url);
        $this->url = $url;
    }

    public function get()
    {
        $header = sprintf("%s: %s", Header::CONTENT_TYPE, Header::APPJSON);

        $this->resetConnection();
        $this->setup($this->url);
        $this->option(
            CURLOPT_HTTPHEADER, array(
                Header::CONTENT_TYPE, $header
            )
        );
        $this->exec();
        return $this;
    }

    public function post($data, $encode=true)
    {
        $this->resetConnection();
        $this->setup($this->url);
        $this->option(
            CURLOPT_HTTPHEADER, array(
                "Content-Type", "Content-Type: application/json"
            )
        );
        if ($encode) {
            $data = $this->jsonify($data);
        }
        $this->option(CURLOPT_POST, true);
        $this->option(CURLOPT_POSTFIELDS, $data);
        $this->exec();
        return $this;
    }

    protected function exec()
    {
        $this->response = curl_exec($this->con);
    }

    protected function openConnection()
    {
        $this->con = curl_init();
    }

    protected function setup(
        $url, $timeout=300, $return=true, array $headers=null
    ) {
        curl_setopt($this->con, CURLOPT_URL, $url);
        curl_setopt($this->con, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($this->con, CURLOPT_RETURNTRANSFER, $return);
        if (!is_null($headers)) {
            curl_setopt($this->con, CURLOPT_HTTPHEADER, $headers);
        }
    }

    public function resetConnection()
    {
        curl_reset($this->con);
    }

    public function closeConnection()
    {
        curl_close($this->con);
    }

    protected function option($param, $value)
    {
        curl_setopt($this->con, $param, $value);
    }

    protected function options(array $params)
    {
        foreach ($params as $param => $value) {
            curl_setopt($this->con, $param, $value);
        }
    }

    protected function jsonify($data)
    {
        $result = json_encode($data);

        switch (json_last_error()) {
        case JSON_ERROR_NONE:
            break;
        case JSON_ERROR_DEPTH:
        case JSON_ERROR_STATE_MISMATCH:
        case JSON_ERROR_CTRL_CHAR:
        case JSON_ERROR_SYNTAX:
        case JSON_ERROR_UTF8:
            $result = '{}';
            break;
        default:
            break;
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getCon()
    {
        return $this->con;
    }

    /**
     * @param mixed $con
     *
     * @return Request
     */
    public function setCon($con)
    {
        $this->con = $con;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     *
     * @return Request
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     *
     * @return Request
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

}
