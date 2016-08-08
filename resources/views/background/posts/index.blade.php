@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Posts</h1>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('background.posts.create') !!}">添加</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('background.posts.table')
        
@endsection
