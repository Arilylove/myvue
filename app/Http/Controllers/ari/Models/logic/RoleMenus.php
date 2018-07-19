<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/14
 * Time: 15:14
 */
namespace App\Http\Controllers\ari\Models\logic;

use App\Http\Controllers\ari\Models\BaseModel;
use DB;
class RoleMenus extends BaseModel{
    protected $tableName = 'role_menus';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }




}