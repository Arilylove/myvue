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
use App\Http\Controllers\ari\Models\Admins;
use App\Http\Controllers\ari\Models\Aftersales;
use App\Http\Controllers\ari\Models\Demands;
use App\Http\Controllers\ari\Models\Depts;
use App\Http\Controllers\ari\Models\Menus;
use App\Http\Controllers\ari\Models\Orders;
use App\Http\Controllers\ari\Models\Positions;
use App\Http\Controllers\ari\Models\Receipts;
use App\Http\Controllers\ari\Models\Roles;
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
    protected function aes(){
        $aes = new AesCrypt();
        return $aes;
    }

    /**
     * 部门
     * @return Admins
     */
    protected function depts(){
        $depts = new Depts();
        return $depts;
    }
    /**
     * 菜单
     * @return Admins
     */
    protected function menus(){
        $menus = new Menus();
        return $menus;
    }
    /**
     * 职位
     * @return Admins
     */
    protected function positions(){
        $positions = new Positions();
        return $positions;
    }
    /**
     * 用户
     * @return Admins
     */
    protected function admins(){
        $admins = new Admins();
        return $admins;
    }
    /**
     * 角色
     * @return Admins
     */
    protected function roles(){
        $roles = new Roles();
        return $roles;
    }
    /**
     * 发票
     * @return Admins
     */
    protected function receipts(){
        $receipts = new Receipts();
        return $receipts;
    }
    /**
     * 任务
     * @return Admins
     */
    protected function tasks(){
        $tasks = new Tasks();
        return $tasks;
    }
    /**
     * 订单
     * @return Admins
     */
    protected function orders(){
        $orders = new Orders();
        return $orders;
    }
    /**
     * 售后
     * @return Admins
     */
    protected function aftersales(){
        $aftersales = new Aftersales();
        return $aftersales;
    }
    /**
     * 需求
     * @return Admins
     */
    protected function demands(){
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


}