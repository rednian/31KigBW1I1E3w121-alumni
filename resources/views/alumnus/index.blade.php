
@extends('layouts/alumnus/alumnus-master')

@section('links')
	
	<style>

		.comp_logo {
			width:50px;
		}
		.post_position:hover {
			text-decoration: none;
		}
		.company_post{
			padding:10px;
		}
		.company_post:hover {
			box-shadow: 10px 10px 20px 10px #ccc;
		}
		.comments-label:hover{
			cursor: pointer;
		}
		.replies-section{
			padding-left:30px;
		}
		textarea.autofit {
		    min-width:350px;
		    min-height:34px;
		    height:30px;
		    resize:none;
		    font-size:12px;
		    overflow-x:hidden;
		    overflow-y:hidden;    
		    padding:5px 5px 5px 10px;    
		}

		textarea.autofit:focus{
			
		}

	</style>

@endsection

@section('content')

	<div class="main-content">
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-12 col-lg-3 s-pad bg-white">
					 @include('layouts/alumnus/sidebar')
				</div>
				
				<div class="col-md-6 s-pad">
					<div class="posts-pane">
						@if($posts)	

							<?php foreach ($posts as $post_key => $value):?>
								
								<div class="single-post company_post" >
									<div class="single-post-head">
										<img src="{{url('public/storage/company_logos')}}/<?php echo $value['company']['company_logo']?>" class="pull-left comp_logo">
										<div class="company-info pull-left">
											<h6><?php echo strtoupper($value['company']['company_name']) ?></h6>
											<span><?php echo $value['company']['address']; ?></span>
										</div>
										<span class="pull-right post-time" style="font-size: 10px;">
											
											<?php
												$now 		= Carbon\Carbon::now();
												$post_date  = new DateTime($value->post_date);

												$diff = $post_date->diff($now);							

												if($diff->y > 0){
													echo $diff->y . " year(s) ago";
												}
												if($diff->y <= 1){

													if($diff->m > 0){
														echo $diff->m . " month(s) ago";
													}

													else{
														if($diff->d > 1){
															echo $diff->d . " days";
														}
														if($diff->d == 1){
															echo "Yesterday at " .date_format($post_date, 'h:i a');
														}
														else{

															if($diff->i == 1){
																echo $diff->i . " minute";
															}
															if($diff->i > 1){
																echo $diff->i . " minutes";
															}
															else{

																if($diff->s > 1 && $diff->s < 30){
																	echo "Few seconds ago";
																}
																else{
																	echo "less than a minute";
																}

															}

														}
													}
												}
											?>

										</span>
									</div>

									<div class="single-post-body">
										@if($value->positions)

											<h5><span>Position: </span><a href="#" class="c-green post_position"> {{ $value->positions->position_title }} </a></h5><br>	
											<p class="minimize"> {{ $value->post_content }} </p>
											<h5><span>Salary: </span><a href="#" class="c-green post_position"><?php echo ($value->salary) ?> </a></h5><br>	
										@endif

										@if($value->img)

											<img src="{{url('public/storage/post_images')}}/<?php echo  $value->img?>" class='img-responsive'>

										@endif

										<div class="nice-not">
											<a class="pull-right f-12" href="#">- Poor</a>
											<a class="pull-right f-12" href="#">+ Nice</a>		
										</div>
									</div>
									
									<div class="single-post-footer">
										@if(count($value['comments']) >=3 && count($value['comments']) <= 10)
										<div>
											<a class='comments-label more_comments' post-key='{{$value->post_id}}'> View {{ count($value['comments']) - 2 }} more comments</a>
										</div>
										@elseif(count($value['comments']) > 10)
										<div>
											<a class='comments-label more_comments' post-key='{{$value->post_id}}'>View previous comments</a>
										</div>
										@elseif(count($value['comments']) <= 2)
										<div style="padding-bottom: 20px;">
											<a class='comments-label'>Comments</a>
										</div>
										@endif

										<!-- Comments -->
										<div class="comment-container" id="comment_container_{{$value->post_id}}">
											@foreach($value['comments'] as $comment_key => $comment)
												
												@if($comment_key >=2)
													<div class="comments-section hidden comment{{$value->post_id}}" style="padding-top:0px !important;">
												@else
													<div class="comments-section" style="padding-top:0px !important;">
												@endif

														<div class="comment-content">
														
															<div class="single-post-head">
																@if($comment['company_info'])
																	<img src="{{url('public/storage/company_logos')}}/<?php echo $comment['company_info']->company_logo ?>" class="pull-left" style="width:35px;">
																@else
																	<img src="{{url('public/storage/alumnus_images')}}/<?php echo $comment['alumnus_info']['student_per_info']['stud_image']->image_name.'.'.$comment['alumnus_info']['student_per_info']['stud_image']->type?>" class="pull-left img-circle">
																@endif
														
																<div class="company-info pull-left">
																	<h6>
																		@if($comment['company_info'])
																			{{ strtoupper($comment['company_info']->company_name) }}
																		@else
																			{{  
																				ucfirst($comment['alumnus_info']['student_per_info']->fname) . " " . 
																				ucfirst($comment['alumnus_info']['student_per_info']->mname[0]) . ". " .
																				ucfirst($comment['alumnus_info']['student_per_info']->lname)  
																			}}
																		@endif
																	</h6>
																	<span>
																		@if($comment['company_info'])
																			{{ ucfirst($comment['company_info']->address) }}
																		@else
																			{{ $comment['alumnus_info']['stud_program'][0]['program_list']->prog_name }}
																		@endif
																	</span>
																		
																</div>
																<span class="pull-right post-time">5 mins ago</span>
															</div>

															<div class="single-post-body no-margin no-padding no-border">
																<div>
																	<p class="minimize f-12">
																		{{ $comment->content }}
																	</p>
																</div>

															</div>


															<div class="single-post-footer">
																
																<div style="padding-bottom: 20px;padding-left: 0px;font-size: 10px; ">

																	<a href="#" class="comments-label show_reply" post-key="{{$value->post_id}}" comment-key="{{ $comment->comment_id }}">
																		Reply
																	</a>
																	@if(count($comment['replies']))
																		<span class="comments-label"> • </span>
																		<small class='comments-label'>({{ count($comment['replies']) }})</small>
																		<a href="#" class="comments-label view_replies" comment-key='{{ $comment->comment_id }}' post-key="{{$value->post_id}}">View replies</a>	
																	@endif
																</div>

																<!-- replies section -->

																<div class="replies-section">

																	@foreach($comment['replies'] as $reply_key => $reply)
																		
																		<div class="single-post hidden comment_reply_{{$value->post_id}}_{{$comment->comment_id}}" style="margin-bottom: 0px !important;">
																			<!-- <pre>{{ $reply['alumnus_info'] }} -->
																			<div class="single-post-head">
																				@if($reply['alumnus_info'])
																					<img src="{{url('public/storage/alumnus_images')}}/{{$reply['alumnus_info']['student_per_info']['stud_image']->image_name}}.{{$reply['alumnus_info']['student_per_info']['stud_image']->type}}" class="img-circle pull-left">
																				@else
																					<img src="{{url('public/storage/company_logos')}}/{{$reply['company_info']->company_logo}}" class="img-circle pull-left">
																					
																				@endif

																				<div class="company-info pull-left">
																					@if($reply['alumnus_info'])
																						<h6>
																							{{ $reply['alumnus_info']['student_per_info']->fname }}
																							{{$reply['alumnus_info']['student_per_info']->mname[0]}}. 
																							{{ $reply['alumnus_info']['student_per_info']->lname}}</h6>
																						<span>{{ $reply['alumnus_info']['stud_program'][0]['program_list']->prog_name }}</span>
																					@else
																						<h6>{{ strtoupper($reply['company_info']->company_name) }}</h6>
																						<span>{{ $reply['company_info']->address }}</span>
																					@endif
																				</div>
																			</div>


																			<div class="single-post-body no-margin no-padding no-border">
																				<div>
																					<p class="minimize f-12">
																						{{ $reply->content }}
																					</p>
																				</div>
																			</div>

																		</div>
																	@endforeach

																	<!-- REPLY FORM -->
																    <form action="{{ route('post_reply') }}" method="POST" class="navbar-form reply_form post-box-reply_{{$value->post_id}}_{{$comment->comment_id}} hidden comment_reply_{{$value->post_id}}_{{$comment->comment_id}}" style="padding-bottom: 20px;" role="search" >
																		{{ csrf_field() }}
																		<img class="pull-left auth_image img-responsive img-circle" style="width:35px;">
																	    <div class="input-group add-on" style="padding-left:10px;">
																		    <textarea type="text" name="reply_content" class="autofit reply form-control" placeholder="Write a reply..." style="width:250px !important;" required></textarea>
																	    	<div class="input-group-btn">
																		    	<button class="btn btn-default submit_comment" type="submit"><i class="fa fa-reply"></i></button>
																	    	</div>
																	    </div>
																	    	<input type="text" name="comment_id" class="hidden" value="{{$comment->comment_id}}">
																	</form>

																    
																</div>


															</div>

															
														
													</div>

												</div>
											@endforeach
										</div>
										
										<!-- COMMENT FORM -->
										<form action="{{ route('post_comment') }}" method="POST" class="navbar-form comment_form" role="search">
											{{ csrf_field() }}
											<img class="pull-left auth_image img-responsive img-circle" style="width:35px;">
										    <div class="input-group add-on" style="padding-left:10px;">
											    <textarea type="text" name="comment_content" class="autofit reply form-control" placeholder="Post a comment..." required></textarea>
										    	<div class="input-group-btn">
											    	<button class="btn btn-default submit_comment" type="submit"><i class="fa fa-reply"></i></button>
										    	</div>
										    </div>
										    	<input type="text" name="post_id" class="hidden" value="{{$value->post_id}}">
										</form>

									</div>
								</div>
									

							<?php endforeach ?>

						@endif	
					</div>
				</div>
				<div class="col-lg-3 s-pad bg-white">
					@include('layouts/alumnus/sidebar_right')
				</div>

			</div>
		</div>

	</div>

	
