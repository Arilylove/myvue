<?php
/**
 * Created by IntelliJ didEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:51
 */
namespace App\Http\Controllers\ari\Controllers;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class DemandController extends BaseController{
    public function index(){
        $data = $this->demands()->page();
        $result['code'] = Codes::system_ok;
        $result['data'] = $data;
        //$result['url'] = 'ari/demand/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据did值显示json数据
     */
    public function one(){
        $did = Input::get('did');
        $where = array('did'=>$did);
        $data = $this->demands()->select($where);
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
        $add = $this->demands()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/demand/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $did = $this->input('did');
        $where = array('did'=>$did);
        $find = $this->demands()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::user_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->demands()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/demand/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $did = $this->input('did');
        $where = array('did'=>$did);
        $find = $this->demands()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::user_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->demands()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/demand/index';
        }

        return $this->jsonReturn($result);
    }

}