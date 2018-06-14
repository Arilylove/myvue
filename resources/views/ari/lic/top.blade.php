<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        /*修改 密码弹框*/
        #alert-pass-update{
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0,0,0,0.5);
        }
        #alert-pass-update form{
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            width: 462px;
            height:360px;
            background: #fff;
        }
        #alert-pass-update form .alert-title-update{
            width: 100%;
            height: 44px;
            background: #1fb5ac;
            margin-bottom: 20px;
            line-height: 44px;
            padding-left: 30px;
        }
        #alert-pass-update form .alert-title-update span{
            color: #fff;
            font-size: 16px;
        }
        #alert-pass-update form .alert-con,#alert-box form .alert-btn{
            width: 100%;
            height: 54px;
            display: block;
            line-height: 54px;
            text-align: center;
        }
        #alert-pass-update form .alert-con span{
            font-size: 16px;
            color: #5e5e5e;
            font-weight: normal;
            display: inline-block;
            width:85px;
            text-align: right;
        }
        #alert-pass-update form .alert-con input{
            width: 178px;
            height: 34px;
            border: 1px solid #dbdbdb;
            border-radius: 5px;
            font-weight: normal;
        }
    </style>
</head>
<body>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        ,欢迎登录
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="Base/update" class="pass">修改密码</a></li>
                        <li><a href="Login/out"><i class="fa fa-sign-out pull-right"></i>退出登录</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->


</body>
</html>