<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 评论服务
 */
class Comment extends Api {

    public function getRules() {
        return array(
            'get' => array(
                'id' => array('name' => 'id', 'type' => 'int', 'require' => true, 'min' => 1, 'desc' => '评论ID'),
            ),
        );
    }

    /**
     * 获取评论
     * @desc 根据评论ID获取对应的评论信息
     * @return int      id      评论ID，不存在时不返回
     * @return string   content 评论内容，不存在时不返回
     */
    public function get() {
        return array('id' => 1, 'content' => '这是一条模拟的评论');
    }
}
