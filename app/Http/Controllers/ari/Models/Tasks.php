<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/13
 * Time: 15:31
 */
namespace App\Http\Controllers\ari\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Tasks extends BaseModel{
    protected $tableName = 'tasks';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }




}