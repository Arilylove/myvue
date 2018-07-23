<?php
/**
 * Created by IntelliJ oidEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:52
 */
namespace App\Http\Controllers\ari\Controllers;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class OrderController extends BaseController{
    public function index(){
        $data = $this->orders()->page();
        $result['code'] = Codes::system_ok;
        $result['msg'] = '';
        $result['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
       // $result['url'] = 'ari/order/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据oid值显示json数据
     */
    public function one(){
        $oid = Input::get('oid');
        $where = array('oid'=>$oid);
        $data = $this->orders()->select($where);
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
        $add = $this->orders()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/order/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $oid = $this->input('oid');
        $where = array('oid'=>$oid);
        $find = $this->orders()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::order_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->orders()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/order/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $oid = $this->input('oid');
        $where = array('oid'=>$oid);
        $find = $this->orders()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::order_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->orders()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/order/index';
        }

        return $this->jsonReturn($result);
    }

}