<?php
/**
 * 单一入口
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午5:34
 * E-mail: lamp365@163.com
 * webSite: http://dayblog.cn
 */


//引入核心文件
require_once './CmsPHP/App.php';
//初始化框架
$obj = new CmsPHP\App();
$obj->run();


//demo  使用注意，所有模板文件或者目录 控制器及目录首字母，要遵循大写规范，给Runing加777,不然缓存文件写不进去
//www.demo.com
//www.demo.com/index.php/Home/index/index
//www.demo.com/index.php/Home/index/login
//www.demo.com/index.php/Home/index/sqlVersion
//www.demo.com/index.php/Home/index/sqlInfo