@endsection


@section('script')
	
	
	
	
	<!-- hiding long comments or replies -->
	<script>
		
		$(document).on('click', '.more_comments', function(event) {
			event.preventDefault();

			var post_key = $(this).attr('post-key');

			$(this).text('');

			$('.comment'+post_key).removeClass('hidden');

		});

		$(document).on('click', '.view_replies', function(event) {
			event.preventDefault();
			var comment_key = $(this).attr('comment-key');
			var post_key	= $(this).attr('post-key');

			if( $('.comment_reply_'+post_key+"_"+comment_key).hasClass('hidden') === true){
				$('.comment_reply_'+post_key+"_"+comment_key).removeClass('hidden');
				$(this).html('Hide replies');
			}
			else{
				$('.comment_reply_'+post_key+"_"+comment_key).addClass('hidden');
				$(this).html('View replies');
			}

		});

		$(document).on('click', '.show_reply', function(event) {
			event.preventDefault();
			var post_key	= $(this).attr('post-key');
			var comment_key = $(this).attr('comment-key');
			
			$('.post-box-reply_'+post_key+'_'+comment_key).removeClass('hidden');

		});
	</script>

	
	<!-- AJAX Comment -->
	<script>
		
		$(document).on('submit', '.comment_form', function(event) {
			event.preventDefault();

			$.ajax({
				url: '{{ route("post_comment") }}',
				type: 'POST',
				data: {
						'_token': '{{ csrf_token() }}',
						'data'  : $(this).serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {})
					  },
			})
			.done(function(data) {

				var comment_id  = data.comment_id;
				var post_id 	= data.post_id;
				var content 	= data.content;
				var date 		= data.date;

				if(data.company_id){
					var company_id = data.company_id;
				}
				else{
					var ssi_id 	   = data.ssi_id;
				}
				log(data)																	
				var img_name = "{{url('public/storage/alumnus_images')}}/{{$user['alumnus_info']['student_per_info']['stud_image']->image_name}}.{{$user['alumnus_info']['student_per_info']['stud_image']->type}}";

				var new_comment 	= ' <div class="comments-section" style="padding-top:0px !important;">';
					new_comment	   +=		'<div class="comment-content">';
					new_comment	   +=			'<div class="single-post-head">';
					new_comment	   +=				'<img src="'+img_name+'" class="pull-left img-circle" style="width:35px;">';
					new_comment	   +=				'<div class="company-info pull-left">'
					new_comment	   +=					'<h6> {{ $user->alumnus_info->student_per_info->fname }} {{ $user->alumnus_info->student_per_info->mname[0] }}. {{ $user->alumnus_info->student_per_info->lname }} </h6>'
					new_comment	   +=					'<span>{{ $user->alumnus_info->stud_program[0]->program_list->prog_name }}</span>'
					new_comment	   +=				'</div>'
					new_comment	   +=				'<span class="pull-right post-time">5 mins ago</span>'
					new_comment	   +=			'</div>'
					new_comment	   +=		'</div>'
					new_comment	   +=		'<div class="single-post-body no-margin no-padding no-border">'
					new_comment	   +=			'<div>'
					new_comment	   +=				'<p class="minimize f-12">'
					new_comment	   +=			 		content
					new_comment	   +=				'</p>'
					new_comment	   +=			'</div>'
					new_comment	   +=		'</div>'
					new_comment	   +=		'<div class="single-post-footer">'
					new_comment	   +=			'<div style="padding-bottom: 20px;padding-left: 0px;font-size: 10px; ">'
					new_comment	   +=				'<a href="#" class="comments-label show_reply" post-key="'+post_id+'" comment-key="'+comment_id+'">'
					new_comment	   +=					'Reply'
					new_comment	   +=				'</a>'
					new_comment	   +=			'</div>'
					new_comment	   +=		'</div>'
					new_comment	   += ' </div>';
					new_comment    += '	<div class="post-box post-box-reply_'+post_id+'_'+comment_id+' hidden comment_reply_'+post_id+'_'+comment_id+'" style="padding-bottom: 20px;">'
					new_comment    +=		'<div class="row">'
					new_comment    +=			'<div class="col-lg-1">'
					new_comment    +=				'<img class="auth_image img-circle" >'
					new_comment    +=			'</div>'
					new_comment    +=			'<div class="col-lg-11">'
					new_comment    +=				'<textarea class="autofit form-control reply" placeholder="Write a reply..."></textarea>'
					new_comment    +=			'</div>'
					new_comment    +=		'</div>'
					new_comment    +=	'</div>';

				$("#comment_container_"+post_id).append(new_comment);

			})
			.fail(function(jqXHR, exception) {
				console.log(jqXHR);
				console.log(exception);
			})
			

		});

	</script>

@endsection

