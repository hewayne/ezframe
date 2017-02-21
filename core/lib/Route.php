<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/3
 * Time: 21:07
 */
//路由类
namespace core\lib;

class Route {
    public $controller;
    public $action;

    public function __construct()
    {
        //p($_SERVER['REQUEST_URI']);
        if ($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI'] != '/'){
            $pathArr = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

            //获取控制器、动作
            $this->controller = $pathArr[0];
            $this->action = isset($pathArr[1]) ? $pathArr[1] : DEFAULT_ACTION; //如果没有动作，则默认index
            unset($pathArr[0], $pathArr[1]);

            //获取url中GET参数
            $count = count($pathArr) + 2;
            $i = 2;
            while ($i < $count){
                if (isset($pathArr[$i + 1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                }
                $i += 2;
            }
        }else{
            $this->controller = DEFAULT_CONTROLLER;
            $this->action = DEFAULT_ACTION;
        }
    }
}