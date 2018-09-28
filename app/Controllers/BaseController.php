<?php
/**
 * Created by PhpStorm.
 * User: panxin
 * Date: 2018/9/26 0026
 * Time: 17:18
 */
namespace App\Controllers;

class BaseController{

    public function __construct()
    {

    }

    public function apiResultStandard($code, $message = null, $content = null, $callback = null, $bcode = 100)
    {
        $params = [
            'code'      => $code,
            'bcode'     => $bcode,
            'message'   => $message,
            'timeStamp' => time(),
            'content'   => $content,
        ];

        return $this->echoJson($params, $callback);
    }

    /**
     * 输出json
     * @param $data
     * @param string $jsonp
     */
    public function echoJson($data, $jsonp = '')
    {
        header('Content-type: application/json; charset=utf-8');
        if (empty($jsonp)) {
            echo json_encode($data);
        } else {
            echo $jsonp . '(' . json_encode($data) . ')';
        }
        $this->end();
    }

    /**
     * 结束
     * @param string $msg
     */
    public function end($msg = '')
    {
        //释放DB资源
        exit($msg);
    }
}