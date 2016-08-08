<table class="table table-striped table-bordered table-hover" id="posts-table">
    <thead>
        <th>Ddd</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{!! $post->ddd !!}</td>
            <td>
                {!! Form::open(['route' => ['background.posts.destroy', $post->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('background.posts.show', [$post->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-eye-open">查看</i></a>
                    <a href="{!! route('background.posts.edit', [$post->id]) !!}" class='btn btn-default btn-xs'>
                    <i class="glyphicon glyphicon-edit">编辑</i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">删除</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('你确定要删除?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
