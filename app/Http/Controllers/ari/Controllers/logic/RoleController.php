<?php
/**
 * Created by IntelliJ ridEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 14:07
 */
namespace App\Http\Controllers\ari\Controllers\logic;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class RoleController extends BaseController{

    public function index(){
        $data = $this->roles()->page();
        $result['code'] = Codes::system_ok;
        $result['data'] = $data;
        //$result['url'] = 'ari/role/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据rid值显示json数据
     */
    public function one(){
        $rid = Input::get('rid');
        $where = array('rid'=>$rid);
        $data = $this->roles()->select($where);
        $data = $this->dealDatas($data);
        echo json_encode($data);
    }

    /**
     * 添加
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(){
        $data = request()->input();
        //var_dump($data);exit();
        $data['create_time'] = date('Y-m-d', time());
        unset($data['_token']);
        $add = $this->roles()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/role/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $rid = $this->input('rid');
        $where = array('rid'=>$rid);
        $find = $this->roles()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::user_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->roles()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/role/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $rid = $this->input('rid');
        $where = array('rid'=>$rid);
        $find = $this->roles()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::user_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->roles()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/role/index';
        }

        return $this->jsonReturn($result);
    }
    /**
     * 角色数据处理--多数据处理
     */
    private function dealDatas($datas){
        $len = count($datas);
        for ($i=0;$i<$len;$i++){
            $datas[$i] = $this->dealData($datas[$i]);
        }
        return $datas;
    }
    /**
     * 角色数据处理--单数据处理
     */
    private function dealData($data){
        $len = count($data);
        //需要的数据初始化
        $data['menus'] = array();
        if($len >= 1){
            $roleWays = substr($data['role_ways'], 0, strlen($data['role_ways'])-1);
            $roleWaysArr = explode(',', $roleWays);
            $len = count($roleWaysArr);
            for ($i=0;$i<$len;$i++) {
                $findMenu = $this->menus()->findBy(array('mid' => $roleWaysArr[$i]));
                $data['menus'] = $findMenu['menu_name'];
            }
        }
        return $data;
    }


}