<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>删除</title>
    <style>
        .delete{
            display: none;
        }
    </style>
</head>
<body>
<!--删除 弹框-->
<div class="delete">
    <form method="post" action="{{ asset('Admin/deleteAdmin') }}" enctype="multipart/form-data">
        <input hidden type="text" name="adId" value="">
        <div id="delete">
            <div class="ltitle">温馨提示</div>
            <div class="lcon">
                <img src="{{ asset('/static/img/jinggao.png') }}" alt="">
                <p>确定删除?</p>
            </div>
            <div class="alert-btn">
                <button type="submit" class="alert-sure" style="margin-left: 30%;">确定</button>
                <span class="alert-cancel">取消</span>
            </div>
        </div>
    </form>
</div>
</body>
</html>