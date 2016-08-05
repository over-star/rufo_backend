@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Post</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch']) !!}

            @include('posts.fields')

            {!! Form::close() !!}
        </div>
@endsection
