<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:28
 */
namespace App\Http\Controllers\ari\Models\logic;

use App\Http\Controllers\ari\Models\BaseModel;
use DB;
class Positions extends BaseModel{
    protected $tableName = 'positions';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }



}