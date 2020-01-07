<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="page" title=""><img src="images/logo.png" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
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
                    <li>
                        <a title="" class="not-box-open">
                            <span><img src="images/icon7.png" alt=""></span>
                            Thông báo
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img1.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.
                                        </h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img2.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.
                                        </h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img3.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.
                                        </h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img2.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.
                                        </h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="view-all-nots">
                                    <a href="#" title="">View All Notification</a>
                                </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
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