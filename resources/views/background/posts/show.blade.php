@extends('layouts.app')

@section('content')
    @include('background.posts.show_fields')

    <div class="form-group">
           <a href="{!! route('background.posts.index') !!}" class="btn btn-default">返回</a>
    </div>
@endsection
