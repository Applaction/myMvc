<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午6:45
 * E-mail: lamp365@163.com
 * webSite: http://dayblog.cn
 */

/**
 * 该Function目录可以扩展很多函数文件
 * 获取配置文件的信息
 * 用法 getConfig('website') or getConfig('website.keyword')
 * @param $key
 * @return mixed
 */
function getConfig($key)
{
    $config = $GLOBALS['config'];
    $keyArr = explode('.',$key);
    foreach($keyArr as $val)
    {
        if(!isset($config[$val]))  return '';
        $config = $config[$val];
    }
    return $config;
}

/**
 * 打印信息 可以打印任何类型，支持打印多个
 * 用法 ppd($arr1,$arr2,$obj) or pdd($a,$b) or ppd($c)
 */
function ppd()
{
    $argArr = func_get_args();
    foreach($argArr as $val)
    {
        echo '<pre>';
        print_r($val);
        echo "</pre>";
    }
    die();
}

/**
 * 打印信息 可以打印任何类型，支持打印多个 区别是没有停止程序
 * 用法 ppd($arr1,$arr2,$obj) or pdd($a,$b) or ppd($c)
 */
function pp()
{
    $argArr = func_get_args();
    foreach($argArr as $val)
    {
        echo '<pre>';
        print_r($val);
        echo "</pre>";
    }
}

/**
 * 解析路径
 * @return array
 */
function ParseUrl()
{
    $pathInfo = !empty($_SERVER['PATH_INFO']) ? explode('/',$_SERVER['PATH_INFO']) : array();
    if(empty($pathInfo))
    {
        $appName    = getConfig('BIND_APP') ? getConfig('BIND_APP') : 'Home';
        $className  = 'Index';
        $methodName = 'index';
    }else{
        if(getConfig('BIND_APP'))
        {
            $appName    = ucfirst(getConfig('BIND_APP'));
            $className  = ucfirst($pathInfo['1']);
            $methodName = $pathInfo['2'];
        }else{
            $appName    = ucfirst($pathInfo['1']);
            $className  = ucfirst($pathInfo['2']);
            $methodName = $pathInfo['3'];
        }
    }
    return array('appName'=>$appName,'className'=>$className,'methodName'=>$methodName);
}

/**
 * 获取当前的应用
 * @return mixed
 */
function CurrentAppName()
{
    $data = ParseUrl();
    return $data['appName'];
}

/**
 * 获取当前的控制器
 * @return mixed
 */
function CurrentController()
{
    $data = ParseUrl();
    return $data['className'];
}

/**
 * 获取当前的方法
 * @return mixed
 */
function CurrentMethod()
{
    $data = ParseUrl();
    return $data['methodName'];
}
//实例化smarty对象
function oSmarty()
{
    require_once dirname(__FILE__) . '/../Smarty/Smarty.class.php';
    $smarty  = new Smarty();
    return $smarty;
}
