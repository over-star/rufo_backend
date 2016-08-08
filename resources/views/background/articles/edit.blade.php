@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">编辑 Articles</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($articles, ['route' => ['background.articles.update', $articles->id], 'method' => 'patch']) !!}

            @include('background.articles.fields')

            {!! Form::close() !!}
        </div>
@endsection
