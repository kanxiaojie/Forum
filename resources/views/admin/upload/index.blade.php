@extends('layout')

@section('content')
    <div class="container-fluid">

        <div class="row page-title" style="padding-top: 30px">
            <div class="col-md-6">
                <h3 class="pull-left">Uploads</h3>
                <div class="pull-left">
                    <ul class="breadcrumb">
                        @foreach ($breadcrumbs as $path => $disp)
                            <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                        @endforeach
                        <li class="active">{{ $folderName }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <button class="btn btn-success btn-md"
                        data-toggle="modal"
                        data-target="#modal-folder-create">
                    <i class="fa fa-plus-circle"></i>New Folder
                </button>
                <button class="btn btn-primary btn-md"
                        data-toggle="modal"
                        data-target="#modal-file-upload">
                    <i class="fa fa-upload"></i>Upload
                </button>
            </div>
        </div>

    </div>
@stop