<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:29
 */
namespace App\Http\Controllers\ari\Models\logic;

use App\Http\Controllers\ari\Models\BaseModel;
use DB;
class Menus extends BaseModel{
    protected $tableName = 'menus';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }



}