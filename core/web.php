<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/3
 * Time: 20:42
 */
namespace core;

use core\lib\Route;

class web {

    public static function run(){
        $route = new Route();
        $controller = $route->controller;
        $action = $route->action;

        //通过路由，获取控制器的路径名、类名、方法名
        $controllerFilePath = APP."/controllers/".ucfirst($controller).'Controller.php';
        $controllerClassName = "app\\controllers\\".ucfirst($controller).'Controller';
        $actionName = 'action'.ucfirst($action);

        //实例化类，并调用类的方法
        if (is_file($controllerFilePath)){
            $controller = new $controllerClassName();
            $controller->$actionName();
        }else{
            exit('找不到控制器：'.$controllerClassName);
        }

    }

    //类的自动载入
    public static function load($class){
        $filename = str_replace('\\', '/', ROOT.'/'.$class.'.php');
        include $filename;
    }

}