<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 上午00:49
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */
namespace CmsPHP\Model;
use CmsPHP\Model;
class Mysqli implements DbInterface
{
    private $link = null;

    public function __construct($dbConfig='DB_CONFIG'){
        if(is_null($this->link)){
            $this->connect(getConfig($dbConfig));
        }
    }

    private function connect($config)
    {
        $this->link = mysqli_connect($config['DB_HOST'],$config['DB_USERNAME'],$config['DB_PASSWORD'],$config['DB_NAME'],$config['DB_PORT']);
        if(!$this->link)
        {
            die("ERROR:".mysqli_error($this->link));
        }
    }


    public function query($sql)
    {
        //mysql->query();
        $result = mysqli_query($this->link, $sql);
        return $result;
    }

    public function select($sql)
    {
        $result  = $this->query($sql);
        $rowList = $this->fetchAssoc($result);
        return $rowList;
    }

    public function update($sql)
    {
       //Todo what
    }

    public function delete($sql)
    {
       //Todo what
    }

    public function fetchAssoc($resource)
    {
        $rowList = array();
        while($row = mysqli_fetch_assoc($resource))
        {
            $rowList[] = $row;
        }
        return $rowList;
    }

    public function __destruct()
    {
        if(is_resource($this->link))
            mysqli_close($this->link);
    }

}