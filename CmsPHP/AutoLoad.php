<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午5:48
 * E-mail: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP;
class AutoLoad{

    public function register()
    {
        spl_autoload_register(array($this,'autoload'));
    }

    public function autoload($classNameInfo)
    {
        $pathArr   = explode("\\",$classNameInfo);
        $className = array_pop($pathArr);
        $dirName   = implode(DIRECTORY_SEPARATOR,$pathArr);
        $fileName  = $dirName.'/'.$className.'.php';
        if(file_exists($fileName))
        {
            require_once $fileName;
        }else{
//            die("该类名不存在，文件加载有误：".$fileName);
        }
    }
}