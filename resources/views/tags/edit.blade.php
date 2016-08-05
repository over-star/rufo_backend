@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Tag</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'patch']) !!}

            @include('tags.fields')

            {!! Form::close() !!}
        </div>
@endsection
