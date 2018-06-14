<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/12
 * Time: 11:33
 */
namespace App\Http\Controllers\ari\Controllers\logic;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class AdminController extends BaseController{

    public function index(){
        $data = $this->admins()->page();
        $data = $this->dealDatas($data);
        $result['code'] = Codes::system_ok;
        $result['data'] = json_encode($data);
        //$result['url'] = 'ari/admin/index';
        return $this->jsonReturn($result);
    }

    /**
     * 根据id值显示json数据
     */
    public function one(){
        $id = Input::get('uid');
        $where = array('uid'=>$id);
        $data = $this->admins()->select($where);
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
        $add = $this->admins()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/admin/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $id = $this->input('uid');
        $where = array('uid'=>$id);
        $find = $this->admins()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::user_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->admins()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/admin/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $id = $this->input('uid');
        $where = array('uid'=>$id);
        $find = $this->admins()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::user_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->admins()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/admin/index';
        }

        return $this->jsonReturn($result);
    }

    /**
     * 用户数据处理--多数据处理
     */
    private function dealDatas($datas){
        $len = count($datas);
        for ($i=0;$i<$len;$i++){
            $datas[$i] = $this->dealData($datas[$i]);
        }
        return $datas;
    }
    /**
     * 用户数据处理--单数据处理
     */
    private function dealData($data){
        $len = count($data);
        //需要的数据初始化
        $data['position'] = '';
        $data['dept'] = '';
        $data['roles'] = array();   //可能有多个角色
        if($len >= 1){
            $findPosition = $this->positions()->findBy(array('dept_id'=>$data['dept_id']));
            $findDept = $this->positions()->findBy(array('dept_id'=>$data['dept_id']));
            $data['position'] = $findPosition['position_name'];
            $data['dept'] = $findDept['dept_name'];
            //多角色处理
            $data['roles'] = $this->dealRoles($data['rid']);
        }
        return $data;
    }

    /**
     * 多角色id处理->获取角色名
     */
    private function dealRoles($rids){
        $roles = array();
        //存在角色
        if($rids != ''){
            $ridString = substr($rids, 0, strlen($rids)-1);
            $ridArr = explode(',', $ridString);
            $len = count($ridArr);
            for ($i=0;$i<$len;$i++){
                $findRole = $this->roles()->findBy(array('rid'=>$ridArr[$i]));
                $roles[$i] = $findRole['role_name'];
            }
        }
        return $roles;
    }

}