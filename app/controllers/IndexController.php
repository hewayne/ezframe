<?php
/**
 * Created by PhpStorm.
 * User: wayne
 * Date: 2017/2/3
 * Time: 23:38
 */
namespace app\controllers;

use app\models\TestModel;
use core\lib\Controller;
use core\lib\Model;

class IndexController extends Controller {
    public function actionIndex(){
        $model = new TestModel();
        $res = $model->test();

        $this->assign('data', $res);
        $this->display('index/index');
    }

    public function actionAdd(){
        $data = ['a' => 'aaa', 'b' => 'bbb'];
        $this->assign('data', $data);
        $this->display('index/add');
    }

    public function actionTree(){
        /*$data = array(
            1 => array('id' => 1,'name' => 'name1','pid' => 0),
            2 => array('id' => 2,'name' => 'name2','pid' => 0),
            3 => array('id' => 3,'name' => 'name3','pid' => 1),
            4 => array('id' => 4,'name' => 'name4','pid' => 0),
            5 => array('id' => 5,'name' => 'name5','pid' => 3),
            6 => array('id' => 6,'name' => 'name6','pid' => 3),
            7 => array('id' => 7,'name' => 'name6','pid' => 4),
        );*/
        $model = new Model();
        $data = $model->select('deep', '*');

        $str = $this->_getTree(0, 0, $data);
        $str = "<select name='term'>" . $str . "</select>";
        echo $str;

    }

    public function _getTree($id, $space=0, $data)
    {
        $space = $space + 2;
        static $str;

        foreach ($data as $v) {
            if ($v['pid'] == $id) {
                $str .= "<option value='" . $v['id'] . "'>" . str_repeat("&nbsp;",$space) . "|--" . $v['name'] . "</option>";
                $this->_getTree($v['id'],$space, $data);
            }
        }

        return $str;
    }

}