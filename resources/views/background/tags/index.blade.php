@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Tags</h1>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('background.tags.create') !!}">添加</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('background.tags.table')
        
@endsection
