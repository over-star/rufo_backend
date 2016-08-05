<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">添加菜单</h4>
        </div>
        <form action="{{route('admin.menu.update')}}" method="post" class="form-horizontal">
            <div class="modal-body">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{$menu->id}}">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单名称:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="form-field-1" value="{{$menu->name}}" placeholder="菜单名称:view-backend" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单url:</label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" value="{{$menu->url}}" name="url" placeholder="菜单url" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单激活active样式:</label>
                    <div class="col-sm-9">
                        <input type="text" value="active open" id="form-field-1" value="{{$menu->active}}" name="active" placeholder="菜单激活active" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单active_url:</label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" name="active_url" value="{{$menu->active_url}}" placeholder="菜单激活active_url" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 菜单sort排序值:</label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" name="sort" value="{{$menu->sort}}" placeholder="菜单sort排序值" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 父菜单:</label>
                    <div class="col-sm-9">
                        <select name="parent_id" class="form-control col-xs-10 col-sm-10">
                            <option value="0">顶级菜单</option>
                            @foreach($menus as $k=>$v)
                                <option @if($v->id==$menu->parent_id) selected @endif value="{{$v->id}}">@if($v->parent_id!=0)---@endif{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">是否系统菜单:</label>
                    <div class="col-sm-9">
                        <input type="radio" @if($menu->is_system!=0) checked @endif name="is_system" value="1">
                        \是
                        <input type="radio" @if($menu->is_system==0) checked @endif id="" name="is_system" value="0">
                        \否
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联权限:</label>
                    <div class="col-sm-9">
                        @foreach($permissions as $k=>$v)

                            <label for="" class="radio-inline">
                                <input type="radio" id="" @if($menu->permission_id==$v->id) checked @endif name="permission_id" value="{{$v->id}}">{{$v->name}}
                            </label>

                        @endforeach
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