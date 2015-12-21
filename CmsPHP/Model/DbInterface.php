<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 上午00:23
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP\Model;
Interface DbInterface{

    public function query($sql);

    public function select($sql);

    public function update($sql);

    public function delete($sql);

    public function fetchAssoc($resource);

    public function __destruct();
}