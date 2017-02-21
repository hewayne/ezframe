<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/3
 * Time: 20:36
 */
//格式化被输出的结果
function p($value)
{
    if (is_bool($value)) {
        var_dump($value);
    } elseif (is_null($value)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($value, true)."</pre>";
    }
}