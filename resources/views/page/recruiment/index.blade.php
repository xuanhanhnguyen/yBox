@extends('page.layout.content')
@section('title', 'Tuyển dụng')
@section('content')
@section('style')
<style>
	li.add-post {
		border-radius: 0;
		width: 100%;
		text-transform: uppercase;
		font-size: 12px;
	}

	.comment-list {
		padding-bottom: 14px;
		padding-top: 10px;
	}

	.btn-reply {
		position: relative;
		left: -12px;
	}

	.comment_box {
		margin-bottom: 18px;
	}

	li.page-item.active span {
		height: 91% !important;
	}

	li.page-item.disabled span {
		height: 91% !important;
	}
</style>
@endSection

<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-lg-3 col-md-4 pd-left-none no-pd">
						<div class="main-left-sidebar no-margin">
							<div class="user-data full-width">
								<div class="user-profile">
									<div class="username-dt">
										<div class="usr-pic">
											<img src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
										</div>
									</div>
									<!--username-dt end-->
									<div class="user-specs">
										<h3>{{$user->full_name}}</h3>
										<span>{{$user->total_follow}} người theo dõi</span>
									</div>
								</div>
								<!--user-profile end-->
								<ul class="user-fw-status">
									<li>
										<a href="#" title="">View Profile</a>
									</li>
								</ul>
							</div>
							<!--user-data end-->
							<div class="tags-sec full-width">
								<ul>
									<li><a href="#" title="">Help Center</a></li>
									<li><a href="#" title="">About</a></li>
									<li><a href="#" title="">Privacy Policy</a></li>
									<li><a href="#" title="">Community Guidelines</a></li>
									<li><a href="#" title="">Cookies Policy</a></li>
									<li><a href="#" title="">Career</a></li>
									<li><a href="#" title="">Language</a></li>
									<li><a href="#" title="">Copyright Policy</a></li>
								</ul>
								<div class="cp-sec">
									<img src="images/logo2.png" alt="">
									<p><img src="images/cp.png" alt="">Copyright 2018</p>
								</div>
							</div>
							<!--tags-sec end-->
						</div>
						<!--main-left-sidebar end-->
					</div>
					<div class="col-lg-6 col-md-8 no-pd">
						<div class="main-ws-sec">
							<div class="post-topbar">
								<div class="user-picy">
									<img style="width:50px; height:50px;border-radius:50%" src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
								</div>
								<div class="post-st">
									<ul>
										<li class="btn btn-sm btn-primary add-post post_project" style="cursor:pointer">Đăng bài</li>
									</ul>
								</div>
								<!--post-st end-->
							</div>
							<!--post-topbar end-->
							<div class="posts-section">
								@if($postNew)
								<div class="posty">
									<div class="post-bar no-margin">
										<div class="post_topbar">
											<div class="usy-dt">
												<img style="width:40px; height:40px; border-radius:50%;" src="{{asset('upload/avatar/'.$postNew->user->avatar)}}" alt="">
												<div class="usy-name">
													<h3>{{$postNew->user->full_name}}</h3>
													<span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($postNew->created_at)}}</span>
												</div>
											</div>
											<div class="ed-opts">
												<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
												<ul class="ed-options">
													<li><a href="{{route('user.post.delete',$postNew->id)}}" title="">Xóa</a></li>
												</ul>
											</div>
										</div>
										<div class="epi-sec">
											<ul class="descp">
												@if($user->id != $postNew->user->id)
												<li><img src="images/icon8.png" alt=""><a href="{{route('user.hr.follow',$postNew->user->id)}}"><span>Theo dõi</span></a></li>
												@endif
											</ul>

										</div>
										<div class="job_descp">
											<h3>{{$postNew->title}}</h3>
											<p>{!! $postNew->content !!}</p>

										</div>
										<div class="job-status-bar">
											<ul class="like-com">
												<li>
													<a style="position:relative; top:-6px" href="{{route('user.post.like',$postNew->id)}}"><i class="la la-heart"></i>
														{{$postNew->total_like}}
													</a>
												</li>
												<li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt="">{{$postNew->total_coment}} bình luận</a></li>
											</ul>
										</div>
									</div>
									<!--post-bar end-->
									<div class="comment-section">
										<div class="plus-ic">
											<i class="la la-plus toggle-cmt" data-coment="#cmt-{{$postNew->id}}" style="cursor:pointer"></i>
										</div>
										<div class="comment-sec" style="display:none" id="cmt-{{$postNew->id}}">
											<ul>
												@foreach($postNew->comment as $comment)
												<li>
													<div class="comment-list">
														<div class="bg-img">
															<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$comment->user->avatar)}}" alt="">
														</div>
														<div class="comment">
															<h3>{{$comment->user->full_name}}</h3>
															<span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($comment->created_at)}} </span>
															<p>{{$comment->content}}</p>
															<a data-reply="#reply-{{$comment->id}}" href="javascript:void(0)" title="" class="toggle-reply"><i class="fa fa-reply-all"></i>Trả lời</a>
														</div>
													</div>
													<!--comment-list end-->
													<ul id="reply-{{$comment->id}}" style="display:none">
														@foreach($comment->reply as $reply)
														<li>
															<div class="comment-list">
																<div class="bg-img">
																	<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$reply->user->avatar)}}" alt="">
																</div>
																<div class="comment">
																	<h3>{{$reply->user->full_name}}</h3>
																	<span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($reply->created_at)}}</span>
																	<p>{{$reply->content}} </p>
																</div>

															</div>
															<!--comment-list end-->
														</li>
														@endforeach
														<div class="post-comment">
															<div class="cm_img">
																<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
															</div>
															<div class="comment_box" style="float:none">
																<form action="{{route('user.post.reply', [$postNew->id, $comment->id])}}" method="post">
																	@csrf
																	<input style="width:75.3%" type="text" placeholder="Viết phản hồi " name="content">
																	<button style="position: relative;left: -11px;" class="btn-reply" type="submit">Gửi</button>
																</form>
															</div>
														</div>
													</ul>
												</li>
												@endforeach
											</ul>
										</div>
										<!--comment-sec end-->
										<div class="post-comment">
											<div class="cm_img">
												<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
											</div>
											<div class="comment_box">
												<form action="{{route('user.post.comment',$postNew->id)}}" method="post">
													@csrf
													<input type="text" placeholder="Viết phản hồi" name="content">
													<button type="submit">Gửi</button>
												</form>
											</div>
										</div>
										<!--post-comment end-->
									</div>
									<!--comment-section end-->
								</div>
								@endif
								<!--posty end-->
								<div class="top-profiles">
									<div class="pf-hd">
										<h3>Top Company</h3>
										<i class="la la-ellipsis-v"></i>
									</div>
									<div class="profiles-slider">
										<div class="user-profy">
											<img src="http://via.placeholder.com/57x57" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="javascript:void(0)" title="" class="follow">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div>
										<!--user-profy end-->
										<div class="user-profy">
											<img src="http://via.placeholder.com/57x57" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div>
										<!--user-profy end-->
										<div class="user-profy">
											<img src="http://via.placeholder.com/57x57" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div>
										<!--user-profy end-->
										<div class="user-profy">
											<img src="http://via.placeholder.com/57x57" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div>
										<!--user-profy end-->
										<div class="user-profy">
											<img src="http://via.placeholder.com/57x57" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div>
										<!--user-profy end-->
										<div class="user-profy">
											<img src="http://via.placeholder.com/57x57" alt="">
											<h3>John Doe</h3>
											<span>Graphic Designer</span>
											<ul>
												<li><a href="#" title="" class="followw">Follow</a></li>
												<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
												<li><a href="#" title="" class="hire">hire</a></li>
											</ul>
											<a href="#" title="">View Profile</a>
										</div>
										<!--user-profy end-->
									</div>
									<!--profiles-slider end-->
								</div>
								@if($posts)
								@php $i = 0 @endphp
								@foreach($posts as $postNew)
								@php $i ++ @endphp
								@if($i == 1)
								@php continue @endphp
								@endif
								<div class="posty">
									<div class="post-bar no-margin">
										<div class="post_topbar">
											<div class="usy-dt">
												<img style="width:40px; height:40px; border-radius:50%;" src="{{asset('upload/avatar/'.$postNew->user->avatar)}}" alt="">
												<div class="usy-name">
													<h3>{{$postNew->user->full_name}}</h3>
													<span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($postNew->created_at)}}</span>
												</div>
											</div>
											<div class="ed-opts">
												<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
												<ul class="ed-options">
													<li><a href="{{route('user.post.delete',$postNew->id)}}" title="">Xóa</a></li>
												</ul>
											</div>
										</div>
										<div class="epi-sec">
											<ul class="descp">
												@if($user->id != $postNew->user->id)
												<li><img src="images/icon8.png" alt=""><a href="{{route('user.hr.follow',$postNew->user->id)}}"><span>Theo dõi</span></a></li>
												@endif
											</ul>

										</div>
										<div class="job_descp">
											<h3>{{$postNew->title}}</h3>
											<p>{!! $postNew->content !!}</p>

										</div>
										<div class="job-status-bar">
											<ul class="like-com">
												<li>
													<a style="position:relative; top:-6px" href="{{route('user.post.like',$postNew->id)}}"><i class="la la-heart"></i>
														{{$postNew->total_like}}
													</a>
												</li>
												<li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt="">{{$postNew->total_coment}} bình luận</a></li>
											</ul>
										</div>
									</div>
									<!--post-bar end-->
									<div class="comment-section">
										<div class="plus-ic">
											<i class="la la-plus toggle-cmt" data-coment="#cmt-{{$postNew->id}}" style="cursor:pointer"></i>
										</div>
										<div class="comment-sec" style="display:none" id="cmt-{{$postNew->id}}">
											<ul>
												@foreach($postNew->comment as $comment)
												<li>
													<div class="comment-list">
														<div class="bg-img">
															<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$comment->user->avatar)}}" alt="">
														</div>
														<div class="comment">
															<h3>{{$comment->user->full_name}}</h3>
															<span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($comment->created_at)}} </span>
															<p>{{$comment->content}}</p>
															<a data-reply="#reply-{{$comment->id}}" href="javascript:void(0)" title="" class="toggle-reply"><i class="fa fa-reply-all"></i>Trả lời</a>
														</div>
													</div>
													<!--comment-list end-->
													<ul id="reply-{{$comment->id}}" style="display:none">
														@foreach($comment->reply as $reply)
														<li>
															<div class="comment-list">
																<div class="bg-img">
																	<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$reply->user->avatar)}}" alt="">
																</div>
																<div class="comment">
																	<h3>{{$reply->user->full_name}}</h3>
																	<span><img src="images/clock.png" alt="">{{Helper::getTimeAgo($reply->created_at)}}</span>
																	<p>{{$reply->content}} </p>
																</div>

															</div>
															<!--comment-list end-->
														</li>
														@endforeach
														<div class="post-comment">
															<div class="cm_img">
																<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
															</div>
															<div class="comment_box" style="float:none">
																<form action="{{route('user.post.reply', [$postNew->id, $comment->id])}}" method="post">
																	@csrf
																	<input style="width:75.3%" type="text" placeholder="Viết phản hồi " name="content">
																	<button style="position: relative;left: -11px;" class="btn-reply" type="submit">Gửi</button>
																</form>
															</div>
														</div>
													</ul>
												</li>
												@endforeach
											</ul>
										</div>
										<!--comment-sec end-->
										<div class="post-comment">
											<div class="cm_img">
												<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
											</div>
											<div class="comment_box">
												<form action="{{route('user.post.comment',$postNew->id)}}" method="post">
													@csrf
													<input type="text" placeholder="Viết phản hồi" name="content">
													<button type="submit">Gửi</button>
												</form>
											</div>
										</div>
										<!--post-comment end-->
									</div>
									<!--comment-section end-->
								</div>
								@endforeach
								@endif
								<!--posty end-->
								<div class="process-comm">
									{{$posts->links()}}
								</div>
								<!--process-comm end-->
							</div>
							<!--posts-section end-->
						</div>
						<!--main-ws-sec end-->
					</div>
					<div class="col-lg-3 pd-right-none no-pd">
						<div class="right-sidebar">
							<!--widget-about end-->
							<div class="widget widget-jobs">
								<div class="sd-title">
									<h3>TOP BÀI ĐĂNG</h3>
									<i class="la la-ellipsis-v"></i>
								</div>
								<div class="jobs-list">
									<div class="job-info">
										<div class="job-details">
											<h3>Senior Product Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div>
									<!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior UI / UX Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div>
									<!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Junior Seo Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div>
									<!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior PHP Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div>
									<!--job-info end-->
									<div class="job-info">
										<div class="job-details">
											<h3>Senior Developer Designer</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
										</div>
										<div class="hr-rate">
											<span>$25/hr</span>
										</div>
									</div>
									<!--job-info end-->
								</div>
								<!--jobs-list end-->
							</div>
							<!--widget-jobs end-->
						</div>
						<!--right-sidebar end-->
					</div>
				</div>
			</div><!-- main-section-data end-->
		</div>
	</div>
