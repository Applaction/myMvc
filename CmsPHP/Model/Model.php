<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 上午00:26
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP\Model;
class Model implements  DbInterface{

    private $instance   = null;

    private function getInstance()
    {
        if($this->instance == null)
        {
           $this->instance = DbFactory::getInstance();
        }
        return $this->instance;
    }

    public function query($sql)
    {
        //mysql->query();
       return $this->getInstance()->query($sql);
    }

    public function select($sql)
    {
        return $this->getInstance()->select($sql);
    }

    public function update($sql)
    {
        return $this->getInstance()->update($sql);
    }

    public function delete($sql)
    {
        return $this->getInstance()->delete($sql);
    }

    public function fetchAssoc($resource)
    {
        return $this->getInstance()->fetchAssoc($resource);
    }

    public function __destruct()
    {
        return $this->getInstance()->__destruct();
    }

}