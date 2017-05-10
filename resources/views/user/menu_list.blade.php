@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                菜单管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    菜单列表
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

                            <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addpermission" style="margin-bottom: 10px">添加菜单</a>

                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <span class="lbl">序号</span>
                                        </label>
                                    </th>
                                    <th>菜单名称</th>
                                    <th>菜单url</th>
                                    <th>
                                        <i class="icon-time bigger-110 hidden-480"></i>
                                        创建时间
                                    </th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($menus as $k=>$v)
                                <tr class="">
                                    <td class="center">
                                        <label>
                                            <span class="lbl">{{$k+1}}</span>
                                        </label>
                                    </td>

                                    <td>
                                        <a href="#">{{$v->name}}</a>
                                    </td>
                                    <td>{{$v->url}}</td>
                                    <td class="hidden-480">{{$v->created_at}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a data-toggle="modal"  data-target="#mmmm" class="btn btn-xs btn-info" href="{{url('admin/menu/edit',['id'=>$v->id])}}">
                                                <i class="icon-edit bigger-120">编辑</i>
                                            </a>
                                            @if($v->is_system==0)
                                            <a class="btn btn-xs btn-danger" data-toggle="modal"  data-target="#confirm-delete" data-href="{{url('admin/menu/delete',['id'=>$v->id])}}">
                                                <i class="icon-trash bigger-120">删除</i>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                {!! $menus->render() !!}
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addpermission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加菜单</h4>
                </div>

                <form action="{{route('admin.menu')}}" method="post" class="form-horizontal">
                <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单名称:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" placeholder="菜单名称:view-backend" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单url:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="url" placeholder="菜单url" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单样式:</label>
                            <div class="col-sm-9">
                                <input type="text" value="active open" id="form-field-1" name="active" placeholder="菜单active" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单active_url:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="active_url" placeholder="菜单激活active_url" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单图标:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="icon" placeholder="菜单图标" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单sort排序值:</label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="sort" placeholder="菜单sort排序值" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 父菜单:</label>
                            <div class="col-sm-9">
                                <select name="parent_id" class="form-control col-xs-10 col-sm-10">
                                    <option value="0">顶级菜单</option>
                                    @foreach($menus as $k=>$v)
                                        <option value="{{$v->id}}">@if($v->parent_id!=0)---@endif{{$v->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">是否系统菜单:</label>
                            <div class="col-sm-9">
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="is_system" value="1">
                                        是
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked id="" name="is_system" value="0">
                                        否
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="space-4"></div>
                         <div class="form-group">
                           <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联权限:</label>
                           <div class="col-sm-9">
                               <select style="width: 85%" class="select2" name="permission_id">
                               @foreach($permissions as $k=>$v)
                                       <option value="{{$v->id}}">{{$v->display_name}}</option>
                               @endforeach
                               </select>
                           </div>
                       </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>

                </div>
                </form>
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
        $('.select2').select2();
    </script>
@endsection