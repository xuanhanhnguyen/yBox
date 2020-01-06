@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tạo bài viết học bổng</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('saveScholarship') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>

                @endforeach
            </div>
            @endif

            @if (session('thongbao'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                {{ session('thongbao') }}
            </div>
        </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input name="title" type="text" class="form-control" placeholder="Nhập tiêu đề">
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" type="text" class="form-control ckeditor" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
    
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
@stop