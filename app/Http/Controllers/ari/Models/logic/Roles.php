<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 14:44
 */
namespace App\Http\Controllers\ari\Models\logic;

use App\Http\Controllers\ari\Models\BaseModel;
use DB;
class Roles extends BaseModel{
    protected $tableName = 'roles';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }



}