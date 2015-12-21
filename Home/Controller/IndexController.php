<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午7:19
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace Home\Controller;
use CmsPHP\Controller;
class IndexController extends Controller{

    public function index()
    {
        $this->assign('ip',getConfig('DB_CONFIG.DB_HOST'));
        $this->assign('aa','这是一个测试');
        $this->display();
    }

    public function login()
    {
        $this->assign('aa','这是个登录页面..');
        $this->display();
    }

    //直接实例化model
    public function sqlVersion()
    {
        $indexModel = new \Home\Model\IndexModel();
        $data       = $indexModel->getSqlVersion();
        ppd($data);
    }

    //借助server来完成业务
    public function sqlInfo()
    {
        $indexService = new \Home\Service\IndexService();
        $data[]       =  $indexService::getVersion();
        $data[]       =  $indexService->DbTables();
        ppd($data);
    }
}