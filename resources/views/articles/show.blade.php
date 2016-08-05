@extends('layouts.app')

@section('content')
    @include('articles.show_fields')

    <div class="form-group">
           <a href="{!! route('articles.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
