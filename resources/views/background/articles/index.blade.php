@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Articles</h1>
        <a class="btn btn-primary pull-right" style="margin-bottom: 10px" href="{!! route('background.articles.create') !!}">添加</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('background.articles.table')
        
@endsection