</main>




<div class="post-popup pst-pj">
	<div class="post-project">
		<h3 style="text-transform: uppercase">Bài tuyển dụng</h3>
		<div class="post-project-fields">
			<form action="{{route('recruiment.post.create')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-lg-12">
						<input type="text" name="title" placeholder="Tiêu đề">
					</div>

					<div class="col-lg-12">

						<textarea id="editor1" name="content" type="text" class="form-control ckeditor" rows="10"></textarea>

					</div>
					<div class="col-lg-12">
						<ul>
							<li><button class="active" type="submit" value="post">Post</button></li>
							<li><a href="#" title="">Cancel</a></li>
						</ul>
					</div>
				</div>
			</form>
		</div>
		<!--post-project-fields end-->
		<a href="#" title=""><i class="la la-times-circle-o"></i></a>
	</div>
	<!--post-project end-->
</div>
<!--post-project-popup end-->

<div class="post-popup job_post">
	<div class="post-project">
		<h3>Post a job</h3>
		<div class="post-project-fields">
			<form>
				<div class="row">
					<div class="col-lg-12">
						<input type="text" name="title" placeholder="Title">
					</div>
					<div class="col-lg-12">
						<div class="inp-field">
							<select>
								<option>Category</option>
								<option>Category 1</option>
								<option>Category 2</option>
								<option>Category 3</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<input type="text" name="skills" placeholder="Skills">
					</div>
					<div class="col-lg-6">
						<div class="price-br">
							<input type="text" name="price1" placeholder="Price">
							<i class="la la-dollar"></i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="inp-field">
							<select>
								<option>Full Time</option>
								<option>Half time</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<textarea name="description" placeholder="Description"></textarea>
					</div>
					<div class="col-lg-12">
						<ul>
							<li><button class="active" type="submit" value="post">Post</button></li>
							<li><a href="#" title="">Cancel</a></li>
						</ul>
					</div>
				</div>
			</form>
		</div>
		<!--post-project-fields end-->
		<a href="#" title=""><i class="la la-times-circle-o"></i></a>
	</div>
	<!--post-project end-->
