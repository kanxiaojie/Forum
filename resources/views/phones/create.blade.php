@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <h4>手机型号</h4>
        <hr/>

        <form enctype="multipart/form-data" method="post" action="/phones">

            @include('phones.form_phone', ['id' => old('id'),'name' => old('name'), 'width' => old('width'), 'height' => old('height'), 'area' => old('area'), 'area1' =>''])
            <hr/>
            <div class="form-group">
                <div class="col-md-12 text-left">
                    <button type="submit" class="btn btn-info">
                        确认添加
                    </button>
                </div>
            </div>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection