<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 14:43
 */
namespace App\Http\Controllers\ari\Models\logic;

use App\Http\Controllers\ari\Models\BaseModel;
use DB;
class Depts extends BaseModel{
    protected $tableName = 'depts';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }



}