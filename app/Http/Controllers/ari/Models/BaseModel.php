<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/7/19
 * Time: 10:10
 */
namespace App\Http\Controllers\ari\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class BaseModel extends Model{

    protected $tableName = '';

    /**
     * where条件查询所有
     * @param $where
     * @return mixed
     */
    public function getAll($where){
        $data = DB::table($this->tableName)->where($where)->get();
        return $data;
    }
    /**
     * 分页
     * @return mixed
     */
    public function page(){
        $num = 10;
        $page = DB::table($this->tableName)->paginate($num);
        return $page;
    }
    /**
     * 根据条件查找一条数据
     * @param $where
     * @return mixed
     */
    public function findBy($where){
        $find = DB::table($this->tableName)->where($where)->first();
        return $find;
    }

    public function add($data){
        $add = DB::table($this->tableName)->insert($data);
        return $add;
    }

    public function edit($data, $where){
        $update = DB::table($this->tableName)->where($where)->update($data);
        return $update;
    }

    public function del($where){
        $del = DB::table($this->tableName)->where($where)->delete();
        return $del;
    }

    /**
     * 插入一条数据并返回插入数据的id值（含有自增id值）
     * @param $data
     */
    public function insertId($data){
        $id = DB::table($this->tableName)->insertGetId($data);
        return $id;
    }

}