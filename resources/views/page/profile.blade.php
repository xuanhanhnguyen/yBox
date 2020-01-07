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
        <input id="changImage" type="file" name="image" onchange="document.getElementById('image').submit()" class="d-none">
    </form>
</section>

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                    <img width="170px" height="170px" src="upload/avatar/{{Auth::user()->avatar}}" alt="">
                                    <a onclick="document.getElementById('avatar').click()"><i class="fa fa-camera"></i></a>
                                    <form role="form" action="{{route('changeAvatar')}}" method="POST" id="changAvatar" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="avatar" id="avatar" onchange="document.getElementById('changAvatar').submit()" class="d-none">
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
                                </div>
                            </div>
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-9">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec mb-3 text-center">
                                @if ($message = Session::get('success'))
                                <div class="w3-panel w3-green w3-display-container">
                                    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                                    <p>{!! $message !!}</p>
                                </div>
                                <?php Session::forget('success'); ?>
                                @endif

                                @if ($message = Session::get('error'))
                                <div class="w3-panel w3-red w3-display-container">
                                    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                                    <p>{!! $message !!}</p>
                                </div>
                                <?php Session::forget('error'); ?>
                                @endif
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Launch demo modal
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="w3-container">


                                                <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form" action="{!! URL::to('paypal') !!}">
                                                    <div class="w3-container w3-teal w3-padding-16">Paywith Paypal</div>
                                                    {{ csrf_field() }}
                                                    <h2 class="w3-text-blue">Payment Form</h2>
                                                    <p>Demo PayPal form - Integrating paypal in laravel</p>
                                                    <label class="w3-text-blue"><b>Enter Amount</b></label>
                                                    <input class="w3-input w3-border" id="amount" type="text" name="amount"></p>
                                                    <button class="w3-btn w3-blue">Pay with PayPal</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--user-tab-sec end-->
                            <div class="product-feed-tab current" id="feed-dd">
                                <div class="posts-section">
                                    <div class="post-bar p-4">
                                        <div class="text-center">
                                            <h3>Thông tin cá nhân: <span class="text-danger">(*)</span></h3>
                                        </div>
                                        <hr width="100%">
                                        <form method="POST" action="{{route('edit_user')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="mb-2">Họ & tên: <span class="text-danger">(*)</span></label>
                                                <input type="text" name="fullname" class="form-control" value="{{Auth::user()->full_name}}" placeholder="Nguyễn Văn A">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-2">Email: <span class="text-danger">(*)</span></label>
                                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
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