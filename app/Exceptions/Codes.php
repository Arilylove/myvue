<?php
/**
 * Created by IntelliJ IDEA.
 * User: HXL
 * Date: 2018/6/12
 * Time: 15:38
 */
namespace App\Exceptions;

class Codes{
    //返回代码
    Const system_ok   = 200;
    Const system_fail = 400;


    /**
     * 用户不存在（未找到用户）
     */
    Const user_unexisted = 201;
    /**
     * 用户已存在
     */
    Const user_existed   = 202;
    /**
     * 密码错误
     */
    Const pass_wrong     = 203;
    /**
     * 验证码错误
     */
    Const code_wrong     = 204;

    /**
     * 退出登录
     */
    Const log_out = 205;


}