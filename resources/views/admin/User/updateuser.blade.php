@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin người dùng</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{$user->id}}" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1">Role</label>
                <select class="form-control" name="role_id">
                    @foreach($roles as $role)
                    <option @if($role->id == $user->role_id)
                        {{"selected"}}
                        @endif
                        value="{{ $role->id }}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên</label>
                <input name="full_name" type="text" class="form-control"  value="{{$user->full_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email:</label>
                <input name="email" type="text" class="form-control" value="{{$user->email}}">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Password:</label>
                <input name="password" type="password" class="form-control" placeholder="*******" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nhập lại password:</label>
                <input name="r_password" type="password" class="form-control" placeholder="*******" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giới tính:</label>
                <label class="radio-inline">
                    <input name="gender" value="1" checked="" type="radio" 
                    @if($user->gender == 1)
                    {{"checked"}}
                    @endif
                    >Nam
                </label>
                <label class="radio-inline">
                    <input name="gender" value="0" type="radio"
                    @if($user->gender == 0)
                    {{"checked"}}
                    @endif
                    >Nữ
                </label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <p><img width="100px;" src="/images/{{ $user->avatar }}" />
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>

                    </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
    </form>
</div>
@stop