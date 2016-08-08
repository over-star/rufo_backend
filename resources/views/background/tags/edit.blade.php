@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">编辑 Tag</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tag, ['route' => ['background.tags.update', $tag->id], 'method' => 'patch']) !!}

            @include('background.tags.fields')

            {!! Form::close() !!}
        </div>
@endsection
