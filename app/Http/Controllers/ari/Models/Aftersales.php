<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:30
 */
namespace App\Http\Controllers\ari\Models;

use DB;
class Aftersales extends BaseModel {
    protected $tableName = 'after_sales';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }



}