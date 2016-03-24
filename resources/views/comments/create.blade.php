<div class="row">
    <hr>
    <div class="col-md-12 form-group aw-replay-box">
        <div class="mod-head">
            <a
                href="#"
                class="aw-user-name"><img alt="{{ Auth::user()->name }}"
                src="http://wenda.golaravel.com/static/common/avatar-mid-img.png">
            </a>
            <p>
                <label class="pull-right">
                    <input type="checkbox" checked="checked" value="1" name="auto_focus"> 关注问题
                </label>
            </p>
        </div>
        <form method="post" action="/posts/{id}/comments" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <textarea type="text" id="statement" name="statement" class="form-control" rows="10">
                    {{ old('statement') }}
                </textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $id }}">
            <div class="mod-body">
                <button type="submit" class="btn btn-primary pull-right">Answer</button>
                <span class="pull-right text-color-999" id="answer_content_message">&nbsp;</span>
            </div>
        </form>
    </div>
</div>