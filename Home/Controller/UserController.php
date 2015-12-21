<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-21
 * Time: 下午5:04
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace Home\Controller;
use CmsPHP\Controller;
class UserController extends Controller{
    public function test()
    {
        $this->assign('aa','测试一下user');
        $this->display();
    }
}