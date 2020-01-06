@extends('page.layout.content')
@section('title','Học bổng')
@section('content')


<section class="forum-page">
    <div class="container">
        <div class="forum-questions-sec">
            <div class="row">
                <div class="col-lg-8">
                    <div class="forum-post-view">
                        <div class="usr-question">
                            <div class="usr_img">
                                <img style="width:60px; height:60px; border-radius:50%" src="{{asset('images/'.$post->user->avatar)}}" alt="">
                            </div>
                            <div class="usr_quest">
                                <h3>{{$post->title}}</h3>
                                <span><i class="fa fa-clock-o"></i>{{Helper::getTimeAgo($post->created_at)}}</span>
                                <ul class="react-links">
                                    <li><a href="{{route('user.post.like',$post->id)}}" title=""><i class="fa fa-heart" {{$liked ? 'style=color:red' :''}}></i> Thích {{$post->total_like}}</a></li>
                                    <li><a href="#" title=""><i class="fa fa-share-alt"></i> Chia sẻ</a></li>
                                </ul>
                                <p class="py-3">{!! $post->content !!}</p>
                                @if(!$post->comment->isEmpty())
                                <div class="comment-section">
                                    <h3>{{$post->total_coment}} bình luận</h3>
                                    <div class="comment-sec">
                                        <ul>
                                            @foreach($post->comment as $comment)
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img style="width:40px; height:40px; border-radius:50%"src="{{asset('images/'.$comment->user->avatar)}}" alt="">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>{{$comment->user->full_name}}</h3>
                                                        <span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($comment->created_at)}}</span>
                                                        <p>{{$comment->content}}</p>
                                                    </div>
                                                </div>
                                                <!--comment-list end-->
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--comment-sec end-->
                                </div>
                                @endif
                            </div>
                            <!--usr_quest end-->
                        </div>
                        <!--usr-question end-->
                    </div>
                    <!--forum-post-view end-->
                    <div class="post-comment-box">
                        <h3>Bình luận</h3>
                        @if(Auth::user())
                        <div class="user-poster">
                            <div class="usr-post-img">
                                <img src="{{asset('images/'.Auth::user()->avatar)}}" alt="">
                            </div>
                            <div class="post_comment_sec">
                                <form method="post" action="{{route('user.post.comment',$post->id)}}">
                                    @csrf
                                    <textarea name="content" placeholder="Viết phản hồi"></textarea>
                                    <button type="submit">Gửi</button>
                                </form>
                            </div>
                            <!--post_comment_sec end-->
                        </div>
                        @else 
                        <p>Đăng nhập để bình luận</p>
                        @endif
                        <!--user-poster end-->
                    </div>
                    <!--post-comment-box end-->
                    <!--next-prev end-->
                </div>
                <div class="col-lg-4">
                    <div class="widget widget-feat">
                        <ul>
                            <li>
                                <i class="fa fa-heart"></i>
                                <span>{{$post->total_like}}</span>
                            </li>
                            <li>
                                <i class="fa fa-comment"></i>
                                <span>{{$post->total_coment}}</span>
                            </li>
                            <li>
                                <i class="fa fa-share-alt"></i>
                                <span>{{$post->total_share}}</span>
                            </li>
                            <li>
                                <i class="fa fa-eye"></i>
                                <span>{{$post->total_view}}</span>
                            </li>
                        </ul>
                    </div>
                    <!--widget-feat end-->
                    <div class="widget widget-user">
                        <h3 class="title-wd">Top Bài Viêt</h3>
                        <ul>
                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>Jessica William</h3>
                                        <p>Graphic Designer </p>
                                    </div>
                                    <!--usr-mg-info end-->
                                </div>
                                <span><img src="images/price1.png" alt="">1185</span>
                            </li>
                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>John Doe</h3>
                                        <p>PHP Developer</p>
                                    </div>
                                    <!--usr-mg-info end-->
                                </div>
                                <span><img src="images/price2.png" alt="">1165</span>
                            </li>
                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>Poonam</h3>
                                        <p>Wordpress Developer </p>
                                    </div>
                                    <!--usr-mg-info end-->
                                </div>
                                <span><img src="images/price3.png" alt="">1120</span>
                            </li>
                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="http://via.placeholder.com/50x50" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>Bill Gates</h3>
                                        <p>C & C++ Developer </p>
                                    </div>
                                    <!--usr-mg-info end-->
                                </div>
                                <span><img src="images/price4.png" alt="">1009</span>
                            </li>
                        </ul>
                    </div>
                    <!--widget-user end-->
                    <div class="widget widget-adver">
                        <img src="http://via.placeholder.com/370x270" alt="">
                    </div>
                    <!--widget-adver end-->
                </div>
            </div>
        </div>
        <!--forum-questions-sec end-->
    </div>
</section>
<!--forum-page end-->
@endSection