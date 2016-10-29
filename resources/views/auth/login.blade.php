@extends('layouts.app')

@section('content')

    {{--<div class="row" style="background: url('/images/photos/QQ截图20160510224312.png');height: 490px;margin: 0px;">--}}
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="text-align: center">
            <div class="h3" style="color: #3673b6;">个人信息管理</div>

            <div class="panel panel-default" style="background: #EAEAEA;padding-top: 25px;padding-bottom:5px;padding-left: 50px;padding-right: 50px;">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input class="form-control" name="email" placeholder="请输入用户邮箱" value="">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="请输入密码">

                        </div>

                        <div class="form-group" style="padding-top: 10px;">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>

                            </div>
                        </div>
                    </form>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

{{--<img src="/images/photos/QQ截图20160510223038.png" style="border-radius: 0px;margin-bottom: 0px;" alt>--}}
@endsection
