@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row" style="padding-top: 25px">
            <div class="col-md-6">
                <h4>Posts <small>» Listing</small></h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="/posts/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i>New Post
                </a>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-12">
                <table id="" class="table table-striped table-bordered">
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
                            <td style="vertical-align: middle">
                                <a href="/posts/{{ $post->id }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td  style="vertical-align: middle">{{ $post->subtitle }}</td>
                            <td  style="vertical-align: middle">
                                @if($signedIn)
                                    {{ $user->name }}
                                @endif
                            </td>
                            <td  style="vertical-align: middle">
                                <a href="/posts/{{ $post->id }}/edit" class="btn btn-info">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                    Delete
                                </button>
                                {{--<form method="post" action="/posts/{{ $post->id }}" enctype="multipart/form-data">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<input type="hidden" name="_method" value="{{ csrf_token() }}">--}}
                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                {{--<a href="/posts/{{ $post->id }}/edit" class="btn btn-info">--}}
                                {{--Edit--}}
                                {{--</a>--}}
                                {{--<button type="submit" class="btn btn-warning">--}}
                                {{--Delete--}}
                                {{--</button>--}}
                                {{--</form>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pull-right">
            {!! $posts->links() !!}
        </div>


        {{-- 确认删除 --}}
        {{--<div class="modal fade" id="modal-delete" tabIndex="-1">--}}
            {{--<div class="modal-dialog">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">--}}
                            {{--×--}}
                        {{--</button>--}}
                        {{--<h4 class="modal-title">Please Confirm</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<p class="lead">--}}
                            {{--<i class="fa fa-question-circle fa-lg"></i>--}}
                            {{--Are you sure you want to delete this post?--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<form method="POST" action="/posts/{{ $post->id }}">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                            {{--<button type="submit" class="btn btn-danger">--}}
                                {{--<i class="fa fa-times-circle"></i> Yes--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#posts-table").DataTable({
                order: [[0, "desc"]]
            });
        });
    </script>
@stop
