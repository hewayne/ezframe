<?php

//定义路径常量
define('ROOT', __DIR__);
define('CORE', ROOT.'/core');
define('APP', ROOT.'/app');

include CORE.'/vendor/autoload.php'; //composer类的载入

//是否开启DEBUG模式
define('DEBUG', true);
if (DEBUG){
    ini_set('display_errors', 'On');
    /*$whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();*/
}else{
    ini_set('display_errors', 'Off');
}


//载入核心文件
include APP.'/conf/conf.php';
include CORE.'/common/function.php';
include CORE.'/web.php';

//类的自动载入
spl_autoload_register('core\web::load');

//运行
\core\web::run();


