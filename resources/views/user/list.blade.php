@extends('layouts.app')

@section('content')

    <div class="page-content">
        <div class="page-header">
            <h1>
                用户管理
                <small>
                    <i class="icon-double-angle-right"></i>
                     用户列表
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addUser" style="margin-bottom: 10px">添加新用户</a>

                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <span class="lbl">序号</span>
                                        </label>
                                    </th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>
                                        <i class="icon-time bigger-110 hidden-480"></i>
                                        创建时间
                                    </th>
                                    <th class="hidden-480">Status</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $k=>$v)
                                <tr class="">
                                    <td class="center">
                                        <label>
                                            <span class="lbl">{{$k+1}}</span>
                                        </label>
                                    </td>

                                    <td>
                                        <a href="#">{{$v->name}}</a>
                                    </td>
                                    <td>{{$v->email}}</td>
                                    <td class="hidden-480">{{$v->created_at}}</td>
                                    <td class="hidden-480">启用</td>


                                        @if($v->id!=1)
                                        <td>
                                            <div class="btn-group">
                                                <a data-toggle="modal"  data-target="#mmmm" class="btn btn-xs btn-info" href="{{url('admin/user/edit',['id'=>$v->id])}}">
                                                    <i class="icon-edit bigger-120">分配角色</i>
                                                </a>
                                                <a class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#confirm-delete" data-href="{{url('admin/user/delete',['id'=>$v->id])}}">
                                                    <i class="icon-trash bigger-120">删除</i>
                                                </a>
                                            </div>
                                        </td>
                                            @else
                                            <td>
                                                <div class="btn-group">
                                                    无法管理
                                                </div>
                                            </td>
                                        @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                {!! $users->render() !!}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.user')}}" method="post" class="form-horizontal">
                        <div class="modal-body">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="form-field-1" placeholder="用户名" class="col-xs-10 col-sm-10">
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" id="form-field-1" name="email" placeholder="Email" class="col-xs-10 col-sm-10">
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">密码:</label>
                                <div class="col-sm-9">
                                    <input type="password" id="form-field-1" name="password" placeholder="密码" class="col-xs-10 col-sm-10">
                                </div>
                            </div>
                            <div class="space-4"></div>
                           <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">确认密码:</label>
                                <div class="col-sm-9">
                                    <input type="password" id="form-field-1" name="password_confirmation" placeholder="确认密码" class="col-xs-10 col-sm-10">
                                </div>
                            </div>
                            <div class="space-4"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal-End -->
    <!-- Modal edit远程数据-->
    <div class="modal fade" tabindex="-1" role="dialog" id="mmmm" aria-labelledby="myModalLabel">

    </div>
    <!-- Modal 远程数据-->
@endsection
@section('script')
    <script>
        $("#mmmm").on("hidden.bs.modal", function() {
            $(this).removeData("bs.modal");
        });
    </script>

@endsection