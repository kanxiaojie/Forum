<div class="row">

    {{  csrf_field() }}

    <div class="col-md-12">
        <div class="form-group col-md-4">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $title }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 border-left">
            <div class="form-group">
                <label for="subtitle">Subtitle:</label>
                <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ $subtitle }}">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="content">Content:</label>
            <textarea type="text" name="content" id="content" class="form-control" rows="15">
                {{ $content }}
            </textarea>
        </div>
    </div>

</div>