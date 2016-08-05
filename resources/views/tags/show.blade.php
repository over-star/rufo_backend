@extends('layouts.app')

@section('content')
    @include('tags.show_fields')

    <div class="form-group">
           <a href="{!! route('tags.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
