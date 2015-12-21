<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午10:59
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP;
class Controller{

    public $smarty         = null;
    public $appName        = null;
    public $className      = null;
    public $methodName     = null;
    public $templateDir    = null;
    public function __construct()
    {
        $this->smarty       = oSmarty();
        $urlInfo            = ParseUrl();
        $this->appName      = $urlInfo['appName'];
        $this->className    = $urlInfo['className'];
        $this->methodName   = $urlInfo['methodName'];
        $this->templateDir  = dirname(__FILE__)."/../Runing/Template/".$urlInfo['appName'].'/'.$urlInfo['className'];

        $this->smarty->setTemplateDir($this->templateDir);
        $this->smarty->setCompileDir(dirname(__FILE__)."/../Runing/Compile/".$urlInfo['appName'].'/'.$urlInfo['className']);

        $this->smarty->left_delimiter  = getConfig('LEFT_LIMIT') ? getConfig('LEFT_LIMIT') : "{{";
        $this->smarty->right_delimiter = getConfig('RIGHT_LIMIT') ? getConfig('RIGHT_LIMIT') : "}}";

        //开启缓存
        if(getConfig('TPL_CACHE'))
        {
            $this->smarty->caching = true;
            $this->smarty->setCacheDir(dirname(__FILE__)."/../Runing/Cache/".$urlInfo['appName'].'/'.$urlInfo['className']);
            $this->smarty->cache_lifetime = getConfig('CACHE_LIFETIME') ? getConfig('CACHE_LIFETIME') : 60;
        }

    }

    public function assign($var,$value)
    {
        $this->smarty->assign($var,$value);
    }

    public function display($resource_name = null, $cache_id = null){
        //形如传参是$this->display()  ，则默认识别调用自己的方法
        if (empty($resource_name))
        {
            $file    = $this->methodName;
            $file    = ucfirst($file).'.html';
            $fileUrl = $this->templateDir.'/'.$file;
        }else{
            //形如传参是$this->display('Admin/AddUser'); 或者 $this->display('Login')
            $fileArr    = explode('/', $resource_name);
            $controller = ucfirst(array_shift($fileArr));
            $method     = ucfirst(array_shift($fileArr));

            if (empty($method))
            {
                //$this->display('Login')
                $file    = ucfirst($resource_name).'.html';
                $fileUrl = $this->templateDir.'/'.$file;
            }else{
                //$this->display('Admin/AddUser')
                $file    = $method.'.html';
                $fileUrl = dirname(__FILE__)."/../Runing/Template/".$this->appName.'/'.$controller.'/'.$file;
            }
        }

        if (!file_exists($fileUrl)) {
            die('对不起，该模板不存在:'.$fileUrl);
        }

        $this->smarty->display($file,$cache_id);

    }
}