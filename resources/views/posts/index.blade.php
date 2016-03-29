@extends('layout')

@section('content')
    <div class="aw-container-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs aw-nav-tabs active">
                        <li class="active"><a href="">Find</a></li>
                        <li><a href="">Latest</a></li>
                        <li><a href="" id="sort_control_hot">Hot</a></li>
                        <li><a href="">Recommend</a></li>
                        <li class="pull-right">
                            <div>
                                <a href="/posts/create" class="btn btn-success btn-md">
                                    <i class="fa fa-plus-circle"></i>New Post
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table id="posts-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                               <td>
                                   <a href="/posts/{{ $post->id }}">
                                       <i class="fa fa-eye"></i>{{ $post->title }}
                                   </a>
                               </td>
                               <td>{{ $post->subtitle }}</td>
                                <td>
                                    @if(Auth::check())
                                        {{ Auth::user()->name }}
                                    @endif
                                </td>
                                <td>
                                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-xs btn-info">
                                        <i class="fa fa-eye"></i>Edit
                                    </a>
                                    <form method="post" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-warning">
                                            <i class="fa fa-eye"></i>Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop