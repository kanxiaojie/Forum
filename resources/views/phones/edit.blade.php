@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <h4>修改联系人</h4>
        <hr/>

        <form enctype="multipart/form-data" method="post" action="/phones/{{ $phone->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            @include('phones.form_phone', ['id' => $phone->id,'name' => $phone->name, 'width' => $phone->width, 'height' => $phone->height, 'area' => $phone->area, 'area1' => $phone->area])
            <hr/>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info">
                        修改信息
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