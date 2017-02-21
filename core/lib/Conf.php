<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/4
 * Time: 12:43
 */
//配置类
namespace core\lib;

class Conf {
    public static $configs = [];

    public static function get($name, $fileName){
        if (isset(self::$configs[$fileName])){
            return self::$configs[$fileName][$name];
        }else{
            $path = APP.'/conf/'.$fileName.'.php';
            if (is_file($path)){
                $configs = include $path;
                if (isset($configs[$name])){
                    self::$configs[$fileName] = $configs;
                    return $configs[$name];
                }else{
                    throw new \Exception('找不到配置项：'.$name);
                }

            }else{
                throw new \Exception('找不到配置文件：'.$fileName);
            }
        }
    }
}