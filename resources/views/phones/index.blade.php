@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-3 pull-left">
                    <a href="/phones/create" class="btn btn-primary">
                        增加联系人
                    </a>
                </div>
            </div>
            <hr/>

            <table class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                    <td>编号</td>
                    <td>姓名</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($phones as $phone)
                    <tr>
                        <td>{{ $phone->id }}</td>
                        <td>{{ $phone->name }}</td>
                        <td>
                            <form action="/phones/{{ $phone->id }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">

                                <a href="/phones/{{ $phone->id }}/edit" class="btn btn-info">编辑</a>
                                <button type="submit" class="btn btn-danger">
                                    删除
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection