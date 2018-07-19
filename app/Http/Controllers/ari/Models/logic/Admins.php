<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/12
 * Time: 13:47
 */
namespace App\Http\Controllers\ari\Models\logic;

use App\Http\Controllers\ari\Models\BaseModel;
use DB;

class Admins extends BaseModel {

    protected $tableName = 'users';

    public function select($where){
        if($where == ''){
            $data = DB::table($this->tableName)
                ->join('positions', function ($join){
                    $join->on($this->tableName.'.pid', '=', 'positions.pid');
                })
                ->leftJoin('depts', $this->tableName.'.dept_id', '=', 'depts.did')
                ->get();
        }else{
            $data = DB::table($this->tableName)->where($where)
                ->join('positions', function ($join){
                    $join->on($this->tableName.'.pid', '=', 'positions.pid');
                })
                ->leftJoin('depts', $this->tableName.'.dept_id', '=', 'depts.did')
                ->get();
        }
        return $data;
    }

    /**
     * 分页(联合查询)
     * @return mixed
     */
    public function page(){
        $num = 10;
        $page = DB::table($this->tableName)
            ->join('positions', function ($join){
                $join->on($this->tableName.'.pid', '=', 'positions.pid');
            })
            ->leftJoin('depts', $this->tableName.'.dept_id', '=', 'depts.did')
            ->paginate($num);
        return $page;
    }





}