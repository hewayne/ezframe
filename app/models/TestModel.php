<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/4
 * Time: 0:44
 */
namespace app\models;

use core\lib\Model;

class TestModel extends Model{
    public function test(){
        $res = $this->select("test", "*");
        return $res;
    }
}