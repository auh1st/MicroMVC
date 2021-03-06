<?php
/**
 * 返回对象类实体
 *
 * @author zhiyuan <zhiyuan12@staff.weibo.com>
 */
namespace Framework\Entities;

class Response {
    private $_code   = 200;
    private $_header = array();
    private $_body   = '';
    public function __construct() {}
    /**
     * 设置返回内容
     * @param  string     $body
     * @return Response
     */
    public function setBody($body) {
        $this->_body = $body;
        return $this;
    }
    /**
     * 返回数据内容
     * @return string
     */
    public function getBody() {
        return $this->_body;
    }
    /**
     * 设置header
     * @param string $str
     */
    public function setHeader(string $str) {
        $this->_header[] = $str;
        return $this;
    }
    /**
     * 获取header
     * @return array
     */
    public function getHeader() {
        return $this->_header;
    }
    /**
     * 设置响应码
     * @param int $code
     */
    public function setCode(int $code) {
        $this->_code = $code;
        return $this;
    }
    /**
     * http 响应输出
     */
    public function response() {
        $header = $this->getHeader();
        foreach ($header as $one) {
            header($one);
        }
        $ret_body = $this->getBody();
        echo $ret_body;
    }
}