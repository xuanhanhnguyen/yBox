@extends('page.layout.content')
@section('title')
    {{Auth::user()->full_name}}
@endsection
@section('content')
    <section class="cover-sec">
        <img width="100%" height="400px" src="upload/image/{{Auth::user()->image}}" alt="">
        <a onclick="document.getElementById('changImage').click()"><i class="fa fa-camera"></i></a>
        <form role="form" id="image" action="{{route('changeAvatar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input id="changImage" type="file" name="image" onchange="document.getElementById('image').submit()"
                   class="d-none">
        </form>
    </section>

    <main class="p-0">
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3" style="padding-top: 60px">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img width="170px" height="170px" src="upload/avatar/{{Auth::user()->avatar}}"
                                             alt="">
                                        <a onclick="document.getElementById('avatar').click()"><i
                                                    class="fa fa-camera"></i></a>
                                        <form role="form" action="{{route('changeAvatar')}}" method="POST"
                                              id="changAvatar" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="avatar" id="avatar"
                                                   onchange="document.getElementById('changAvatar').submit()"
                                                   class="d-none">
                                        </form>
                                    </div>
                                    <!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-status">
                                            <li>
                                                <b>{{Auth::user()->full_name}}</b>
                                                <p>{{Auth::user()->total_follow}} Người theo dõi</p>
                                            </li>
                                        </ul>
                                        <div class="user-tab-sec mb-3 text-center">
                                            <button class="btn btn-danger">Thanh toán Paypal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-9">
                            <div class="main-ws-sec">
                                <div class="tab-feed st2 my-4">
                                    <ul>
                                        <li data-tab="feed-dd" class="active">
                                            <a href="#" title="">
                                                <img src="images/ic4.png" alt="">
                                                <span>Bài viết đã share</span>
                                            </a>
                                        </li>
                                        <li data-tab="info-dd">
                                            <a href="#" title="">
                                                <img src="images/ic1.png" alt="">
                                                <span>Thông tin cá nhân</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                                <div class="product-feed-tab animated fadeIn current" id="feed-dd">
                                    <div class="posts-section">
                                        @foreach($data as $item)
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img width="50px" height="50px"
                                                             src="upload/avatar/{{Auth::user()->avatar}}" alt="avatar">
                                                        <div class="usy-name">
                                                            <h3>{{Auth::user()->full_name}}</h3>
                                                            <span><img src="images/clock.png" alt="">
                                                                {{Helper::getTimeAgo($item->time)}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i
                                                                    class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Gỡ share</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @if($item->content_share != '')
                                                <div class="job_descp pb-0">
                                                    <h3>{{$item->content_share}}</h3>
                                                </div>
                                                @endif
                                                <div class="post-bar mb-0 mt-2">
                                                    <div class="d-flex">
                                                        <div class="thubnail">
                                                            <a href="http://localhost/passtime/yBox/public/page/hoc-bong/{{$item->id}}"><img
                                                                        style="width: 310px; padding:5px 10px"
                                                                        src="upload/scholarship/{{$item->image}}"
                                                                        alt=""></a>
                                                        </div>
                                                        <div class="usy-dt p-1">
                                                            <img width="50px" height="50px"
                                                                 src="upload/avatar/{{$item->avatar}}" alt="avatar">
                                                            <div class="usy-name">
                                                                <h3>{{$item->full_name}}</h3>
                                                                <span><img src="images/clock.png" alt="">
                                                                    {{Helper::getTimeAgo($item->created_at)}}</span>
                                                            </div>
                                                            <div class="content-post py-3" style="clear: both">
                                                                <h3 class="font-weight-bold">{{$item->title}}</h3>
                                                                <p class="d-inline-block text-truncate" style="max-width: 200px">{{$item->content}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="job-status-bar">
                                                        <ul class="like-com">
                                                            <li>
                                                                <a ><i class="la la-heart"></i> Like</a>
                                                                <img src="images/liked-img.png" alt="">
                                                                <span>{{$item->total_like}}</span>
                                                            </li>
                                                            <li><a class="com"><img
                                                                            src="images/com.png">
                                                                    {{$item->total_coment}} Bình luận</a>
                                                            </li>
                                                            <li><a class="com">
                                                                    <i class="fa fa-share-alt"></i>
                                                                    {{$item->total_coment}} Chia sẻ</a>
                                                            </li>
                                                        </ul>
                                                        <a><i class="la la-eye"></i>{{$item->total_view}} Xem</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--post-bar end-->
                                        @endforeach
                                        <div class="process-comm p-0">
                                            <div class="spinner">
                                                <div class="bounce1"></div>
                                                <div class="bounce2"></div>
                                                <div class="bounce3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--end-tabs-->
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="posts-section">
                                        <div class="post-bar p-4">
                                            <div class="text-center">
                                                <h3>Thông tin cá nhân: <span class="text-danger">(*)</span></h3>
                                            </div>
                                            <hr width="100%">
                                            <form method="POST" action="{{route('edit_user')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="mb-2">Họ & tên: <span
                                                                class="text-danger">(*)</span></label>
                                                    <input type="text" name="fullname" class="form-control"
                                                           value="{{Auth::user()->full_name}}"
                                                           placeholder="Nguyễn Văn A">
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-2">Email: <span
                                                                class="text-danger">(*)</span></label>
                                                    <input type="email" name="email" value="{{Auth::user()->email}}"
                                                           class="form-control" id="exampleInputEmail1"
                                                           aria-describedby="emailHelp" placeholder="Email">
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-4 px-0">
                                                        <label class="mb-2">Giới tính:</label>
                                                        <select class="form-control" name="gender">
                                                            @if(Auth::user()->gender == '1')
                                                                <option selected value="1">Nam</option>
                                                                <option value="0">Nữ</option>
                                                                <option value="2">Khác</option>
                                                            @elseif(Auth::user()->gender == '2')
                                                                <option value="1">Nam</option>
                                                                <option value="0">Nữ</option>
                                                                <option selected value="2">Khác</option>
                                                            @elseif(Auth::user()->gender == '0')
                                                                <option value="1">Nam</option>
                                                                <option selected value="0">Nữ</option>
                                                                <option value="2">Khác</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!--posts-section end-->
                                </div>
                            </div>
                            <!--main-ws-sec end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>


@endsection