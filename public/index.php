<?php
/**
 * $APP_NAME 统一入口
 */

namespace PhalApi;

use PhalApi\PhalApi;

require_once dirname(__FILE__) . '/init.php';

//装载你的接口
//DI()->loader->addDirs('Demo');

/** ---------------- 响应接口请求 ---------------- **/

$pai = new PhalApi();
$res = $pai->response();
$res->output();

