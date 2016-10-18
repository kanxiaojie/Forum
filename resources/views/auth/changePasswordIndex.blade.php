@extends('layout')

@section('content')
    <div class="container-fluid">
        <h3>密码修改</h3>
        <hr/>

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="/changePassword/change" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">密码:</label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">确认密码:</label>
                        <div class="col-md-6">
                            <input type="password" id="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-4">
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary">确认修改</button>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group" style="margin-left: 2px">
                                <button type="reset" class="form-control btn btn-warning">重置密码</button>
                            </div>
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
@endsection
