@extends('layouts/alumnus/alumnus-master')

@section('links')


<!-- styles -->
<style></style>

@endsection


@section('content')


	<div class="main-content">
		<div class="container">
			
			<div class="row">
				
				<div class="col-md-9 s-pad">
					
					<div class="p-head bg-white">
						<div class="row">
							<div class="col-xs-3">
								<img class="img img-responsive img-thumbnail auth_image" alt="" style="width:100%;">
							</div>
							<div class="col-xs-9 s-pad">
								<div class="p-top">
									<h3 class="pull-left">{{ $user->alumnus_info->student_per_info->fname }} {{ $user->alumnus_info->student_per_info->mname[0] }}. {{ $user->alumnus_info->student_per_info->lname }}</h3>
									<a href="#">									
										<img src="{{ url('public/images/profile/edit.png')}}" class="pull-right" alt="">
									</a>
								</div>

								<div class="p-mid">

									<h6 class="c-green pull-left">Graduate: </h6>
									<div class="p-mid-right">
										<h6>{{ $user->alumnus_info->stud_program[0]->program_list->prog_name }}</h6>

									</div>
									<div class="clearfix"><br></div>
									<ul>
										<li class="mb-10 oh">
											<span class="pull-left" style="width:90px;">Batch</span>
											<span class="pull-left c-dark" style="width:550px;"> {{$graduation_info->sch_year}} </span>
										</li>

										<li class="mb-10 oh">
											<span class="pull-left" style="width:90px;">Skills</span><span class="pull-left c-dark" style="width:550px;">

											<?php $skills = explode(",", $user->alumnus_info->student_per_info->skills->skills); ?>
											@foreach ($skills as $key => $value)
												{{ $value }}	
												@if($key != count($skills) - 1)
													,
												@endif		
											@endforeach

											</span>
										</li>
										<li class="mb-10 oh">
											<span class="pull-left" style="width:90px;">Certificates</span><span class="pull-left c-dark" style="width:550px;">
												<p class="minimize c-dark">

													@foreach($user->alumnus_info->student_per_info->trainings as $key => $training)
														{{ $training ->title}}
														@if($key != count($user->alumnus_info->student_per_info->trainings) - 1)
															,
														@endif
													@endforeach
												</p>

											</span>
										</li>
										<li class="">
											<span class="pull-left" style="width:90px;">Works</span><span class="pull-left c-dark" style="width:550px;">
												@foreach($user->alumnus_info->student_per_info->work_experience as $work_exp)
													{{ $work_exp->company }}
													@if($key != count($user->alumnus_info->student_per_info->work_experience) - 1)
														,
													@endif

												@endforeach
											</span>
										</li>
									</ul>
								</div>

								<div class="p-bot">
									<!-- <button class="btn btn-success btn-prime btn-sm pull-left">Improve your profile</button> -->
									<div class="p-bot-right pull-right">
										<p class="c-green t-right no-margin">142</p>
										<span class="c-light f-10 no-margin no-padding">batch mates</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="jobs bg-white p-15 mb-5">
						<div class="search-jobs c-light mb-15">
							@if($searched_job)
								<h5 class="mb-10 f-13">Job Search<small><a href="{{route('jobs')}}" class="c-green pull-right"> Back to main </a></small></h5>
							@endif
							<div class="search-bar">
								<form action="{{ route('job_search') }}" method="GET">
									{{ csrf_field() }}
									<input type="text" class="d-input" name="search_key" id="search_key" style="padding:4px 5px;width:85%;" placeholder="Job title or position" value="{{old('search_key')}}" required>
									<button type="submit" class="btn btn-success btn-prime btn-sm">Search</button>
								</form>
							</div>
						</div>
						

						@if($searched_job)
						
							<div>
								
								<h5><b style="color:grey;">Results</b> <small>- {{ count($searched_job) }} found</small></h5>
								<ul class="jobs-list">
									@foreach($searched_job as $job)
										
						    			<li class="ptb-10 mb-24">
						    				<img src="{{ asset('public/storage/company_logos')}}/{{$job->company->company_logo}}" class="pull-left mr-32" style="width:150px;" alt="">
								    		<div class="job-details oh">
								    			<div class="head mb-10">
								    				<h4 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{ strtoupper($job->company->company_name) }}</h4>
								    				<h6 class="lh-1 mt-3 c-light">{{ ucwords($job->company->address) }}</h6>
								    				<h6 class="mt-5">Position : <span class="c-green f-14">{{ ucwords($job->positions->position_title) }}</span></h6>
								    			</div>
								    			<div class="body">
								    				<p class="minimize"> {{ $job->post_content }} </p>
								    			</div>
								    			<div class="footer">
								    				<h5 class="c-dark">Salary : <span class="c-green">{{ $job->salary }}</span></h5>
								    				<h6 class="c-light mt-5 f-11">2 Days Ago</h6>
								    			</div>
								    		</div>
						    			</li>
											
									@endforeach

								</ul>
							</div>


						@else

							<ul class="nav nav-tabs mb-15">
								<li class="active"><a data-toggle="tab" href="#all_jobs" class="f-12" id="all_jobs_btn">All Jobs</a></li>
								<li><a data-toggle="tab" href="#recommended_jobs" class="f-12">Recommended Jobs <small >({{ count($recommended) }})</small></a></li>
								<li><a data-toggle="tab" href="#domestic_jobs" class="f-12">Domestic Jobs</a></li>
								<li><a data-toggle="tab" href="#international_jobs" class="f-12">Jobs Abroad</a></li>
							</ul>
							
							<div class="tab-content border-bot">
							  	

								<div id="all_jobs" class="tab-pane fade in active">
								
							    	<ul class="jobs-list">
										@foreach($all_jobs as $job)
											
							    			<li class="ptb-10 mb-24">
							    				<img src="{{ asset('public/storage/company_logos')}}/{{$job->company->company_logo}}" class="pull-left mr-32" style="width:150px;">
									    		<div class="job-details oh">
									    			<div class="head mb-10">
									    				<h6 class="c-light mt-5 f-11 pull-right" style="margin-right:20px;">{{ date_format( new DateTime($job->post_date), "M d, Y") }}</h6>
									    				<h4 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{ strtoupper($job->company->company_name) }}</h4>
									    				<h6 class="lh-1 mt-3 c-light">{{ ucwords($job->company->address) }}</h6>
									    				<h6 class="mt-5">Position : <span class="c-green f-14">{{ ucwords($job->positions->position_title) }}</span></h6>
									    			</div>
									    			<div class="body">
									    				<p class="minimize"> {{ $job->post_content }} </p>
									    			</div>
									    			<div class="footer">
									    				<h5 class="c-dark">Salary : <span class="c-green">{{ $job->salary }}</span></h5>
									    				<h6 class="c-light mt-5 f-11">{{ date_format( new DateTime($job->post_date), "M d, Y") }}</h6>
									    			</div>
									    		</div>
							    			</li>
												

										@endforeach				
									</ul>
									
									<div class="text-right">
										{!! $all_jobs->fragment('all_jobs')->render() !!}
									</div>

								</div>

								<div id="recommended_jobs" class="tab-pane fade">
									<ul class="jobs-list">
										@foreach($recommended as $job)
											
							    			<li class="ptb-10 mb-24">
							    				<img src="{{ asset('public/storage/company_logos')}}/{{$job->company->company_logo}}" class="pull-left mr-32" style="width:150px;" alt="">
									    		<div class="job-details oh">
									    			<div class="head mb-10">
									    				<h4 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{ strtoupper($job->company->company_name) }}</h4>
									    				<h6 class="lh-1 mt-3 c-light">{{ ucwords($job->company->address) }}</h6>
									    				<h6 class="mt-5">Position : <span class="c-green f-14">{{ ucwords($job->positions->position_title) }}</span></h6>
									    			</div>
									    			<div class="body">
									    				<p class="minimize"> {{ $job->post_content }} </p>
									    			</div>
									    			<div class="footer">
									    				<h5 class="c-dark">Salary : <span class="c-green">{{ $job->salary }}</span></h5>
									    				<h6 class="c-light mt-5 f-11">2 Days Ago</h6>
									    			</div>
									    		</div>
							    			</li>
										@endforeach				
									</ul>									
									<div class="text-right">
										{!! $recommended->fragment('recommended_jobs')->render() !!}
									</div>

								</div>

								<div id="domestic_jobs" class="tab-pane fade">
									
							    	<ul class="jobs-list">
										@foreach($domestic as $job)
											
							    			<li class="ptb-10 mb-24">
							    				<img src="{{ asset('public/storage/company_logos')}}/{{$job->company->company_logo}}" class="pull-left mr-32" style="width:150px;" alt="">
									    		<div class="job-details oh">
									    			<div class="head mb-10">
									    				<h4 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{ strtoupper($job->company->company_name) }}</h4>
									    				<h6 class="lh-1 mt-3 c-light">{{ ucwords($job->company->address) }}</h6>
									    				<h6 class="mt-5">Position : <span class="c-green f-14">{{ ucwords($job->positions->position_title) }}</span></h6>
									    			</div>
									    			<div class="body">
									    				<p class="minimize"> {{ $job->post_content }} </p>
									    			</div>
									    			<div class="footer">
									    				<h5 class="c-dark">Salary : <span class="c-green">{{ $job->salary }}</span></h5>
									    				<h6 class="c-light mt-5 f-11">2 Days Ago</h6>
									    			</div>
									    		</div>
							    			</li>
												

										@endforeach				
									</ul>
									
									<div class="text-right">
										{!! $domestic->fragment('domestic_jobs')->render() !!}
									</div>

								</div>

								<div id="international_jobs" class="tab-pane fade">
									
							    	<ul class="jobs-list">
										@foreach($international as $job)
											
							    			<li class="ptb-10 mb-24">
							    				<img src="{{ asset('public/storage/company_logos')}}/{{$job->company->company_logo}}" class="pull-left mr-32" style="width:150px;" alt="">
									    		<div class="job-details oh">
									    			<div class="head mb-10">
									    				<h4 class="lh-1 mt-0" data-toggle="modal" data-target="#companyModal">{{ strtoupper($job->company->company_name) }}</h4>
									    				<h6 class="lh-1 mt-3 c-light">{{ ucwords($job->company->address) }}</h6>
									    				<h6 class="mt-5">Position : <span class="c-green f-14">{{ ucwords($job->positions->position_title) }}</span></h6>
									    			</div>
									    			<div class="body">
									    				<p class="minimize"> {{ $job->post_content }} </p>
									    			</div>
									    			<div class="footer">
									    				<h5 class="c-dark">Salary : <span class="c-green">{{ $job->salary }}</span></h5>
									    				<h6 class="c-light mt-5 f-11">2 Days Ago</h6>
									    			</div>
									    		</div>
							    			</li>
												

										@endforeach				
									</ul>
									
									<div class="text-right">
										{!! $international->fragment('international_jobs')->render() !!}
									</div>

								</div>
							</div>
						
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

	<script>
		
		$(document).ready(function() {
		    if (location.hash) {
		        $("a[href='" + location.hash + "']").tab("show");
		    }
		    $(document.body).on("click", "a[data-toggle]", function(event) {
		        location.hash = this.getAttribute("href");
		    });
		});

		$(window).on("popstate", function() {
		    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
		    $("a[href='" + anchor + "']").tab("show");
		});

	</script>

@endsection