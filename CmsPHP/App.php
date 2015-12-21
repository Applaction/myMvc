<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午5:39
 * E-mail: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP;
class App{

    public function run()
    {
        //设置头
        $this->loadHeader();
        //载入系统配置文件
        $this->loadSysFile();
        //自动载入实例化对象
        $this->loadObject();
        //设置路由
        $this->loadRoute();
        //预留一个方法用来操作其他的
        $this->init();
    }

    public function init()
    {
        //Todo what!
    }
    /**
     * 设置头
     */
    public function loadHeader()
    {
        header('Content-type: text/html; charset=UTF-8');
    }

    /**
     * 引入系统文件
     */
    public function loadSysFile()
    {
        $GLOBALS['config'] = require_once dirname(__FILE__).'/../Config/Config.php';
        /** 加载基础函数库 */
        $listFuncs = glob(dirname(__FILE__).'/Function/*.func.php');
        foreach( $listFuncs as $func) {
            require_once $func;
        }
    }

    /**
     * 自动载入实例化对象
     */
    public function loadObject()
    {
        require_once dirname(__FILE__).'/AutoLoad.php';
        $autoload = new AutoLoad();
        $autoload->register();
    }

    /**
     * 解析路径
     */
    public function loadRoute()
    {
        $routeObj = new Route();
        $routeObj->parseUrl();
    }
}
