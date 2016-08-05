@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Posts</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('posts.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('posts.table')
        
@endsection
