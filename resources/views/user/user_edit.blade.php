    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <form action="{{route('admin.user.update')}}" method="post" class="form-horizontal">
            <div class="modal-body">
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="form-field-1" value="{{$user->name}}" placeholder="用户名" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email:</label>
                            <div class="col-sm-9">
                                <input type="email" id="form-field-1" name="email" value="{{$user->email}}" placeholder="Email" class="col-xs-10 col-sm-10">
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">角色:</label>
                            <div class="col-sm-9">
                                @foreach($role as $k=>$v)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" @foreach($hasrole as $vv) @if($vv->role_id==$v->id)  checked @endif; @endforeach; name="role[]" value="{{$v->id}}">{{$v->name}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="space-4"></div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            </form>
        </div>
    </div>

