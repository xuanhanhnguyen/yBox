@extends('page.layout.content')
@section('title', 'Trang chủ')
@section('content')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="carousel px-3 slide" id="carouselExampleIndicators" data-ride="carousel">
                    <div class="p-3 tabs">
                        <h3 class="text-light font-weight-bold">Bài viết đã lưu</h3>
                        <div>
                            <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-inner ">
                        <div class="carousel-item active">
                            <div class="post-bar">
                                <div class="post_topbar">
                                    <div class="usy-dt">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                        <div class="usy-name">
                                            <h3>John Doe</h3>
                                            <span><img src="images/clock.png" alt="">3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                        <ul class="ed-options">
                                            <li><a href="#" title="">Edit Post</a></li>
                                            <li><a href="#" title="">Unsaved</a></li>
                                            <li><a href="#" title="">Unbid</a></li>
                                            <li><a href="#" title="">Close</a></li>
                                            <li><a href="#" title="">Hide</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="epi-sec">
                                    <ul class="descp">
                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                    </ul>
                                    <ul class="bk-links">
                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="job_descp">
                                    <h3>Senior Wordpress Developer</h3>
                                    <ul class="job-dt">
                                        <li><a href="#" title="">Full Time</a></li>
                                        <li><span>$30 / hr</span></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                        luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                        magna sit amet... <a href="#" title="">view more</a></p>
                                    <ul class="skill-tags">
                                        <li><a href="#" title="">HTML</a></li>
                                        <li><a href="#" title="">PHP</a></li>
                                        <li><a href="#" title="">CSS</a></li>
                                        <li><a href="#" title="">Javascript</a></li>
                                        <li><a href="#" title="">Wordpress</a></li>
                                    </ul>
                                </div>
                                <div class="job-status-bar">
                                    <ul class="like-com">
                                        <li>
                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                            <img src="images/liked-img.png" alt="">
                                            <span>25</span>
                                        </li>
                                        <li><a href="#" title="" class="com"><img src="images/com.png"
                                                                                  alt=""> Comment 15</a>
                                        </li>
                                    </ul>
                                    <a><i class="la la-eye"></i>Views 50</a>
                                </div>
                            </div><!--post-bar end-->
                        </div>
                        <div class="carousel-item">
                            <div class="post-bar">
                                <div class="post_topbar">
                                    <div class="usy-dt">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                        <div class="usy-name">
                                            <h3>John Doe</h3>
                                            <span><img src="images/clock.png" alt="">3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                        <ul class="ed-options">
                                            <li><a href="#" title="">Edit Post</a></li>
                                            <li><a href="#" title="">Unsaved</a></li>
                                            <li><a href="#" title="">Unbid</a></li>
                                            <li><a href="#" title="">Close</a></li>
                                            <li><a href="#" title="">Hide</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="epi-sec">
                                    <ul class="descp">
                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                    </ul>
                                    <ul class="bk-links">
                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="job_descp">
                                    <h3>Senior Wordpress Developer</h3>
                                    <ul class="job-dt">
                                        <li><a href="#" title="">Full Time</a></li>
                                        <li><span>$30 / hr</span></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                        luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                        magna sit amet... <a href="#" title="">view more</a></p>
                                    <ul class="skill-tags">
                                        <li><a href="#" title="">HTML</a></li>
                                        <li><a href="#" title="">PHP</a></li>
                                        <li><a href="#" title="">CSS</a></li>
                                        <li><a href="#" title="">Javascript</a></li>
                                        <li><a href="#" title="">Wordpress</a></li>
                                    </ul>
                                </div>
                                <div class="job-status-bar">
                                    <ul class="like-com">
                                        <li>
                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                            <img src="images/liked-img.png" alt="">
                                            <span>25</span>
                                        </li>
                                        <li><a href="#" title="" class="com"><img src="images/com.png"
                                                                                  alt=""> Comment 15</a>
                                        </li>
                                    </ul>
                                    <a><i class="la la-eye"></i>Views 50</a>
                                </div>
                            </div><!--post-bar end-->
                        </div>
                        <div class="carousel-item">
                            <div class="post-bar">
                                <div class="post_topbar">
                                    <div class="usy-dt">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                        <div class="usy-name">
                                            <h3>John Doe</h3>
                                            <span><img src="images/clock.png" alt="">3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                        <ul class="ed-options">
                                            <li><a href="#" title="">Edit Post</a></li>
                                            <li><a href="#" title="">Unsaved</a></li>
                                            <li><a href="#" title="">Unbid</a></li>
                                            <li><a href="#" title="">Close</a></li>
                                            <li><a href="#" title="">Hide</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="epi-sec">
                                    <ul class="descp">
                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                    </ul>
                                    <ul class="bk-links">
                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="job_descp">
                                    <h3>Senior Wordpress Developer</h3>
                                    <ul class="job-dt">
                                        <li><a href="#" title="">Full Time</a></li>
                                        <li><span>$30 / hr</span></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                        luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                        magna sit amet... <a href="#" title="">view more</a></p>
                                    <ul class="skill-tags">
                                        <li><a href="#" title="">HTML</a></li>
                                        <li><a href="#" title="">PHP</a></li>
                                        <li><a href="#" title="">CSS</a></li>
                                        <li><a href="#" title="">Javascript</a></li>
                                        <li><a href="#" title="">Wordpress</a></li>
                                    </ul>
                                </div>
                                <div class="job-status-bar">
                                    <ul class="like-com">
                                        <li>
                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                            <img src="images/liked-img.png" alt="">
                                            <span>25</span>
                                        </li>
                                        <li><a href="#" title="" class="com"><img src="images/com.png"
                                                                                  alt=""> Comment 15</a>
                                        </li>
                                    </ul>
                                    <a><i class="la la-eye"></i>Views 50</a>
                                </div>
                            </div><!--post-bar end-->
                        </div>
                    </div>
                </div>
                {{----------------end carousel save--}}
                <div class="slide2 px-3">
                    <div class="tabs p-3">
                        <h3 class="text-light font-weight-bold">Bài viết đã like</h3>
                    </div>
                    <div class="profiles-slider pt-1">
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img
                                                src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img
                                                src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img
                                                src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img
                                                src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img
                                                src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img
                                                src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                    </div><!--profiles-slider end-->
                </div><!--top-profiles end-->
                {{----}}
                <div class="main-section-data">
                    <hr width="100%" class="mx-3" color="#e44d3a">
                    <div class="row">
                        <div class="col-md-4 no-pd">
                            <div class="post-bar">
                                <div class="post_topbar">
                                    <div class="usy-dt">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                        <div class="usy-name">
                                            <h3>John Doe</h3>
                                            <span><img src="images/clock.png" alt="">3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="ed-opts">
                                        <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                        <ul class="ed-options">
                                            <li><a href="#" title="">Edit Post</a></li>
                                            <li><a href="#" title="">Unsaved</a></li>
                                            <li><a href="#" title="">Unbid</a></li>
                                            <li><a href="#" title="">Close</a></li>
                                            <li><a href="#" title="">Hide</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="epi-sec">
                                    <ul class="descp">
                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                    </ul>
                                    <ul class="bk-links">
                                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                    </ul>
                                </div>
                                <div class="job_descp">
                                    <h3>Senior Wordpress Developer</h3>
                                    <ul class="job-dt">
                                        <li><a href="#" title="">Full Time</a></li>
                                        <li><span>$30 / hr</span></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                        luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                        magna sit amet... <a href="#" title="">view more</a></p>
                                    <ul class="skill-tags">
                                        <li><a href="#" title="">HTML</a></li>
                                        <li><a href="#" title="">PHP</a></li>
                                        <li><a href="#" title="">CSS</a></li>
                                        <li><a href="#" title="">Javascript</a></li>
                                        <li><a href="#" title="">Wordpress</a></li>
                                    </ul>
                                </div>
                                <div class="job-status-bar">
                                    <ul class="like-com">
                                        <li>
                                            <a href="#"><i class="la la-heart"></i> Like</a>
                                            <img src="images/liked-img.png" alt="">
                                            <span>25</span>
                                        </li>
                                        <li><a href="#" title="" class="com"><img src="images/com.png"
                                                                                  alt=""> Comment 15</a>
                                        </li>
                                    </ul>
                                    <a><i class="la la-eye"></i>Views 50</a>
                                </div>
                            </div><!--post-bar end-->
                        </div>
                        {{--process--}}
                        <div class="process-comm">
                            <div class="spinner">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div><!--process-comm end-->
                    </div>

                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>
@endsection
