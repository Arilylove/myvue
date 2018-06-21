<?php
/**
 * Created by IntelliJ in_idEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:53
 */
namespace App\Http\Controllers\ari\Controllers;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class InvoiceController extends BaseController{
    public function index(){
        $data = $this->invoices()->page();
        $result['code'] = Codes::system_ok;
        $result['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        //$result['url'] = 'ari/receipt/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据in_id值显示json数据
     */
    public function one(){
        $in_id = Input::get('in_id');
        $where = array('in_id'=>$in_id);
        $data = $this->invoices()->select($where);
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
        $add = $this->invoices()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/receipt/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $in_id = $this->input('in_id');
        $where = array('in_id'=>$in_id);
        $find = $this->invoices()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::invoice_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->invoices()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
           // $result['url'] = 'ari/receipt/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $in_id = $this->input('in_id');
        $where = array('in_id'=>$in_id);
        $find = $this->invoices()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::invoice_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->invoices()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/receipt/index';
        }

        return $this->jsonReturn($result);
    }

}