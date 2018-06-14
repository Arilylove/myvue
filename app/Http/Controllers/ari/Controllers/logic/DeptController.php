<?php
/**
 * Created by IntelliJ dept_idEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:51
 */
namespace App\Http\Controllers\ari\Controllers\logic;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class DeptController extends BaseController{
    public function index(){
        $data = $this->depts()->page();
        $result['code'] = Codes::system_ok;
        $result['data'] = $data;
        //$result['url'] = 'ari/dept/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据id值显示json数据
     */
    public function one(){
        $dept_id = Input::get('dept_id');
        $where = array('dept_id'=>$dept_id);
        $data = $this->depts()->select($where);
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
        $add = $this->depts()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/dept/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $dept_id = $this->input('dept_id');
        $where = array('dept_id'=>$dept_id);
        $find = $this->depts()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::dept_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->depts()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/dept/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $dept_id = $this->input('dept_id');
        $where = array('dept_id'=>$dept_id);
        $find = $this->depts()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::dept_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->depts()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/dept/index';
        }

        return $this->jsonReturn($result);
    }

}