<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a><i class="fa fa-users"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/index') }}">用户列表</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-binoculars"></i> 可配置信息管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ asset('State/stLi') }}">国家配置</a></li>
                    <li><a href="{{ asset('Client/cliLi') }}">客户配置</a></li>
                    <li><a href="{{ asset('MeterType/index') }}">基表型号配置</a></li>
                    <li><a href="{{ asset('ModelType/index') }}">电子模块类型配置</a></li>
                    <li><a href="{{ asset('Manu/index') }}">制造商配置</a></li>
                    <li><a href="{{ asset('Principle/index') }}">生产负责人配置</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-key"></i> 订单管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ asset('Order/index') }}">订单列表</a></li>
                </ul>
            </li>


            <li><a><i class="fa fa-key"></i> 权限管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">

                    <li><a href="{{ asset('Dept/index') }}">部门列表</a></li>
                    <li><a href="{{ asset('Way/index') }}">菜单列表</a></li>
                    <li><a href="{{ asset('Role/index') }}">角色列表</a></li>

                    <li><a href="{{ asset('Admin/index') }}">用户列表</a></li>

                </ul>
            </li>

        </ul>
    </div>

</div>
<!-- /sidebar menu -->
</body>
</html>