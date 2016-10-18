<div class="row col-md-6">
    {{ csrf_field() }}

    <input type="hidden" id="id" name="id" value="{{ $id }}">
    <div class="form-group">
        <label for="name">名称:</label>
        <input id="name" name="name" class="form-control" type="text" value="{{ $name }}">
    </div>
    <div class="form-group">
        <label for="height">手机尺寸:(长 mm)<span>(必填项)</span></label>
        <input type="text" placeholder="只能输入数字" onkeyup="value=value.replace(/[^\-?\d.]/g,'')" name="height" id="height" class="form-control" value="{{ $height }}" required>
    </div>
    <div class="form-group">
        <label for="width">手机尺寸:(宽 mm)<span>(必填项)</span></label>
        <input type="text" placeholder="只能输入数字" onkeyup="value=value.replace(/[^\-?\d.]/g,'')" name="width" id="width" class="form-control" value="{{ $width }}" required>
    </div>

    <div class="form-group">
        <label for="area1">总面积:(平方米)</label>
        <input type="text" placeholder="自动计算面积值" id="area1" name="area1" class="form-control" value="{{ $area1 }}" disabled>
    </div>

    <input type="hidden" name="area" id="area" value="{{ $area1 }}">
</div>
