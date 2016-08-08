@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">创建 Tag</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'background.tags.store']) !!}

            @include('background.tags.fields')

        {!! Form::close() !!}
    </div>
@endsection
