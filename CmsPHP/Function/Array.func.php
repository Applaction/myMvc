<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-20
 * Time: 下午4:16
 * Email: lamp365@163.com
 * webSite: http://dayblog.cn
 */

/**
 * 该Function目录可以扩展很多函数文件
 * 寻找两数组所有不同元素
 * @param $array1
 * @param $array2
 * @return array
 */
function diffArray($array1,$array2)
{
    $res1 = array_diff($array1, $array2);
    $res2 = array_diff($array2, $array1);
    $res  = array_merge($res1, $res2);
    return $res;
}