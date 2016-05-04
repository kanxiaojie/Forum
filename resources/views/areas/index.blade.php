@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <select id="province" name="province" class="form-control">
                        <option>-- 省份 --</option>
                        @foreach($provinces as $province)
                            <option>-- {{ $province->name }} --</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <select id="city" name="city" class="form-control">
                    <option>-- 城市 --</option>
                </select>
            </div>

            <div class="col-md-2">
                <select id="countyCity" name="countyCity" class="form-control">
                    <option>-- 县级市 --</option>
                </select>
            </div>

            <div class="col-md-2">
                <select id="town" name="town" class="form-control">
                    <option>-- 乡镇 --</option>
                </select>
            </div>
        </div>
    </div>
@endsection