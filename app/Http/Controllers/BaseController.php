<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/12
 * Time: 11:24
 */
namespace App\Http\Controllers;

use App\Common\AesCrypt;
use App\Exceptions\Codes;
use App\Exceptions\Msg;
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
use App\Http\Controllers\ari\org\Verify;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Input;
use Session;

class BaseController extends Controller{

    public function index(){
        return view('welcome');
    }

    /**
     * 登录验证
     */
    public function login(){
        //var_dump(123);exit();
        $data = request()->input();
        $data['username'] = Input::get('username');
        $data['password'] = Input::get('password');
        //$data['code'] = Input::get('code');
        //var_dump($data);exit();
        $encrypt = $this->aes()->encrypt($data['password']);
        $findUser = (array)$this->admins()->findBy(array('username'=>$data['username']));
        //var_dump($findUser);exit();
        //var_dump(Session::get('verifycode'));exit();
        //1.用户不存在
        if($findUser == null){
            $result['code'] = Codes::user_unexisted;
            $result['msg'] = Msg::user_unexisted;
        }else{
            if($encrypt != $findUser['password']){  //2.密码错误
                $result['code'] = Codes::pass_wrong;
                $result['msg']  = Msg::pass_wrong;
            }/*else if($data['code'] != Session::get('verifycode')){
                //3.验证码错误
                $result['code'] = Codes::code_wrong;
                $result['msg']  = Msg::code_wrong;
            } */else{   //4.登录成功
                $result['code'] = Codes::system_ok;
                $result['msg']  = Msg::login_ok;
                //保存session
                $result['ari_user_session'] = $data['username'];
                session('ari_user_session', $data['username']);
                //$result['url'] = 'login/index';
            }
        }
        //$result = json_encode($data);
        return $this->jsonReturn($result);
    }

    /**
     * 验证码
     */
    public function verify(){
        $builder = new CaptchaBuilder();
        //$font = VENDOR_PATH.'/gregwar/captcha/src/Gregwar/Captcha/Font/Font/captcha4.ttf';
        //可以设置图片宽高及字体
        $builder->build($width = 120, $height = 60, $font = null);
        //$builder->setMaxOffset(4);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('verifycode', $phrase);
        //Session::set('verifycode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
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
                $findMenu = (array)$this->menus()->findBy(array('mid'=>$roleWaysArr[$i]));
                $control[$i] = $findMenu['control'];
                $method[$i] = $findMenu['method'];
            }
        }
        $roles['control'] = $control;
        $roles['method'] = $method;
        return $roles;
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
}