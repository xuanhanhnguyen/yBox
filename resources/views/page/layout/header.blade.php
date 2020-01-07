<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="page" title=""><img src="images/logo.png" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">
                <form method="get" action="{{route('user.post.search')}}">
                    <input type="text" name="search" placeholder="Tìm kiếm học bổng...">
                    <button style="cursor:pointer" type="submit"><i class="la la-search"></i></button>
                </form>
            </div><!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="page" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                            Trang chủ
                        </a>
                    </li>
                    {{-------------------}}
                    <li>
                        <a href="page/tuyen-dung" title="">
                            <span><img src="images/icon2.png" alt=""></span>
                            Tuyển dụng
                        </a>
                    </li>
                    {{-------------------}}
                    <li>
                        <a href="page/hoc-bong" title="">
                            <span><img src="images/icon3.png" alt=""></span>
                            Học bổng
                        </a>
                    </li>
                    {{-------------------}}
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account" style="width: 118px;">

                @if(Auth::user() !== null)
                    <div class="user-info">
                        <img height="30px" width="30px"
                             src="upload/avatar/{{Auth::user()->avatar}}" alt="">
                        <a>{{Auth::user()->full_name}}</a>
                        <i style="right: 3px;cursor: pointer;" class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss">
                        <ul class="us-links">
                            <li><a href="page/profile" title="">Trang cá nhân</a></li>
                            <li><a href="#" title="">Đổi mật khẩu</a></li>
                        </ul>
                        <h3 class="tc"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>Đăng
                                xuất</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </h3>
                    </div><!--user-account-settingss end-->
                @else
                    <div class="user-info text-center" style="padding-top:20px">
                        <a href="{{route('login')}}" style="float:none">Đăng nhập</a>
                    </div>
                @endif
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->