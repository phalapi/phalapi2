<?php
namespace App\Common;

class Response extends \PhalApi\Response {

    public function __construct() {
        $this->addHeaders('Content-Type', 'text/html;charset=utf-8');
    }

    protected function formatResult($result) {
        return \PhalApi\Tool::arrayToXml($result);
    }
}
