<?php

require_once dirname(__FILE__) . '/../../bootstrap.php';

if (!class_exists('App\\Api\\Comment')) {
    require dirname(__FILE__) . '/./src/app/Api/Comment.php';
}

/**
 * PhpUnderControl_App\Api\Comment_Test
 *
 * 针对 ./src/app/Api/Comment.php App\Api\Comment 类的PHPUnit单元测试
 *
 * @author: dogstar 20170716
 */

class PhpUnderControl_AppApiComment_Test extends \PHPUnit_Framework_TestCase
{
    public $appApiComment;

    protected function setUp()
    {
        parent::setUp();

        $this->appApiComment = new App\Api\Comment();
    }

    protected function tearDown()
    {
        // 输出本次单元测试所执行的SQL语句
        // var_dump(DI()->tracer->getSqls());

        // 输出本次单元测试所涉及的追踪埋点
        // var_dump(DI()->tracer->getSqls());
    }


    /**
     * @group testGetRules
     */ 
    public function testGetRules()
    {
        $rs = $this->appApiComment->getRules();
    }

    /**
     * @group testGet
     */ 
    public function testGet()
    {
        // Step 1. 构造
        $url = 's=Comment.Get';
        $params = array('id' => 1);

        // Step 2. 操作
        $rs = PhalApi\Helper\TestRunner::go($url, $params);

        // Step 3. 检验
        $this->assertEquals(1, $rs['id']);
        $this->assertArrayHasKey('content', $rs);
    }

}
