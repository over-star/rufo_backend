<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">添加角色</h4>
        </div>

        <form action="{{route('admin.role.update')}}" method="post" class="form-horizontal">
            <div class="modal-body">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{$role->id}}">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色标示:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{$role->name}}" id="form-field-1" placeholder="权限标识:view-backend" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 角色显示名:</label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" value="{{$role->display_name}}" name="display_name" placeholder="权限显示名" class="col-xs-10 col-sm-10">
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">角色描述:</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="" cols="43" rows="9">{{$role->description}}</textarea>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">关联权限:</label>
                    <div class="col-sm-9">
                        @foreach($permission as $k=>$v)
                            <label class="checkbox-inline">
                                <input type="checkbox" @foreach($haspremission as $vv) @if($vv->permission_id==$v->id)  checked @endif; @endforeach; name="join_permission[]" value="{{$v->id}}">{{$v->name}}
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
