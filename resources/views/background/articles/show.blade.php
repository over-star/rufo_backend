@extends('layouts.app')

@section('content')
    @include('background.articles.show_fields')

    <div class="form-group">
           <a href="{!! route('background.articles.index') !!}" class="btn btn-default">返回</a>
    </div>
@endsection
