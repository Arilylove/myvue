<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>修改用户</title>

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <!--head-->
                {include file="lic/head"/}
                <!--head-->
                <br />
                <!-- sidebar menu -->
                {include file="lic/left"/}
                <!--/sidebar menu-->

                <!-- /menu footer buttons -->
                {include file="lic/foot"/}
                <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- top navigation -->
        {include file="lic/top"/}
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">

                    </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>修改用户信息</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" method="post" action="{:url('Admin/editAdmin')}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <input type="hidden" name="password" value="123456"/>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">用户编号 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="adId" required="required" readonly class="form-control col-md-7 col-xs-12" value="{$admin['adId']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">用户名 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="username" required="required" class="form-control col-md-7 col-xs-12" value="{$admin['username']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">用户姓名 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="surname" required="required" class="form-control col-md-7 col-xs-12" value="{$admin['surname']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">用户类型 </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="middle-name" class="form-control col-md-7 col-xs-12" name="status" value="{$admin['status']}">
                                            {if condition="$admin['status'] eq 0"}
                                            <option value="{$admin['status']}">管理员</option>
                                            <option value="1">用户</option>
                                            <option value="2">表计组</option>
                                            {elseif condition="$admin['status'] eq 1"}
                                            <option value="{$admin['status']}">用户</option>
                                            <option value="2">表计组</option>
                                            <option value="0">管理员</option>
                                            {else/}
                                            <option value="{$admin['status']}">表计组</option>
                                            <option value="1">用户</option>
                                            <option value="0">管理员</option>
                                            {/if}
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="{:url('Admin/index')}" type="button">取消</a>
                                        <button type="submit" class="btn btn-success">确定</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="__VENDOR__/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="__VENDOR__/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="__VENDOR__/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="__VENDOR__/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="__VENDOR__/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="__VENDOR__/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="__VENDOR__/moment/min/moment.min.js"></script>
<script src="__VENDOR__/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="__VENDOR__/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="__VENDOR__/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="__VENDOR__/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="__VENDOR__/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="__VENDOR__/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="__VENDOR__/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="__VENDOR__/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="__VENDOR__/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="__VENDOR__/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="__VENDOR__/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="__JS__/build/js/custom.min.js"></script>

</body>
</html>
