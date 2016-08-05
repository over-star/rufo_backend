@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Article</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch']) !!}

            @include('articles.fields')

            {!! Form::close() !!}
        </div>
@endsection
