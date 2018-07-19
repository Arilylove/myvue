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
class Invoices extends BaseModel{
    protected $tableName = 'invoices';

    public function select($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }



}