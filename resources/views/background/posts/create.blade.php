@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">创建 Post</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'background.posts.store']) !!}

            @include('background.posts.fields')

        {!! Form::close() !!}
    </div>
@endsection
