@extends('layout')

@section('content')
    <div class="text-center">
        <h3>{{ $post->subtitle }}</h3>
    </div>
    <hr/>
    <h4 class="text-center">照片浏览</h4>
    <hr/>

    @foreach($post->photo->chunk(4) as $set)
        <div class="row">
            @foreach($set as $photo)
                <div class="col-md-3 gallery__image">
                    <form action="/posts/photos/{{ $photo->id }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">删除</button>
                    </form>

                    <a href="/{{ $photo->path }}" data-lity>
                        <h5 style="position: absolute;padding-top: 170px;padding-left: 30px;">{{ $photo->created_at }}</h5>
                        <img src="/{{ $photo->thumbnail_path }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach

    <form id="addPhotosForm"
          action="{{ route('store_photo_path', $post_id) }}"
          method="POST"
          class="dropzone"
          enctype="multipart/form-data"
    >
        {{ csrf_field() }}
    </form>

    <hr/>
    <div class="col-md-2 col-md-offset-5">
        <div class="form-group" style="margin-top: 20px">
            <a href="/posts" class="form-control btn btn-primary">提交照片</a>
        </div>
    </div>

@endsection
