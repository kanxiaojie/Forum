@extends('layout')

@section('content')
    <div class="aw-container-wrap">
        {{ csrf_field() }}
        <h1>Write Your Post Below</h1>
        <hr>
        <form method="post" action="/posts" enctype="multipart/form-data">

            @include('posts.form',['title' => old('title'), 'subtitle' => old('subtitle'), 'content' => old('content')])

            <div class="col-md-12">
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($error->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@stop