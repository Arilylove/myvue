<?php
/**
 * Created by IntelliJ tidEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:53
 */
namespace App\Http\Controllers\ari\Controllers;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class TaskController extends BaseController{
    public function index(){
        $data = $this->tasks()->page();
        $result['code'] = Codes::system_ok;
        $result['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        //$result['url'] = 'ari/task/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据tid值显示json数据
     */
    public function one(){
        $tid = Input::get('tid');
        $where = array('tid'=>$tid);
        $data = $this->tasks()->select($where);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
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
        $add = $this->tasks()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/task/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $tid = $this->input('tid');
        $where = array('tid'=>$tid);
        $find = $this->tasks()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::task_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->tasks()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/task/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $tid = $this->input('tid');
        $where = array('tid'=>$tid);
        $find = $this->tasks()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::task_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->tasks()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/task/index';
        }

        return $this->jsonReturn($result);
    }

}