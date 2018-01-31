
@extends('layouts/alumnus/alumnus-master')

@section('links')
    <link href="{{ asset('public/plugins/owl_carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugins/owl_carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet">
	
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
		textarea.reply {
		    min-width:450px;
		    min-height:34px;
		    height:30px;
		    resize:none;
		    font-size:12px;
		    overflow-x:hidden;
		    overflow-y:hidden;    
		    padding:5px 5px 5px 10px;    
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
										@if($value->position)

											<h5><span>Position: </span><a href="#" class="c-green post_position"> <?php echo $value->position ?> </a></h5><br>	
											<p class="minimize"> <?php echo  $value->post_content ?> </p>
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
											<a class='comments-label more_comments' post-key='{{$post_key}}'> View {{ count($value['comments']) - 2 }} more comments</a>
										</div>
										@elseif(count($value['comments']) > 10)
										<div>
											<a class='comments-label more_comments' post-key='{{$post_key}}'>View previous comments</a>
										</div>
										@elseif(count($value['comments']) <= 2)
										<div>
											<a class='comments-label'>Comments</a>
										</div>
										@endif

										<!-- Comments -->
										
										@foreach($value['comments'] as $comment_key => $comment)
											
											@if($comment_key >=2)
												<div class="comments-section hidden comment{{$post_key}}">
											@else
												<div class="comments-section">
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
															
																<div style="padding-bottom: 20px;padding-left: 0px;font-size: 10px; padding-left: 15px;">

																	<a href="#" class="comments-label show_reply" comment-key="{{ $comment_key }}">
																		Reply
																	</a>
																	@if(count($comment['replies']))
																		<span class="comments-label"> • </span>
																		<small class='comments-label'>({{ count($comment['replies']) }})</small>
																		<a href="#" class="comments-label view_replies" comment-key='{{ $comment_key }}'>View replies</a>	
																	@endif
																</div>

															<div class="replies-section">

																@foreach($comment['replies'] as $reply_key => $reply)
																	
																	<div class="single-post hidden comment_reply{{$comment_key}}" style="margin-bottom: 0px !important;">
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

															  	<div class="post-box post-box-reply{{$comment_key}} hidden comment_reply{{$comment_key}}" style="padding-bottom: 20px;">
																	<div class="row">
																		<div class="col-lg-1">
																			<img class="auth_image img-circle" >
																		</div>
																		<div class="col-lg-11">
																    		<textarea class="autofit form-control reply" placeholder="Write a reply..."></textarea>
																		</div>
																	</div>
															    </div>

															</div>


														</div>

														
													
												</div>

											</div>
										@endforeach
									
										<div class="post-box" style="margin-top: 20px;padding-left: 20px;">
											<img class="pull-left auth_image img-responsive img-circle">
											<!-- <input type="text" class="pull-left" placeholder="Write a comment"> -->
											<textarea class="autofit form-control reply pull-left" placeholder="Post a comment..." style="width:450px !important;margin-left:5px;"></textarea>
										</div>

									</div>
								</div>
									

							<?php endforeach ?>

						@endif	
					</div>
				</div>
				<div class="col-lg-3 s-pad bg-white">
					<div class="right-pane">
						<div class="recent-graduates">
							<h5><span class="c-green">ACLC</span> RECENT GRADUATES</h5>
							<div class="grad-carousel">
								<span class="fa fa-chevron-left cnav-prev"></span>								
								<div class="owl-carousel">
								  <div class="owl-content"> <img src="{{url('public/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{url('public/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{url('public/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{url('public/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{url('public/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{url('public/images/don.jpg')}}"> </div>
								</div>
								<div class="grad-info">
									<h5>Don J. Del Rosario</h5>
									<h6><span class="c-green">Graduate: </span>Bachelor of Science in Information...</h6>
								</div>
								<span class="fa fa-chevron-right cnav-next"></span>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

	
@endsection


@section('script')
	
	<script type="text/javascript" src="{{ asset('public/plugins/owl_carousel/dist/owl.carousel.min.js') }}"></script>
	
	<script>

		// CAROUSEL 
		$(document).ready(function(){
		  	$('.owl-carousel').owlCarousel({
			    loop:true,
			    margin:-40,
			    // nav:true,  
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }, 
			})
		});

		$(".cnav-next").click(function(){
			let nextbtn = document.getElementsByClassName('owl-next')[0];
			nextbtn.click();
		});

		$(".cnav-prev").click(function(){
			let prevbtn = document.getElementsByClassName('owl-prev')[0];
			prevbtn.click();
		});

		// HIDE LONG TEXTS

		jQuery(function(){

		    var minimized_elements = $('p.minimize');
		    
		    minimized_elements.each(function(){    
		        var t = $(this).text();        
		        if(t.length < 300) return;
		        
		        $(this).html(
		            t.slice(0,300)+'<span>... </span><a href="#" class="more"><small>more</small></a>'+
		            '<span style="display:none;">'+ t.slice(300,t.length)+' <a href="#" class="less"><small>less</small></a></span>'
		        );
		        
		    }); 
		    
		    $('a.more', minimized_elements).click(function(event){
		        event.preventDefault();
		        $(this).hide().prev().hide();
		        $(this).next().show();        
		    });
		    
		    $('a.less', minimized_elements).click(function(event){
		        event.preventDefault();
		        $(this).parent().hide().prev().show().prev().show();    
		    });

		});
	</script>

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


			if( $('.comment_reply'+comment_key).hasClass('hidden') === true){
				$('.comment_reply'+comment_key).removeClass('hidden');
				$(this).html('Hide replies');
			}
			else{
				$('.comment_reply'+comment_key).addClass('hidden');
				$(this).html('View replies');

			}

		});

		$(document).on('click', '.show_reply', function(event) {
			event.preventDefault();
			var comment_key = $(this).attr('comment-key');
			log(comment_key)
		});

	</script>

	<script>
		(function(){
			var measurer = $('<span>', {
			   							style: "display:inline-block;word-break:break-word;visibility:hidden;white-space:pre-wrap;"})
			   .appendTo('body');
			function initMeasurerFor(textarea){
			  if(!textarea[0].originalOverflowY){
			  	textarea[0].originalOverflowY = textarea.css("overflow-y");    
			  }  
			  var maxWidth = textarea.css("max-width");
			  measurer.text(textarea.text())
			      .css("max-width", maxWidth == "none" ? textarea.width() + "px" : maxWidth)
			      .css('font',textarea.css('font'))
			      .css('overflow-y', textarea.css('overflow-y'))
			      .css("max-height", textarea.css("max-height"))
			      .css("min-height", textarea.css("min-height"))
			      .css("min-width", textarea.css("min-width"))
			      .css("padding", textarea.css("padding"))
			      .css("border", textarea.css("border"))
			      .css("box-sizing", textarea.css("box-sizing"))
			}
			function updateTextAreaSize(textarea){
				textarea.height(measurer.height());
			  var w = measurer.width();
			  if(textarea[0].originalOverflowY == "auto"){
			     	var mw = textarea.css("max-width");
			      if(mw != "none"){
			     		if(w == parseInt(mw)){
			      		textarea.css("overflow-y", "auto");
			     		} else {
			         	textarea.css("overflow-y", "hidden");
			     		}
			      }
			   }
			   textarea.width(w + 2);
			}
			$('textarea.autofit').on({
			    input: function(){      
			      	var text = $(this).val();  
			        if($(this).attr("preventEnter") == undefined){
			      	   text = text.replace(/[\n]/g, "<br>&#8203;");
			        }
			      	measurer.html(text);                       
			        updateTextAreaSize($(this));       
			    },
			    focus: function(){
			     initMeasurerFor($(this));
			    },
			    keypress: function(e){
			    	if(e.which == 13 && $(this).attr("preventEnter") != undefined){
			      	e.preventDefault();
			      }
			    }
			});
		})();
	</script>

@endsection