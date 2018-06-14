<?php
/**
 * Created by IntelliJ midEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:51
 */
namespace App\Http\Controllers\ari\Controllers\logic;

use App\Exceptions\Codes;
use App\Exceptions\Msg;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;

class MenuController extends BaseController{
    public function index(){
        $data = $this->menus()->page();
        $result['code'] = Codes::system_ok;
        $result['data'] = $data;
        //$result['url'] = 'ari/menu/index';
        return $this->jsonReturn($result);
    }
    /**
     * 根据mid值显示json数据
     */
    public function one(){
        $mid = Input::get('mid');
        $where = array('mid'=>$mid);
        $data = $this->menus()->select($where);
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
        $add = $this->menus()->add($data);
        if(!$add){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::add_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::add_ok;
            //$result['url'] = 'ari/menu/index';
        }
        //var_dump($result);exit();
        return $this->jsonReturn($result);
    }

    /**
     * 修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function esave(){
        $mid = $this->input('mid');
        $where = array('mid'=>$mid);
        $find = $this->menus()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::menu_unexisted;
            return $this->jsonReturn($result);
        }
        $data = request()->input();
        //var_dump($data);
        unset($data['_token']);
        $edit = $this->menus()->edit($data, $where);
        if(!$edit){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::edit_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::edit_ok;
            //$result['url'] = 'ari/menu/index';
        }
        return $this->jsonReturn($result);

    }

    /**
     * 删除
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(){
        $mid = $this->input('mid');
        $where = array('mid'=>$mid);
        $find = $this->menus()->findBy($where);
        if(!$find){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::menu_unexisted;
            return $this->jsonReturn($result);
        }
        $del = $this->menus()->del($where);
        if(!$del){
            $result['code'] = Codes::system_fail;
            $result['msg'] = Msg::del_fail;
        }else{
            $result['code'] = Codes::system_ok;
            $result['msg'] = Msg::del_ok;
            //$result['url'] = 'ari/menu/index';
        }

        return $this->jsonReturn($result);
    }

}