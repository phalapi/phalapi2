<?php
/**
 * 分库分表的自定义数据库路由配置
 * 
 * @author: dogstar <chanzonghuang@gmail.com> 2015-02-09
 */

return array(
    /**
     * DB数据库服务器集群
     */
    'servers' => array(
        'db_master' => array(                         //服务器标记
            'host'      => \PhalApi\Env::get('mysql.host','127.0.0.1'),             //数据库域名
            'name'      => \PhalApi\Env::get('mysql.name','phalapi'),               //数据库名字
            'user'      => \PhalApi\Env::get('mysql.user','root'),                  //数据库用户名
            'password'  => \PhalApi\Env::get('mysql.password',''),	                    //数据库密码
            'port'      => \PhalApi\Env::get('mysql.port',3306),                  //数据库端口
            'charset'   => 'UTF8',                  //数据库字符集
        ),
    ),

    /**
     * 自定义路由表
     */
    'tables' => array(
        //通用路由
        '__default__' => array(
            'prefix' => \PhalApi\Env::get('mysql.prefix','tb_'),
            'key' => 'id',
            'map' => array(
                array('db' => 'db_master'),
            ),
        ),

        /**
        'demo' => array(                                                //表名
            'prefix' => 'tbl_',                                         //表名前缀
            'key' => 'id',                                              //表主键名
            'map' => array(                                             //表路由配置
                array('db' => 'db_master'),                               //单表配置：array('db' => 服务器标记)
                array('start' => 0, 'end' => 2, 'db' => 'db_master'),     //分表配置：array('start' => 开始下标, 'end' => 结束下标, 'db' => 服务器标记)
            ),
        ),
         */
    ),
);
