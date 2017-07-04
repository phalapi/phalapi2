<?php

use PhalApi\Loader;
use PhalApi\Config\FileConfig;
use PhalApi\Logger;
use PhalApi\Logger\FileLogger;
use PhalApi\DB\DBNotORM;

/** ---------------- 注册&初始化 基本服务组件 ---------------- **/

// 兼容PhalApi 1.x 旧版本
$loader = new Loader(API_ROOT, array('Library', 'library'));

// 自动加载
\PhalApi\DI()->loader = $loader;

// 配置
\PhalApi\DI()->config = new FileConfig(API_ROOT . '/config');

// 调试模式，$_GET['__debug__']可自行改名
\PhalApi\DI()->debug = !empty($_GET['__debug__']) ? true : \PhalApi\DI()->config->get('sys.debug');

// 日记纪录
\PhalApi\DI()->logger = new FileLogger(API_ROOT . '/runtime', Logger::LOG_LEVEL_DEBUG | Logger::LOG_LEVEL_INFO | Logger::LOG_LEVEL_ERROR);

// 数据操作 - 基于NotORM
//DI()->notorm = new DBNotORM(DI()->config->get('dbs'), DI()->debug);

/** ---------------- 定制注册 可选服务组件 ---------------- **/

/**
// 签名验证服务
DI()->filter = 'PhalApi_Filter_SimpleMD5';
 */

/**
// 缓存 - Memcache/Memcached
DI()->cache = function () {
    return new PhalApi_Cache_Memcache(DI()->config->get('sys.mc'));
};
 */

/**
// 支持JsonP的返回
if (!empty($_GET['callback'])) {
    DI()->response = new PhalApi_Response_JsonP($_GET['callback']);
}
 */

