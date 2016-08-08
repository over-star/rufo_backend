<!-- Ddd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ddd', 'Ddd:') !!}
    {!! Form::text('ddd', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('background.posts.index') !!}" class="btn btn-default">取消</a>
</div>
