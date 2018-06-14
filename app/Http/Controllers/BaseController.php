<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/12
 * Time: 11:24
 */
namespace App\Http\Controllers;

use App\Common\AesCrypt;
use app\Exceptions\Codes;
use app\Exceptions\Msg;
use App\Http\Controllers\ari\Models\Invoices;
use App\Http\Controllers\ari\Models\logic\Admins;
use App\Http\Controllers\ari\Models\Aftersales;
use App\Http\Controllers\ari\Models\Demands;
use App\Http\Controllers\ari\Models\logic\Depts;
use App\Http\Controllers\ari\Models\logic\Menus;
use App\Http\Controllers\ari\Models\Orders;
use App\Http\Controllers\ari\Models\logic\Positions;
use App\Http\Controllers\ari\Models\logic\RoleMenus;
use App\Http\Controllers\ari\Models\logic\Roles;
use App\Http\Controllers\ari\Models\Tasks;
use Illuminate\Support\Facades\Input;

class BaseController extends Controller{

    public function index(){
        return view('welcome');
    }
    /**
     * 加密
     * @return Admins
     */
    public function aes(){
        $aes = new AesCrypt();
        return $aes;
    }

    /**
     * 部门
     * @return Admins
     */
    public function depts(){
        $depts = new Depts();
        return $depts;
    }
    /**
     * 菜单
     * @return Admins
     */
    public function menus(){
        $menus = new Menus();
        return $menus;
    }
    /**
     * 职位
     * @return Admins
     */
    public function positions(){
        $positions = new Positions();
        return $positions;
    }
    /**
     * 用户
     * @return Admins
     */
    public function admins(){
        $admins = new Admins();
        return $admins;
    }
    /**
     * 角色
     * @return Admins
     */
    public function roles(){
        $roles = new Roles();
        return $roles;
    }

    /**
     * 角色菜单联合表
     * @return RoleMenus
     */
    public function roleMenus(){
        $roleMenus = new RoleMenus();
        return $roleMenus;
    }

    /**
     * 发票
     * @return Admins
     */
    public function invoices(){
        $invoices = new Invoices();
        return $invoices;
    }
    /**
     * 任务
     * @return Admins
     */
    public function tasks(){
        $tasks = new Tasks();
        return $tasks;
    }
    /**
     * 订单
     * @return Admins
     */
    public function orders(){
        $orders = new Orders();
        return $orders;
    }
    /**
     * 售后
     * @return Admins
     */
    public function aftersales(){
        $aftersales = new Aftersales();
        return $aftersales;
    }
    /**
     * 需求
     * @return Admins
     */
    public function demands(){
        $demands = new Demands();
        return $demands;
    }


    /**
     * 登录验证
     */
    public function login(){
        $data['username'] = Input::get('username');
        $data['password'] = Input::get('password');
        $data['code'] = Input::get('code');
        $findUser = $this->admins()->findBy(array('username'=>$data['username']));
        //1.用户不存在
        if(!$findUser){
            $result['code'] = Codes::user_unexisted;
            $result['msg'] = Msg::user_unexisted;
        }
        //2.密码错误
        else if($this->aes()->encrypt($data['password']) != $findUser['password']){
            $result['code'] = Codes::pass_wrong;
            $result['msg']  = Msg::pass_wrong;
        }
        //3.验证码错误
        else if($data['code'] != ''){
            $result['code'] = Codes::code_wrong;
            $result['msg']  = Msg::code_wrong;
        }
        //4.登录成功
        else{
            $result['code'] = Codes::system_ok;
            $result['msg']  = Msg::login_ok;
            //保存session
            $result['ari_user_session'] = $data['username'];
            session('ari_user_session', $data['username']);
            $result['url'] = 'login/index';
        }
        return $this->jsonReturn($result);
    }

    /**
     * 退出登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        session('ari_user_session', null);
        $result['code'] = Codes::log_out;
        $result['url'] = 'login/index';
        return $this->jsonReturn($result);
    }

    /**
     * 获取输入的参数
     * @param $key 参数名
     * @param null $value  默认值为null
     * @return mixed|null
     */
    public function input($key, $value = null){
        $value = Input::get($key, $value);
        return $value;
    }

    /**
     * 返回json数据
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonReturn($data){
        $result = response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        return $result;
    }
    /**
     * 由组合菜单获取权限菜单
     * @param $roleMenus
     */
    public function getMenuById($roleMenuIds){
        $control = array();
        $method = array();
        if($roleMenuIds != ''){
            $roleWays = substr($roleMenuIds, 0, strlen($roleMenuIds)-1);
            $roleWaysArr = explode(',', $roleWays);
            $len = count($roleWaysArr);
            for ($i=0;$i<$len;$i++){
                $findMenu = $this->menus()->findBy(array('mid'=>$roleWaysArr[$i]));
                $control[$i] = $findMenu['control'];
                $method[$i] = $findMenu['method'];
            }
        }
        $roles['control'] = $control;
        $roles['method'] = $method;
        return $roles;
    }

}