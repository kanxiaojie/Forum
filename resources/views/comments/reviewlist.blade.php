@inject('comments', 'App\Comment')

<div class="container">
    <div class="mod-head">
        <ul class="nav nav-tabs aw-nav-tabs active">
            <li><a href="#">关注的人</a></li>
            <li><a href="#">时间 <i class="icon icon-up"></i></a></li>
            <li class="active"><a href="#">票数</a></li>
        </ul>
    </div>

    <div class="mod-body">
        @foreach($post->comments()->orderBy('id')->get() as $comment)
            {{ $comment->statement }}
            <hr/>
        @endforeach
    </div>
</div>
