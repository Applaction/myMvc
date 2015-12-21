<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 下午3:13
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace Home\Service;
class IndexService{

    public static function getVersion()
    {
        $sqlInfo = new \Home\Model\IndexModel();
        $result  = $sqlInfo->getSqlVersion();
        return $result;
    }

    public function DbTables()
    {
        $sqlInfo = new \Home\Model\IndexModel();
        $result  = $sqlInfo->getTables();
        return $result;
    }
}