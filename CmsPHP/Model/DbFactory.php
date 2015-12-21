<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 上午00:34
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP\Model;
class DbFactory{
    public static function getInstance($dbConfig='DB_CONFIG')
    {
        //根据不同的参数来选择不同的数据库类型
        $dbType = strtolower(getConfig($dbConfig)['DB_TYPE']);
        switch($dbType)
        {
            case 'mysql':
                $DB = 'Mysql';
                break;
            case 'mysqli':
                $DB = 'Mysqli';
                break;
            case 'pdo':
                $DB = "PDO";
                break;
            default:
                exit('Error：Database Type Is Error!');
        }

        $DBObj = 'CmsPHP\Model\\'.$DB;
        return new $DBObj($dbConfig);
    }
}