<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 下午2:17
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace Home\Model;
use CmsPHP\Model\Model;
class IndexModel extends Model{

    public function getSqlVersion()
    {
        $sql    = "select version() as `version`";
        $result = $this->query($sql);
        $data   = $this->fetchAssoc($result);
        return $data;
    }

    public function getTables()
    {
        $sql    = "show tables";
        $result = $this->query($sql);
        $data   = $this->fetchAssoc($result);
        return $data;
    }
}