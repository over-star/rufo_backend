@extends('layouts.app')

@section('content')
    @include('posts.show_fields')

    <div class="form-group">
           <a href="{!! route('posts.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
