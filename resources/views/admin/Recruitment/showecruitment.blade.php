@extends('adminlte::page')

@section('title', 'Quản lí bài viết tuyển dụng')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách bài viết tuyển dụng</h3>
        <a style="float: right; margin-right: 20px;" href="{{ route('saveRecruitment') }}" class="btn btn-success btn-add">Thêm</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">id</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Tiêu đề</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Nội dung</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Like</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Comment</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Share</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="2">Tác vụ</th>

                            </tr>
                            @if (session('thongbao'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                                {{ session('thongbao') }}
                        </thead>
                        <tbody>
                            @endif
                            @foreach($recruitments as $recruitment)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$recruitment->id}}</td>
                                <td class="sorting_1">{{$recruitment->title}}</td>
                                <td class="sorting_1">{!!$recruitment->content!!}</td>
                                <td class="sorting_1">{{$recruitment->total_like}}</td>
                                <td class="sorting_1">{{$recruitment->total_coment}}</td>
                                <td class="sorting_1">{{$recruitment->total_share}}</td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-default btn-sm"><a href="update/{{ $recruitment->id }}">Sửa</a></button>
                                </td>
                                <td style="width: 50px;">
                                    <button type="button" class="btn btn-block btn-default btn-sm"><a href="delete/{{ $recruitment->id }}">Xóa</a></button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item ">{{$recruitments->links()}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

</div>
</div>
</div>
</div>
@stop