</div>
<!--post-project-popup end-->



<div class="chatbox-list">
	<div class="chatbox">
		<div class="chat-mg">
			<a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
			<span>2</span>
		</div>
		<div class="conversation-box">
			<div class="con-title mg-3">
				<div class="chat-user-info">
					<img style="width:40px; height:40px; border-radius:50%" src="{{asset('upload/avatar/'.$user->avatar)}}" alt="">
					<h3>{{$user->full_name}}<span class="status-info"></span></h3>
				</div>
				<div class="st-icons">
					<a href="#" title=""><i class="la la-cog"></i></a>
					<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
					<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
				</div>
			</div>
			<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
				<div class="chat-msg">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
					<span>Sat, Aug 23, 1:10 PM</span>
				</div>
				<div class="date-nd">
					<span>Sunday, August 24</span>
				</div>
				<div class="chat-msg st2">
					<p>Cras ultricies ligula.</p>
					<span>5 minutes ago</span>
				</div>
				<div class="chat-msg">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
					<span>Sat, Aug 23, 1:10 PM</span>
				</div>
			</div>
			<!--chat-list end-->
			<div class="typing-msg">
				<form>
					<textarea placeholder="Type a message here"></textarea>
					<button type="submit"><i class="fa fa-send"></i></button>
				</form>
				<ul class="ft-options">
					<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
					<li><a href="#" title=""><i class="la la-camera"></i></a></li>
					<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
				</ul>
			</div>
			<!--typing-msg end-->
		</div>
		<!--chat-history end-->
	</div>
	<div class="chatbox">
		<div class="chat-mg">
			<a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
		</div>
		<div class="conversation-box">
			<div class="con-title mg-3">
				<div class="chat-user-info">
					<img src="http://via.placeholder.com/34x33" alt="">
					<h3>John Doe <span class="status-info"></span></h3>
				</div>
				<div class="st-icons">
					<a href="#" title=""><i class="la la-cog"></i></a>
					<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
					<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
				</div>
			</div>
			<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
				<div class="chat-msg">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
					<span>Sat, Aug 23, 1:10 PM</span>
				</div>
				<div class="date-nd">
					<span>Sunday, August 24</span>
				</div>
				<div class="chat-msg st2">
					<p>Cras ultricies ligula.</p>
					<span>5 minutes ago</span>
				</div>
				<div class="chat-msg">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
					<span>Sat, Aug 23, 1:10 PM</span>
				</div>
			</div>
			<!--chat-list end-->
			<div class="typing-msg">
				<form>
					<textarea placeholder="Type a message here"></textarea>
					<button type="submit"><i class="fa fa-send"></i></button>
				</form>
				<ul class="ft-options">
					<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
					<li><a href="#" title=""><i class="la la-camera"></i></a></li>
					<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
				</ul>
			</div>
			<!--typing-msg end-->
		</div>
		<!--chat-history end-->
	</div>
	<div class="chatbox">
		<div class="chat-mg bx">
			<a href="#" title=""><img src="images/chat.png" alt=""></a>
			<span>2</span>
		</div>
		<div class="conversation-box">
			<div class="con-title">
				<h3>Messages</h3>
				<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
			</div>
			<div class="chat-list">
				<div class="conv-list active">
					<div class="usrr-pic">
						<img src="http://via.placeholder.com/50x50" alt="">
						<span class="active-status activee"></span>
					</div>
					<div class="usy-info">
						<h3>John Doe</h3>
						<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
					</div>
					<div class="ct-time">
						<span>1:55 PM</span>
					</div>
					<span class="msg-numbers">2</span>
				</div>
				<div class="conv-list">
					<div class="usrr-pic">
						<img src="http://via.placeholder.com/50x50" alt="">
					</div>
					<div class="usy-info">
						<h3>John Doe</h3>
						<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
					</div>
					<div class="ct-time">
						<span>11:39 PM</span>
					</div>
				</div>
				<div class="conv-list">
					<div class="usrr-pic">
						<img src="http://via.placeholder.com/50x50" alt="">
					</div>
					<div class="usy-info">
						<h3>John Doe</h3>
						<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
					</div>
					<div class="ct-time">
						<span>0.28 AM</span>
					</div>
				</div>
			</div>
			<!--chat-list end-->
		</div>
		<!--conversation-box end-->
	</div>
</div>
<!--chatbox-list end-->






@endSection
@section('js')
<script src="{{asset('./ckeditor/ckeditor.js')}}"></script>
<script>
	/**
	 * toggle Section comment
	 */

	$(function() {
		$('.toggle-cmt').on('click', function() {
			$($(this).data("coment")).toggle();
		});
	});
	/**
	 * toggle Section comment
	 */

	$(function() {
		$('.toggle-reply').on('click', function() {
			$(this).toggleClass('active');
			$($(this).data("reply")).toggle();
		});
	});
</script>
@endSection