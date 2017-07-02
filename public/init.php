<?php
/**
 * 统一初始化
 */

namespace PhalApi;

use PhalApi\Loader;
use PhalApi\Config\FileConfig;
use PhalApi\Logger;
use PhalApi\Logger\FileLogger;
use PhalApi\DB\DBNotORM;

/** ---------------- 根目录定义，自动加载 ---------------- **/

date_default_timezone_set('Asia/Shanghai');

defined('API_ROOT') || define('API_ROOT', dirname(__FILE__) . '/..');
require_once API_ROOT . '/vendor/autoload.php';

// 兼容PhalApi 1.x 旧版本
$loader = new Loader(API_ROOT, 'Library');

/** ---------------- 注册&初始化 基本服务组件 ---------------- **/

// 自动加载
DI()->loader = $loader;

// 配置
DI()->config = new FileConfig(API_ROOT . '/config');

// 调试模式，$_GET['__debug__']可自行改名
DI()->debug = !empty($_GET['__debug__']) ? true : DI()->config->get('sys.debug');

if (DI()->debug) {
    // 启动追踪器
    DI()->tracer->mark();

    error_reporting(E_ALL);
    ini_set('display_errors', 'On'); 
}

// 日记纪录
DI()->logger = new FileLogger(API_ROOT . '/runtime', Logger::LOG_LEVEL_DEBUG | Logger::LOG_LEVEL_INFO | Logger::LOG_LEVEL_ERROR);

// 数据操作 - 基于NotORM
//DI()->notorm = new DBNotORM(DI()->config->get('dbs'), DI()->debug);

// 翻译语言包设定
SL('zh_cn');

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
