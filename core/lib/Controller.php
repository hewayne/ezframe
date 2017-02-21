<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/4
 * Time: 11:44
 */
namespace core\lib;

class Controller {
    private $assign;

    //为视图赋值做准备，将数据存放在数组中
    public function assign($key, $value){
        $this->assign[$key] = $value;
    }

    //引入视图文件、将数组类型的数据变为键值对的形式
    public function display($path){
        $viewPath = APP.'/views/'.$path.'.php';
        if (is_file($viewPath)){
            extract($this->assign);
            include $viewPath;
        }else{
            echo 'view file not exist';
        }
    }
}