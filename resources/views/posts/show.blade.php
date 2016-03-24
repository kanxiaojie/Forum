@extends('layout')

@section('content')
    <div class="container aw-container-wrap">

        {{  csrf_field() }}

        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-8">
                    <h1>{{ $post->title }}</h1>
                    <h4>{{ $post->subtitle }}</h4>
                </div>
                <div class="content col-md-12">
                    <hr>
                    {!! nl2br($post->content) !!}
                </div>
            </div>
        </div>

        <div class="row aw-mod aw-question-comment">
            @include('comments.reviewlist')
        </div>

            @include('comments.create')

    </div>
@stop
