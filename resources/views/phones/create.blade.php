@extends('layout')

@section('content')
    <div class="container" style="padding-top: 45px">
        <h4>增加联系人</h4>
        <hr/>

        <form enctype="multipart/form-data" method="post" action="/phones">

            @include('phones.form_phone', ['name' => old('name')])
            <hr/>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info">
                        增加联系人
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