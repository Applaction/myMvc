<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-12-19
 * Time: 下午5:47
 * E-mail: lamp365@163.com
 * webSite: http://dayblog.cn
 */
return array(

    'DB_CONFIG' => array(
        'DB_TYPE'       => 'mysqli',
        'DB_HOST'       => '127.0.0.1',
        'DB_PORT'       => '3306',
        'DB_USERNAME'   => 'root',
        'DB_PASSWORD'   => '123456',
        'DB_NAME'       => 'yershop',
    ),

    'TPL_CACHE'         => 1,   //是否开启页面缓存，不设置默认开启。使用缓存后，控制器所做的修改，只能在过期时间后才能生效
    'CACHE_LIFETIME'    => 30,  //页面缓存时间  不开启默认是60秒
);