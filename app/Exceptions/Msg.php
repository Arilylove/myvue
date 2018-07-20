<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/12
 * Time: 15:54
 */
namespace App\Exceptions;

class Msg{

    /**
     * 通用
     */
    Const add_ok    = "添加成功";
    Const add_fail  = "添加失败";
    Const edit_ok   = "修改成功";
    Const edit_fail = '修改失败';
    Const del_ok    = "删除成功";
    Const del_fail  = '删除失败';
    Const login_ok = '登录成功';

    Const user_unexisted = '用户不存在';
    Const pass_wrong = '密码错误';
    Const code_wrong = '验证码错误';

    Const dept_unexisted = '部门不存在';
    Const position_unexisted = '职位不存在';
    Const role_unexisted = '角色不存在';
    Const menu_unexisted = '菜单不存在';
    Const aftersale_unexisted = '售后不存在';
    Const demand_unexisted = '需求不存在';
    Const invoice_unexisted = '发票不存在';
    Const order_unexisted = '订单不存在';
    Const task_unexisted = '任务不存在';

}