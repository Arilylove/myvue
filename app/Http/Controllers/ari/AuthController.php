<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/14
 * Time: 15:06
 */
namespace App\Http\Controllers\ari;

use App\Http\Controllers\BaseController;
/**
 * 权限相关
 * Class Auth
 * @package App\Http\Controllers\ari
 */
class AuthController extends BaseController{

    /**
     * 根据用户名获取用户权限
     * @param $username
     * @return mixed
     */
    public function getAllAuth($username){
        $where = array('username'=>$username);
        $findUser = $this->admins()->findBy($where);
        $roleId = $findUser['rid'];
        //角色id，从角色表中查找用户具有的操作菜单id
        $findRole = $this->roles()->findBy(array('rid'=>$roleId));
        //去除最后一位逗号
        $allMenuIdString = substr($findRole['role_ways'], 0, strlen($findRole['role_ways'])-1);
        $allMenuIdArr = explode(',', $allMenuIdString);
        //初始化
        $control = array();
        $method = array();
        //根据id查询所有菜单操作controller和method
        for($i=0;$i<count($allMenuIdArr);$i++){
            $menu = $this->menus()->findBy(array('mid'=>$allMenuIdArr[$i]));
            $control[$i] = $menu['menu_control'];
            $method[$i] = $menu['menu_method'];
        }
        $auth['control'] = $control;
        $auth['method'] = $method;
        return $auth;
    }




}