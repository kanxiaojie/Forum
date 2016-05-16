@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <select type="text" id="province_id" name="province_id" class="form-control">
                        <option value="">请选择</option>
                        @foreach($provinces as $id => $name)
                            <option value="{{ $id }}" @if($id == 0) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <select type="text" id="city" name="city" class="form-control">
                    <option value="">请选择</option>
                    @foreach($cities as $id => $name)
                        <option value="{{ $id }}" @if($id == 0) selected @endif>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr/>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" id="areasAll">
                </th>
                <th>省份名称</th>
                <th>男性数据</th>
                <th>女性数据</th>
                <th>创建时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($provincesAllDatas as $province)
                <tr>
                    <td>
                        <input type="checkbox" class="areas" name="areas[]" value="{{ $province->id }}">
                    </td>
                    <td>{{ $province->name }}</td>
                    <td>{{ $province->maleNumber }}</td>
                    <td>{{ $province->femaleNumber }}</td>
                    <td>{{ $province->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr/>

        <div id="provinceAnalyseContainer" style="min-width: 1000px;height: 500px;margin: 0 auto" ></div>
    </div>
@endsection

