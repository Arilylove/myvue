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
        $auth = $this->getMenuById($findRole['role_ways']);
        return $auth;
    }




}