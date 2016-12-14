@extends('layout')

@section('content')
    <div class="container">
        {!! QrCode::size(500)->color(20,157,210)->generate('http://'.$_SERVER['HTTP_HOST'].'/posts'.$id); !!}
    </div>
@stop