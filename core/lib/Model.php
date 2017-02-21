<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/4
 * Time: 0:19
 */
//数据库类
namespace core\lib;

class Model extends \medoo {
    public function __construct()
    {
        $options = [
            'database_type' => DATABASE_TYPE,
            'database_name' => 'demo',
            'server' => HOST,
            'username' => DB_USERNAME,
            'password' => '',
            'charset' => CHARSET,
        ];
        parent::__construct($options);
    }
}