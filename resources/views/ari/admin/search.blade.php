            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset('/static/css/search.css') }}"/>
</head>
<body>
<form method="post" action="{{ asset('Admin/search') }}" style="float: right;">
    <div>
        <input type="text" name="search"  placeholder="请输入.." autocomplete="off" class="col-md-4 col-sm-4 col-xs-4 bordrad"/>
        <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1">

        </div>
        <button type="submit" class="add-btn" class="col-md-4 col-sm-4 col-xs-3" style="border-radius:5px;">搜索</button>
    </div>
</form>
</body>
</html>