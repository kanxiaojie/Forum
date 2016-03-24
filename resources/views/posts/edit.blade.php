@extends('layout')

@section('content')
    <div class="aw-container-wrap">
        <div class="row page-title">
            <div class="col-md-12">
                <h3>Post <small>» Edit Post</small></h3>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <form method="post" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        @include('posts.form',['title' => $post ->title,'subtitle' => $post->subtitle,'content' => $post->content])

                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary" name="action" value="continue">
                                        <i class="fa fa-floppy-o"></i>
                                        Save - Continue
                                    </button>
                                    <button type="submit" class="btn btn-success" name="action" value="finished">
                                        <i class="fa fa-floppy-o"></i>
                                        Save - Finished
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop