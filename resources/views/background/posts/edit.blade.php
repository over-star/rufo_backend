@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">编辑 Post</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($post, ['route' => ['background.posts.update', $post->id], 'method' => 'patch']) !!}

            @include('background.posts.fields')

            {!! Form::close() !!}
        </div>
@endsection
