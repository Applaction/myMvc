<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午7:00
 * E-mail: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP;
class Route{

    public function parseUrl()
    {
        $urlInfo     = ParseUrl();
        $controller  = $urlInfo['appName'].'\Controller\\' . $urlInfo['className'] . 'Controller';
        $obj         = new $controller();
        if(!method_exists($obj,$urlInfo['methodName']))
        {
            die('该方法不存在：'.$urlInfo['methodName']);
        }
        $methodName = $urlInfo['methodName'];
        $obj->$methodName();
    }
}