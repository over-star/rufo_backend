<table class="table table-responsive" id="articles-table">
    <thead>
        <th>Title</th>
        <th>Content</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($articles as $articles)
        <tr>
            <td>{!! $articles->title !!}</td>
            <td>{!! $articles->content !!}</td>
            <td>
                {!! Form::open(['route' => ['background.articles.destroy', $articles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('background.articles.show', [$articles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('background.articles.edit', [$articles->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
