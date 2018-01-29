
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
	</style>

@endsection

@section('content')
	
	<div class="main-content">
		
		<div class="container">
			<div class="row">
				
				<div class="col-md-12 col-lg-3 s-pad bg-white">
					<div class="profile-area">
						<div class="profile-head">
							<img src="{{url('public/images/don.jpg')}}">
							
							@if($user)
							<h5>
								{{ $user->alumnus_info->student_per_info->fname }} {{ $user->alumnus_info->student_per_info->mname[0] }}. {{ $user->alumnus_info->student_per_info->lname }}
							</h5>

					
							<h6>
								
								{{ $user->alumnus_info->stud_program[0]->program_list->prog_name }}
								
							</h6>

							@endif
						</div>
					</div>
					<div class="profile-nav">
						<ul>
							<li>
								<i class="fa fa-fw fa-user f-20 c-lighter pull-left"></i>
								<a href="profile.html">Profile</a>
							</li>
							<li>
								<i class="fa fa-fw fa-briefcase f-20 c-lighter pull-left"></i>
								<a href="jobs.html">Jobs</a>
							</li>
							<li>
								<i class="fa fa-fw fa-envelope f-20 c-lighter pull-left"></i>
								<a href="inbox.html">Inbox</a>
							</li>
							<li>
								<i class="fa fa-fw fa-space-shuttle f-20 c-lighter pull-left"></i>
								<a href="application.html">Applications</a>
							</li>
							<li>
								<i class="fa fa-fw fa-lock f-20 c-lighter pull-left"></i>
								<a href="myaccount.html">Accounts</a>
							</li>
							<li>
								<i class="fa fa-fw fa-pencil-square f-20 c-lighter pull-left"></i>
								<a href="#">Post</a>
							</li>
							<li>
								<i class="fa fa-fw fa-mortar-board f-20 c-lighter pull-left"></i>
								<a href="batch.html">Batch</a>
							</li>
							<li>
								<i class="fa fa-fw fa-file-text f-20 c-lighter pull-left"></i>
								<a href="tor.html">TOR</a>
							</li>
							<li>
								<i class="fa fa-fw fa-group f-20 c-lighter pull-left"></i>
								<a href="about.html">About Us</a>
							</li>
							<li>
								<i class="fa fa-fw fa-question-circle f-20 c-lighter pull-left"></i>
								<a href="help.html">Help</a>
							</li>
						</ul>
						<div class="profile-social">
							<img src="{{url('public/images/facebook-ico.png')}}">
							<img src="{{url('public/images/twitter-ico.png')}}">
						</div>
					</div>
				</div>
				
				<div class="col-md-6 s-pad">
					<div class="posts-pane">
						@if($posts)	

							<?php foreach ($posts as $key => $value):?>
								
								<div class="single-post company_post" >
									<div class="single-post-head">
										<img src="{{url('public/storage/company_logos')}}/<?php echo $value['company']['company_logo']?>" class="pull-left comp_logo">
										<div class="company-info pull-left">
											<h6><?php echo  strtoupper($value['company']['company_name']) ?></h6>
											<span><?php echo  $value['company']['address']; ?></span>
										</div>
										<span class="pull-right post-time" style="font-size: 10px;">
											
											<?php
												$now 		= Carbon\Carbon::now();
												$post_date  = new DateTime($value->post_date);

												$diff = $post_date->diff($now);							

												if($diff->y > 0){
													echo $diff->y . " year(s) ago";
												}
												else{

													if($diff->m > 0){
														echo $diff->m . " month(s) ago";
													}

													else{
														if($diff->d > 1){
															echo $post_date->format('F d');
														}
														if($diff->d == 1){
															echo "Yesterday at " . date_format($post_date, 'h:i a');
														}
														
														if($diff->d == 0){

															if($diff->i > 1){
																echo $diff->i . " minute";
															}
															if($diff->i >= 1){
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

											<h5><span>Position: </span><a href="#" class="c-green post_position"> <?php echo  $value->position ?> </a></h5><br>	
											<p class="minimize"> <?php echo  $value->post_content ?> </p>
											<h5><span>Salary: </span><a href="#" class="c-green post_position"><?php echo  ($value->salary) ?> </a></h5><br>	
										@endif

										@if($value->img)

											<img src="{{url('public/storage/post_images')}}/<?php echo  $value->img?>" class='img-responsive'>

										@endif
									</div>
									
									<div class="single-post-footer">
										<a href="#" class="comments-label">Comments</a>	
										



										
										<div class="comments-section">
													
											<div class="comment-content">

												<div class="single-post-head">
													<img src="{{url('public/images/dale.jpg')}}"" class="pull-left">
													<div class="company-info pull-left">
														<h6>Dale P. Blanco</h6>
														<span>Bachelor of Science in Information Technology</span>
													</div>
													<span class="pull-right post-time">5 mins ago</span>
												</div>

												<div class="single-post-body">
													<p class="minimize"> This is my comment. </p>
												</div>

											</div>

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

@endsection