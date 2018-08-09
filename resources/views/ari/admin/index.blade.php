<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户管理</title>
    <link href="{{ asset('/static/css/other.css') }}" rel="stylesheet">

  </head>

  <body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <!--head-->
          @include('ari.lic.head')
          <!--head-->
          <br />
          <!-- sidebar menu -->
          @include('ari.lic.left')
          <!--/sidebar menu-->

          <!-- /menu footer buttons -->
          @include('ari.lic.foot')
          <!-- /menu footer buttons -->
        </div>
      </div>
      <!-- top navigation -->
      @include('ari.lic.top')
      <!-- /top navigation -->

      <!--del-->
      @include('ari.admin.del')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>用户</h3>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <a href="{{ url('b/user/add') }}" class="add-btn">添加用户</a>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                  </div>
                  <!--搜索-->
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    @include('ari.admin.search')
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">用户编号</th>
                          <th class="column-title">用户名</th>
                          <th class="column-title">密码</th>
                          <th class="column-title">邮箱</th>
                          <th class="column-title">创建日期</th>
                          <th class="column-title">用户类型</th>
                          <th class="column-title no-link last" style="text-align: center;"><span class="nobr">操作</span>
                          </th>
                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Action ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($admins as $v)
                        <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td>{{ $v->uid }}</td>
                          <td>{{ $v->username }}</td>
                          <td>{{ $v->password }}</td>
                          <td>{{ $v->email }}</td>
                          <td>{{ $v->create_time }}</td>
                          @if ($v->status == 0)
                          <td>管理员</td>
                          @elseif ($v->status == 1)
                          <td>用户</td>
                          @else
                          <td>表计组</td>
                          @endif
                          <td style="text-align: center;">
                            <a href="{{ url('b/user/update') }}" onclick=edit("{{ $v->uid }}") title="修改" class="glyphicon glyphicon-edit" style="color: #00a0e9;font-size: 18px;"></a>&nbsp;&nbsp;
                            <a href="javascript:void (0);" title="删除" class="glyphicon glyphicon-remove class-del" onclick=confirmDel("{{ $v->uid }}") style="color: red;font-size: 18px;"></a>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                      <div style="float: right;">
                            {{ $admins->links() }}
                      </div>
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
    <script src="{{ asset('/static/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/static/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/static/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('/static/vendors/nprogress/nprogress.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('/static/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/static/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('/static/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/static/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('/static/js/build/js/custom.min.js') }}"></script>
    <script>
      $(function () {
        $(".alert-close").click(function () {
          $(".delete").css("display","none")
        })
        $(".alert-cancel").click(function () {
          $(".delete").css("display","none")
        })
        $(".class-del").click(function () {
          $(".delete").css("display","block")
        })

      })
      function confirmDel(uid) {
        //console.log(adId);
        $.post("one",{uid:uid},function(data){
          // console.log(data);
          if(data) {
            // console.log(data['id']);
            $("input[name='uid']").val(data[0].uid)
          }
        },'json');
      }
    </script>

  </body>

</html>