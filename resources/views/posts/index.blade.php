@extends('layout')

@section('content')
    <div class="container">
        <div class="row page-title-row" style="padding-top: 25px">
            <div class="col-md-6">
                <h4>Posts <small>» Listing</small></h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="/posts/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i>New Post
                </a>
                <a href="excel/posts/export" class="btn btn-info">
                    导出文章
                </a>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <div class="form-inline text-right">
                <input id="search" name="search" type="text" class="form-control" placeholder="输入关键字查询">
                <button type="submit" class="btn btn-info"><i class="icon-search"></i></button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table id="" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ trans('posts.title') }}</th>
                        <th>Subtitle</th>
                        <th>Author</th>
                        <th>Action</th>
                        <th>View Photos</th>
                        <th>verify</th>
                        <th>二维码</th>
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
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $post->id }}">
                                    Delete
                                </button>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/posts/{{ $post->id }}/photos">查看照片</a>
                            </td>
                            <td>
                                <form action="/posts/{{ $post->id }}/active1" method="post">
                                    {{ csrf_field() }}

                                    @if($post->active1 == 1)
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalActive1{{ $post->id }}">
                                            待审核
                                        </button>
                                    @elseif($post->active1 == 2)
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModalActive1{{ $post->id }}">
                                            审核未通过
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#exampleModalActive1{{ $post->id }}">
                                            审核通过
                                        </button>
                                    @endif

                                    <div class="modal fade" id="exampleModalActive1{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="text-center" id="exampleModalLabel">请选择审核类型</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="active1">审核结果：</label>
                                                        <select id="active1" name="active1" class="form-control">
                                                            <option value="2" @if($post->active1 == 2) selected @endif>审核未通过</option>
                                                            <option value="3" @if($post->active1 == 3) selected @endif>审核通过</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        取消
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">确定</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                                <div class="modal fade" id="modal-delete{{ $post->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">删除文章</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <h4 for="post_id">您确定要删除文章吗？</h4>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/posts/{{ $post->id }}" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">取消
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">确认</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                            <td>
                                <a class="btn btn-primary" href="/posts/{{ $post->id }}/QrCode" target="_blank">文章二维码</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>

        <div class="text-center">
            {!! $posts->links() !!}
        </div>
    </div>
@stop


