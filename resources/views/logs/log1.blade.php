@extends('layouts.app')

@section('content')
        <iframe src="{{url('log-viewer/logs')}}" width="100%" height="720px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" onLoad="iFrameHeight()"></iframe>
@endsection
@section('script')

@endsection