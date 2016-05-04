<div class="row">
    {{ csrf_field() }}

    <div class="form-group">
        <div class="col-md-5 form-inline">
            姓名:

            <input id="name" name="name" class="form-control" type="text" value="{{ $name }}">
        </div>
    </div>
</div>
