@extends('layouts/alumnus/alumnus-master')

@section('links')
    <link href="{{ asset('public/plugins/bootstrap-tags/bootstrap-tagsinput.css') }}" rel="stylesheet">


	<style>
		.header_collapse:hover {

			text-decoration: none;
		}
		.header_collapse:focus {

			text-decoration: none;
		}
		.image-preview-input {

		    position: relative;
			overflow: hidden;
			margin: 0px;    
		    color: #333;
		    background-color: #fff;
		    border-color: #ccc;    
		}
		.image-preview-input input[type=file] {

			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.image-preview-input-title {

		    margin-left:2px;
		}
		.popover {

			position:relative;
		}
		.nopadding {
		   padding: 0 !important;
		   margin: 0 !important;
		}

	</style>

@endsection


@section('content')

	<div class="main-content ">

		<div class="container">

			<div class="row">
				
				<div class="col-md-9 s-pad">
					
					@if(session()->has('update_success'))
						<div class="alert alert-success alert-dismissible fade in" role="alert">
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <strong>Success! </strong> {!!session()->get('update_success'); !!}.
					    </div>
					@endif

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
									<div class="p-mid-right pull-left">
										<h6>{{ $user->alumnus_info->stud_program[0]->program_list->prog_name }}</h6>
										<span>Student Id No: <span class="c-green">{{ $user->alumnus_info->stud_id }}</span></span><br>
										<span>Batch: <span>{{$graduation_info->sch_year}}</span></span><br>
										<span>Date Graduated: <span>March/April {{explode("-", $graduation_info->sch_year)[1]}}</span></span>
									</div>
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

					<!-- Personal Information -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#personal_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Personal Information</h6></a>
						</div>
						<div class="body in" id="personal_info_panel">
							<ul>
								<li>
									<h6 class="c-light f-12">Gender</h6>
									<h5 class="c-dark">{{ $user->alumnus_info->student_per_info->gender }}</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Birth Date</h6>
									<h5 class="c-dark">
										<?php 
											$timestamp = $user->alumnus_info->student_per_info->birthdate;
											echo date("F d, Y", strtotime($timestamp));
										?>	
									</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Birth Place</h6>
									<h5 class="c-dark">{{$user->alumnus_info->student_per_info->birthplace}}</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Age</h6>
									<h5 class="c-dark">{{ date_diff(date_create($user->alumnus_info->student_per_info->birthdate), date_create('now'))->y }}</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Nationality</h6>
									<h5 class="c-dark">
										{{ $user->alumnus_info->student_per_info->citizenship->nationality }}
									</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Marital Status</h6>
									<h5 class="c-dark">{{$user->alumnus_info->student_per_info->civ_status}}</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Religion</h6>
									<h5 class="c-dark"> {{ ucfirst($user->alumnus_info->student_per_info->religion) }}</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Mobile #</h6>
									<h5 class="c-dark">
										
										@foreach($user->alumnus_info->student_per_info->contact_number as $contact)
											@if(count($user->alumnus_info->student_per_info->contact_number) > 1)
											•
											@endif
											{{ $contact->phone_numbers->phone_number }}
										@endforeach
										
									</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Email</h6>
									<h5 class="c-dark">
										@foreach($user->alumnus_info->student_per_info->email_address as $email)
											@if(count($user->alumnus_info->student_per_info->email_address) > 1)
												•
											@endif
											<i class="c-green">{{ $email->emails->email}}</i>
										@endforeach
									</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Language</h6>
									<h5 class="c-dark">
										@foreach($user->alumnus_info->student_per_info->language_student as $language)
											@if(count($user->alumnus_info->student_per_info->language_student) > 1)
												•
											@endif
											{{ $language->languages['language'] }}
										@endforeach
									</h5>
								</li>
								<li>
									<h6 class="c-light f-12">Present Address</h6>
									<h5 class="c-dark">
										@foreach($user->alumnus_info->student_per_info->address as $addr)
											@if($addr->address_type == 'presentAddress')
												{{ $addr->address }}
												<?php break; ?>
											@endif
										@endforeach
									</h5>
								</li><br>
								<li>
									<h6 class="c-light f-12">Permanent Address</h6>
									<h5 class="c-dark">
										@foreach($user->alumnus_info->student_per_info->address as $addr)
											@if($addr->address_type == 'permanentAddress')
												{{ $addr->address }}
												<?php break; ?>
											@endif
										@endforeach
									</h5>
								</li>
							</ul>
						</div>
						<div class="footer">
							<br>
							<div class="update-info">
								<img src="{{ url('public/images/profile/pencil.png') }}" alt="" class="pull-left">
								<a class="f-10 c-green pull-left" data-toggle="modal" data-target="#personalModal">Update your personal information</a>
							</div>
						</div>
					</div>

					<!-- Family Information-->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#family_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Family</h6></a>
						</div>
						<div class="body in" id="family_info_panel">
							<ul>
								
								
								@foreach($user->alumnus_info->student_per_info->parents_student as $parents)
								
									<!-- father info -->
									@if(strtolower($parents['relationship']->relationship) == "father")

										<li>
											<h6 class="c-light f-12">Father</h6>
											<h5 class="c-dark">{{ $parents['parent_info']->fname ." ". $parents['parent_info']->mname[0]  . ". " . $parents['parent_info']->lname . " " . $parents['parent_info']->suffix }}</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Mobile #</h6>
											<h5 class="c-dark">09187542158</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Telephone #</h6>
											<h5 class="c-dark">225-4568</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Address</h6>
											<h5 class="c-dark">Blk 24, Lot 20 St. Libertad Butuan CIty Agusan del Norte</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Occupation</h6>
											<h5 class="c-dark">{{ $parents['parent_info']->occupation }}</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Designation</h6>
											<h5 class="c-dark">N/A</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Company Address</h6>
											<h5 class="c-dark">N/A</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Office Telephone #</h6>
											<h5 class="c-dark">N/A</h5>
										</li><br>

									@else

										<!-- mother info -->
										<li>
											<h6 class="c-light f-12">Mother</h6>
											<h5 class="c-dark">{{ $parents['parent_info']->fname ." ". $parents['parent_info']->mname[0]  . ". " . $parents['parent_info']->lname . " " . $parents['parent_info']->suffix }}</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Mobile #</h6>
											<h5 class="c-dark">09187542158</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Telephone #</h6>
											<h5 class="c-dark">225-4568</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Address</h6>
											<h5 class="c-dark">Blk 24, Lot 20 St. Libertad Butuan CIty Agusan del Norte</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Occupation</h6>
											<h5 class="c-dark">{{ $parents['parent_info']->occupation }}</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Designation</h6>
											<h5 class="c-dark">N/A</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Company Address</h6>
											<h5 class="c-dark">N/A</h5>
										</li>
										<li>
											<h6 class="c-light f-12">Office Telephone #</h6>
											<h5 class="c-dark">N/A</h5>
										</li>
										
									@endif
								@endforeach
							</ul>

						</div>
						<div class="footer">
							<br>
							<div class="update-info">
								<img src="{{ url('public/images/profile/pencil.png') }}" alt="" class="pull-left">
								<a class="f-10 c-green pull-left" data-toggle="modal" data-target="#familyModal">Update your family information</a>
							</div>
						</div>
					</div>
					
					<!-- Education Information -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#education_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Education</h6></a>
						</div>
						<div class="body in" id="education_info_panel" style="padding-left:15px;">
							

							<div class="row bot-space-16">
								<!-- Elementary Information -->
								@foreach($user->alumnus_info->student_per_info->elementary_info as $elem_info)
									<ul class="list-unstyled">
										<li>
											<h6 class="c-light">Elementary</h6>
											<h5>{{ $elem_info->school_name }}</h5>
										</li>
										<li>
											<h6 class="c-light">Year</h6>
											<h5>{{ $elem_info->sch_year }}</h5>
										</li>
										<li>
											<h6 class="c-light">Address</h6>
											<h5>{{ $elem_info->school_address }}</h5>
										</li>
										<li>
											<h6 class="c-light">Honor</h6>
											<h5>{{ $elem_info->academic_honor }}</h5>	
										</li>

									@endforeach
								</ul>
							</div>

							<!-- HighSchool Information -->
							<div class="row bot-space-16">
								<div class="col-xs-5">
									<h6 class="c-light">High School</h6>
									<h5>Timber City</h5>
								</div>
								<div class="col-xs-5">
									<h6 class="c-light">Address</h6>
									<h5>Montilla Blvd., Butuan City Agusan del Norte Phils.</h5>
								</div>
								<div class="col-xs-2">
									<h6 class="c-light">Honor</h6>
									<h5>Valedictorian</h5>
								</div>
							</div>

							<!-- College Information -->
							<div class="row bot-space-16">
								<div class="col-xs-5">
									<h6 class="no-lh c-light">College</h6>
									<h5 class="no-lh">AMA Computer Learning Center College of Butuan</h5>
									<h6 class="no-lh c-green">Bachelor of Science in Computer Science</h6>
								</div>
								<div class="col-xs-5">
									<h6 class="no-lh c-light">Address</h6>
									<h5 class="no-lh">HDS Building, JC Aquino Ave. Butuan City Phils.</h5>
								</div>
								<div class="col-xs-2">
									<h6 class="no-lh c-light">Honor</h6>
									<h5 class="no-lh">Comlaude</h5>
								</div>
							</div>

							<!-- Master Information -->
							<div class="row bot-space-16">
								<div class="col-xs-5">
									<h6 class="no-lh c-light">Masters</h6>
									<h5 class="no-lh">AMA Computer Learning Center College of Butuan</h5>
									<h6 class="no-lh c-green">Masters of Science in Computer Science</h6>
								</div>
								<div class="col-xs-5">
									<h6 class="no-lh c-light">Address</h6>
									<h5 class="no-lh">HDS Building, JC Aquino Ave. Butuan City Phils.</h5>
								</div>
								<div class="col-xs-2">
									<h6 class="no-lh c-light">Honor</h6>
									<h5 class="no-lh">None</h5>
								</div>
							</div>
						</div>

						<div class="footer">
							<br>
							<div class="update-info">
								<img src="{{ url('public/images/profile/pencil.png') }}" alt="" class="pull-left">
								<a class="f-10 c-green pull-left" data-toggle="modal" data-target="#educationModal">Update your education information</a>
							</div>
						</div>
						
					</div>
					
					<!-- Eligibility Information -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#eligibility_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Eligibilities</h6></a>
						</div>
						<div class="body in" id="eligibility_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#eligibilityModal"><i class="fa fa-plus-square"></i> Add Eligibility</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot">Eligibilities</th>
										<th class="f-11 c-light nopad-bot text-center">Rank</th>
										<th class="f-11 c-light nopad-bot text-center">Rate</th>
										<th class="f-11 c-light nopad-bot text-center">Date of Examination</th>
										<th class="f-11 c-light nopad-bot text-center">Place of Examination</th>
										<th class="f-11 c-light nopad-bot text-center">Uploaded Certificates</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($user->alumnus_info->student_per_info->eligibilities as $eligibility)
										<tr>
											<td class="c-dark">{{ $eligibility->type }}</td>
											<td class="c-dark text-center">{{ $eligibility->rank }}</td>
											<td class="c-dark text-center">{{ $eligibility->rating}}</td>
											<td class="c-dark text-center">{{ $eligibility->date_of_exam }}</td>
											<td class="c-dark text-center">{{ $eligibility->place_of_exam }}</td>
											@if( $eligibility->certificate_file )
												<td class="text-center"><a href="#" class="f-11 c-green preview_certificate" file-name="{{$eligibility->certificate_file}}" file-folder="eligibilities" data-toggle="modal">Preview</a></td>
											@else
												<td class="text-center"><a href="#" class="f-11 c-green upload_certificate" data-i="{{ $eligibility->eligibility_id }}" data-t="eligibilities" data-p="eligibility_id" >Upload Certificate</a></td>
											@endif
												<td>
													<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="eligibilities" data-p="eligibility_id" data-i="{{ $eligibility->eligibility_id }}"><i class="fa fal fa-times"></i></a>
												</td>
										</tr>
									@endforeach

								</tbody>
							</table>
							
						</div>

						<div class="footer"></div>
					</div>
						
					<!-- Work Experience Info -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#work_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Work Experience</h6></a>
						</div>
						<div class="body in" id="work_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_exp_modal"><i class="fa fa-plus-square"></i> Add Experience</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot">Company</th>
										<th class="f-11 c-light nopad-bot">Designation</th>
										<th class="f-11 c-light nopad-bot">Location</th>
										<th class="f-11 c-light nopad-bot">Job Tenure</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->alumnus_info->student_per_info->work_experience as $work_exp)
										<tr>
											<td class="c-dark">{{$work_exp->company}}</td>
											<td class="c-dark">{{$work_exp->position}}</td>
											<td class="c-dark">{{$work_exp->address}}</td>
											<td class="c-dark">
												<?php 
													$from = new DateTime($work_exp->from);
													$to   = new DateTime($work_exp->to);
													$from_string = $from->format('M Y');
													$to_string   = $to->format('M Y');
													echo $from_string . " - " . $to_string;
												?>
											</td>
											<td>
												<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="work_experiences" data-p="work_exp_id" data-i="{{ $work_exp->work_exp_id }}"><i class="fa fal fa-times"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="footer"></div>
					</div>

					<!-- Services Info -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#services_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Services</h6></a>
						</div>
						<div class="body in" id="services_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_service_modal"><i class="fa fa-plus-square"></i> Add Service</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot">Event</th>
										<th class="f-11 c-light nopad-bot">Service Position</th>
										<th class="f-11 c-light nopad-bot">Details</th>
										<th class="f-11 c-light nopad-bot">Duration</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->alumnus_info->student_per_info->services as $service)
										<tr>
											<td class="c-dark">{{$service->service_title}}</td>
											<td class="c-dark">{{$service->position}}</td>
											<td class="c-dark f-11 max-150"><p class="minimize">{{$service->details}}</p></td>
											<td class="c-dark">
												<?php
														$from = new DateTime($service->from);
														$to   = new DateTime($service->to);
														$from_string = $from->format('M Y');
														$to_string   = $to->format('M Y');
														echo $from_string . " - " . $to_string;
												?>
											</td>
											<td>
												<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="services" data-p="service_id" data-i="{{ $service->service_id }}"><i class="fa fal fa-times"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="footer"></div>
					</div>

					<!-- Trainings and Certificates -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#trainings_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Trainings & Certificates</h6></a>
						</div>
						<div class="body in" id="trainings_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_training_modal"><i class="fa fa-plus-square"></i> Add Training/Certificate</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot">Training</th>
										<th class="f-11 c-light nopad-bot">Location</th>
										<th class="f-11 c-light nopad-bot">Training Duration</th>
										<th class="f-11 c-light nopad-bot text-center">Uploaded Certificates</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->alumnus_info->student_per_info->trainings as $training)
										<tr>
											<td class="c-dark">{{$training->title}}</td>
											<td class="c-dark">{{$training->location}}</td>
											<td class="c-dark">
												<?php
														$from = new DateTime($training->from);
														$to   = new DateTime($training->to);
														$from_string = $from->format('M Y');
														$to_string   = $to->format('M Y');
														echo $from_string . " - " . $to_string;
												?>
											</td>
											@if( $training->certificate_file )
												<td class="text-center"><a href="#" class="f-11 c-green preview_certificate" file-name="{{$training->certificate_file}}" file-folder="trainings" data-toggle="modal">Preview</a></td>
											@else
												<td class="text-center"><a href="#" class="f-11 c-green upload_certificate" data-i="{{ $training->training_id }}" data-t="trainings" data-p="training_id" >Upload Certificate</a></td>
											@endif
											<td>
												<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="trainings" data-p="training_id" data-i="{{ $training->training_id }}"><i class="fa fal fa-times"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="footer"></div>
					</div>

					<!-- Affiliations -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#affiliation_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Affiliation</h6></a>
						</div>
						<div class="body in" id="affiliation_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_affiliation_modal"><i class="fa fa-plus-square"></i> Add Affiliation</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot text-left">Organization</th>
										<th class="f-11 c-light nopad-bot">Position</th>
										<th class="f-11 c-light nopad-bot">Years</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->alumnus_info->student_per_info->affiliation as $affiliation)
										<tr>
											<td class="c-dark text-left">{{$affiliation->organization}}</td>
											<td class="c-dark">{{$affiliation->position}}</td>
											<td class="c-dark">
												<?php
														$from = new DateTime($affiliation->from);
														$to   = new DateTime($affiliation->to);
														$from_string = $from->format('M Y');
														$to_string   = $to->format('M Y');
														echo $from_string . " - " . $to_string;
												?>
											</td>	
											<td>
												<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="affiliations" data-p="affiliation_id" data-i="{{ $affiliation->affiliation_id }}"><i class="fa fal fa-times"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="footer"></div>
					</div>

					<!-- Awards and Recognition -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#awards_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Awards / Recognition</h6></a>
						</div>
						<div class="body in" id="awards_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_award_modal"><i class="fa fa-plus-square"></i> Add Award</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot">Award / Recognition</th>
										<th class="f-11 c-light nopad-bot">Date Received</th>
										<th class="f-11 c-light nopad-bot">Event</th>
										<th class="f-11 c-light nopad-bot text-center">Uploaded Certificates</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->alumnus_info->student_per_info->awards as $award)
										<tr>
											<td class="c-dark">{{$award->award}}</td>
											<td class="c-dark">
												<?php
														$date = new DateTime($award->date_received);
														$date_string = $date->format('M Y');
														echo $date_string;
												?>
											</td>
											<td class="c-dark">{{$award->event}}</td>
											@if( $award->certificate_file )
												<td class="text-center"><a href="#" class="f-11 c-green preview_certificate" file-name="{{$award->certificate_file}}" file-folder="awards" data-toggle="modal">Preview</a></td>
											@else
												<td class="text-center"><a href="#" class="f-11 c-green upload_certificate" data-i="{{ $award->award_id }}" data-t="awards" data-p="award_idf" >Upload Certificate</a></td>
											@endif
											<td>
												<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="awards" data-p="award_id" data-i="{{ $award->award_id }}"><i class="fa fal fa-times"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="footer"></div>
					</div>
					
					<!-- Skills Information -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#skills_info_panel" class="header_collapse"><h6 class="no-padding no-margin">Skills</h6></a>
						</div>
						<div class="body in" id="skills_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_skills_modal"><i class="fa fa-plus-square"></i> Add Skills</a>
							<ul class="skills-list">
								<?php
									$skills = explode(",", $user->alumnus_info->student_per_info->skills->skills);
									foreach ($skills as $key => $value) {
										echo "<li class='c-green'> {$value} </li>";
									}
								?>
							</ul>
						</div>

						<div class="footer"></div>
					</div>

					<!-- References -->
					<div class="personal-info">
						<div class="head">
							<a data-toggle="collapse" href="#reference_info_panel" class="header_collapse"><h6 class="no-padding no-margin">References</h6></a>
						</div>
						<div class="body in" id="reference_info_panel">
							<a href="#" class="f-10 c-green pull-right" data-toggle="modal" data-target="#add_reference_modal"><i class="fa fa-plus-square"></i> Add Reference</a>
							<table class="table no-border info-table">
								<thead>
									<tr>
										<th class="f-11 c-light nopad-bot">Name</th>
										<th class="f-11 c-light nopad-bot">Designation</th>
										<th class="f-11 c-light nopad-bot">Company</th>
										<th class="f-11 c-light nopad-bot">Mobile / Telephone #</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->alumnus_info->student_per_info->references as $reference)
										<tr>
											<td class="c-dark">{{$reference->name}}</td>
											<td class="c-dark">{{$reference->position}}</td>
											<td class="c-dark">{{$reference->company_name}}</td>
											<td class="c-dark">{{$reference->contact_number}}</td>
											<td>
												<a href="#" style="color:#CCCCCC;" title="remove" class="remove_data" data-t="references" data-p="reference_id" data-i="{{ $reference->reference_id }}"><i class="fa fal fa-times"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="footer"></div>
					</div>
					
				</div>

				
				<div class="col-lg-3 s-pad bg-white">
					@include('layouts/alumnus/sidebar_right')
				</div>
			</div>

		</div>

	</div>


<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::: MODALS AND ALERTS ::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

<!-- Personal Information Modal -->
<div id="personalModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content box-edge">
    	<div class="modal-head">
    		<div class="border-bot" style="padding:16px 0;">
    			<h6 class="reset c-dark">Personal Information</h6>
    		</div>
    	</div>   	
		<div class="modal-body" style="padding-top:0;overflow:hidden">
			<form method="POST" action="{{ route('update_personal_info') }}" onkeypress="return event.keyCode != 13;">
				{{ csrf_field() }}
				<ul class="p-infolist">
					<li>
						<h6 class="f-11 c-light mb-5">Gender</h6>
						<select name="gender" id="gender">
							@if(strtolower($user->alumnus_info->student_per_info->gender) == "male")
								<option value="Male" selected>Male</option>
							@else
								<option value="Male">Male</option>
							@endif

							@if(strtolower($user->alumnus_info->student_per_info->gender) == "female")
								<option value="Female" selected>Female</option>
							@else
								<option value="Female">Female</option>
							@endif							
						</select>
					</li>
					<li>
						<h6 class="f-11 c-dark mb-10">Birth Place</h6>
						<input type="text" name="birthplace" value="{{ucfirst($user->alumnus_info->student_per_info->birthplace)}}">
					</li>
					<li>
						<h6 class="f-11 c-light mb-3">Birthdate</h6>
						<input type="date" name="birthdate" style="border:0.5px solid #eeeeee;" value="{{$user->alumnus_info->student_per_info->birthdate}}">
					</li>
					<li>
						<h6 class="f-11 c-light mb-3">Age</h6>
						<input type="text" value="{{ date_diff(date_create($user->alumnus_info->student_per_info->birthdate), date_create('now'))->y }}" readonly>
					</li>
					<li>
						<h6 class="f-11 c-light mb-3">Nationality</h6>
						<input type="text" name="nationality" value="{{ ucfirst($user->alumnus_info->student_per_info->citizenship->nationality) }}">
					</li>
					<li>
						<h6 class="f-11 c-light mb-3">Marital Status</h6>
						<select name="status" id="">
							
							
							@if(strtolower($user->alumnus_info->student_per_info->civ_status) == "single")
								<option value="Single" selected>Single</option>
							@else
								<option value="Single">Single</option>
							@endif

							@if(strtolower($user->alumnus_info->student_per_info->civ_status) == "married")
								<option value="Married" selected>Married</option>
							@else
								<option value="Married">Married</option>
							@endif	
							
						</select>
					</li>
					<li >
						<h6 class="f-11 c-light mb-3">Religion</h6>
						<input type="text" name="religion" value="{{ ucfirst($user->alumnus_info->student_per_info->religion) }}">
					</li>
					<li>
						<h6 class="f-11 c-dark mb-10">Present Address</h6>
						<input type="text" name="present_address" value="@foreach($user->alumnus_info->student_per_info->address as $addr)@if($addr->address_type == 'presentAddress'){{ $addr->address }}<?php break; ?>@endif @endforeach">
					</li>
					<li>
						<h6 class="f-11 c-dark mb-10">Permanent Address</h6>
						<input type="text" name="permanent_address" value="@foreach($user->alumnus_info->student_per_info->address as $addr)@if($addr->address_type == 'permanentAddress'){{ $addr->address }}<?php break; ?>@endif @endforeach">
					</li><br>
					<li>
						<h6 class="f-11 c-light mb-3">Mobile #</h6>
						<input type="text" name="mobile_number"  data-role="tagsinput" value=" 
							<?php foreach ($user->alumnus_info->student_per_info->contact_number as $contact): ?>
									{{ $contact->phone_numbers->phone_number }},
							<?php endforeach ?> 
						">
					</li>
					<li>
						<h6 class="f-11 c-light mb-3">Email Address</h6>
						<input type="text" name="email_address"  data-role="tagsinput" value=" 
							<?php foreach ($user->alumnus_info->student_per_info->email_address as $email): ?>
									{{$email->emails->email}},
							<?php endforeach ?> 
						">
					</li>
					<li style="margin-right:0;">
						<h6 class="f-11 c-light mb-3">Language</h6>
						<input type="text" name="languages"  data-role="tagsinput" value="@foreach($user->alumnus_info->student_per_info->language_student as $language){{ $language->languages['language'] }},@endforeach">						
					</li>
				</ul>
				<input type="text" name="spi_id" readonly value="{{ $user->alumnus_info->student_per_info->spi_id }}">
				<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
			</form>
		</div>
  	</div>
	</div>
</div>

<!-- Family Information Modal -->
<div id="familyModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content box-edge">
    	<div class="modal-head">
    		<div class="border-bot" style="padding:16px 0;">
    			<h6 class="reset c-dark">Family Information</h6>
    		</div>
    	</div>   	
		<div class="modal-body" style="padding-top:0;overflow:hidden">
			<ul class="p-infolist">
				<li class="border-bot" style="width:100%;margin-top:10px;">
					<h6 class="f-11 c-dark mb-10 pull-left">Father's Information</h6>
					<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">First Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Middle Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Last Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Suffix</h6>
							<input type="text" style="width:200px;">
						</li>
					</ul>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Mobile #</h6>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Telephone #</h6>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</li>
					</ul>
				</li>
				<li class="border-bot" style="width:100%">
					<h6 class="f-11 c-dark mb-10">Address</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Province</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">City</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Barangay</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Blk no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Lot no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Zip code</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Street</h6>
							<input type="text" style="width:150px;">
						</li>
						<li style="margin-right:0;">
							<h6 class="f-11 c-light mb-3">Country</h6>
							<select name="" id="">
								<option value="Unites States of America">United States</option>
								<option value="Philippines">Philippines</option>
							</select>
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Occupation</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Designation</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Office Telephone #</h6>
							<input type="text" style="width:200px;">
						</li>
					</ul>
				</li>
				<li class="border-bot" style="width:100%">
					<h6 class="f-11 c-dark mb-10">Office Address</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Province</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">City</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Barangay</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Blk no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Lot no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Zip code</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Street</h6>
							<input type="text" style="width:150px;">
						</li>
						<li style="margin-right:0;">
							<h6 class="f-11 c-light mb-3">Country</h6>
							<select name="" id="">
								<option value="Unites States of America">United States</option>
								<option value="Philippines">Philippines</option>
							</select>
						</li>
					</ul>
				</li>

				<!-- ############################ MOTHER'S INFO ########################################### -->

				<li class="border-bot" style="width:100%;margin-top:25px;">
					<h6 class="f-11 c-dark mb-10 pull-left">Mother's Information</h6>
					<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">First Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Middle Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Last Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Suffix</h6>
							<input type="text" style="width:200px;">
						</li>
					</ul>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Mobile #</h6>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Telephone #</h6>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</li>
					</ul>
				</li>
				<li class="border-bot" style="width:100%">
					<h6 class="f-11 c-dark mb-10">Address</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Province</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">City</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Barangay</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Blk no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Lot no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Zip code</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Street</h6>
							<input type="text" style="width:150px;">
						</li>
						<li style="margin-right:0;">
							<h6 class="f-11 c-light mb-3">Country</h6>
							<select name="" id="">
								<option value="Unites States of America">United States</option>
								<option value="Philippines">Philippines</option>
							</select>
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Occupation</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Designation</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Office Telephone #</h6>
							<input type="text" style="width:200px;">
						</li>
					</ul>
				</li>
				<li class="border-bot" style="width:100%">
					<h6 class="f-11 c-dark mb-10">Office Address</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Province</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">City</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Barangay</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Blk no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Lot no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Zip code</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Street</h6>
							<input type="text" style="width:150px;">
						</li>
						<li style="margin-right:0;">
							<h6 class="f-11 c-light mb-3">Country</h6>
							<select name="" id="">
								<option value="Unites States of America">United States</option>
								<option value="Philippines">Philippines</option>
							</select>
						</li>
					</ul>
				</li>
				
				<!-- ############################ SIBLINGS INFO ########################################### -->

				<li class="border-bot" style="width:100%;margin-top:25px;">
					<h6 class="f-11 c-dark mb-10 pull-left">Siblings Information</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">First Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Middle Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Last Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Suffix</h6>
							<input type="text" style="width:200px;">
						</li>
						<li><a href="#" class="btn btn-default no-padding" style="width:25px;height:25px;"><i class="fa fa-plus f-12" style="text-align: center;line-height:25px;color:#aaa;"></i></a></li>
					</ul>
				</li>

				<!-- ############################ WIFE'S INFO ########################################### -->
				
				<li class="border-bot" style="width:100%;margin-top:25px;">
					<h6 class="f-11 c-dark mb-10 pull-left">Wife's Information</h6>
					<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">First Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Middle Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Last Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Suffix</h6>
							<input type="text" style="width:200px;">
						</li>
					</ul>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Mobile #</h6>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Telephone #</h6>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</li>
					</ul>
				</li>
				<li class="border-bot" style="width:100%">
					<h6 class="f-11 c-dark mb-10">Address</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Province</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">City</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Barangay</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Blk no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Lot no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Zip code</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Street</h6>
							<input type="text" style="width:150px;">
						</li>
						<li style="margin-right:0;">
							<h6 class="f-11 c-light mb-3">Country</h6>
							<select name="" id="">
								<option value="Unites States of America">United States</option>
								<option value="Philippines">Philippines</option>
							</select>
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Occupation</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Designation</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Office Telephone #</h6>
							<input type="text" style="width:200px;">
						</li>
					</ul>
				</li>
				<li class="border-bot" style="width:100%">
					<h6 class="f-11 c-dark mb-10">Office Address</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">Province</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">City</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Barangay</h6>
							<input type="text" style="width:150px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Blk no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Lot no.</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Zip code</h6>
							<input type="text" style="width:50px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Street</h6>
							<input type="text" style="width:150px;">
						</li>
						<li style="margin-right:0;">
							<h6 class="f-11 c-light mb-3">Country</h6>
							<select name="" id="">
								<option value="Unites States of America">United States</option>
								<option value="Philippines">Philippines</option>
							</select>
						</li>
					</ul>
				</li>

				<!-- ############################ CHILDREN'S INFO ########################################### -->

				<li class="border-bot" style="width:100%;margin-top:25px;">
					<h6 class="f-11 c-dark mb-10 pull-left">Children</h6>
				</li>
				<li>
					<ul>
						<li>
							<h6 class="f-11 c-light mb-3">First Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Middle Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Last Name</h6>
							<input type="text" style="width:200px;">
						</li>
						<li>
							<h6 class="f-11 c-light mb-3">Suffix</h6>
							<input type="text" style="width:200px;">
						</li>
						<li><a href="#" class="btn btn-default no-padding" style="width:25px;height:25px;"><i class="fa fa-plus f-12" style="text-align: center;line-height:25px;color:#aaa;"></i></a></li>
					</ul>
				</li>

				</ul>
				<button class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
			</div>
	  	</div>
	</div>
</div>

<!-- Education Modal -->
<div id="educationModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h6 class="reset c-dark">Education Information</h6>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">
				<ul class="p-infolist">

					<!-- Elementary -->
					
					<li class="border-bot" style="width:100%;margin-top:10px;">
						<h6 class="f-11 c-dark mb-10 pull-left c-green bold">Elementary</h6>
						<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
					</li>
					@foreach($user->alumnus_info->student_per_info->elementary_info as $elem_info)
						<ul  class="border-bot">
							<li>
								<h6 class="f-11 c-light mb-3">School Name</h6>
								<input type="text" style="width:500px;" value="{{ $elem_info->school_name }}">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Academic Year</h6>
								<input type="text" style="width:150px;" value="{{ $elem_info->sch_year }}">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Honor</h6>
								<input type="text" style="width:150px;" value="{{ $elem_info->academic_honor }}">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Address</h6>
								<input type="text" style="width:300px;" value="{{ $elem_info->school_address }}">
							</li>
						</ul>
					@endforeach



					<li class="border-bot" style="width:100%;margin-top:10px;">
						<h6 class="f-11 c-dark mb-10 pull-left c-green bold">Junior High</h6>
						<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
					</li>
					<li>
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">School Name</h6>
								<input type="text" style="width:645px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Academic Year</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Honor</h6>
								<input type="text" style="width:150px;">
							</li>
						</ul>
					</li>
					<li class="border-bot" style="width:100%">
						<h6 class="f-11 c-dark mb-10">Address</h6>
					</li>
					<li>
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">Province</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">City</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Barangay</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Blk no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Lot no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Zip code</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Street</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Country</h6>
								<select name="" id="">
									<option value="Unites States of America">United States</option>
									<option value="Philippines">Philippines</option>
								</select>
							</li>
						</ul>
					</li>

					<li class="border-bot" style="width:100%;margin-top:10px;">
						<h6 class="f-11 c-dark mb-10 pull-left c-green bold">Senior High</h6>
						<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
					</li>
					<li style="margin-bottom:0">
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">School Name</h6>
								<input type="text" style="width:645px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Academic Year</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Honor</h6>
								<input type="text" style="width:150px;">
							</li>
						</ul>
					</li>
					<li style="width:100%">
						<h6 class="f-11 c-light mb-3">program</h6>
						<input type="text" style="width:100%;">
					</li>
					<li class="border-bot" style="width:100%">
						<h6 class="f-11 c-dark mb-10">Address</h6>
					</li>
					<li>
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">Province</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">City</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Barangay</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Blk no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Lot no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Zip code</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Street</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Country</h6>
								<select name="" id="">
									<option value="Unites States of America">United States</option>
									<option value="Philippines">Philippines</option>
								</select>
							</li>
						</ul>
					</li>

					<li class="border-bot" style="width:100%;margin-top:10px;">
						<h6 class="f-11 c-dark mb-10 pull-left c-green bold">College</h6>
						<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
					</li>
					<li style="margin-bottom:0">
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">School Name</h6>
								<input type="text" style="width:645px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Academic Year</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Honor</h6>
								<input type="text" style="width:150px;">
							</li>
						</ul>
					</li>
					<li style="width:100%">
						<h6 class="f-11 c-light mb-3">program</h6>
						<input type="text" style="width:100%;">
					</li>
					<li class="border-bot" style="width:100%">
						<h6 class="f-11 c-dark mb-10">Address</h6>
					</li>
					<li>
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">Province</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">City</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Barangay</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Blk no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Lot no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Zip code</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Street</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Country</h6>
								<select name="" id="">
									<option value="Unites States of America">United States</option>
									<option value="Philippines">Philippines</option>
								</select>
							</li>
						</ul>
					</li>

					<li class="border-bot" style="width:100%;margin-top:10px;">
						<h6 class="f-11 c-dark mb-10 pull-left c-green bold">Masters</h6>
						<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
					</li>
					<li style="margin-bottom:0">
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">School Name</h6>
								<input type="text" style="width:645px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Academic Year</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Honor</h6>
								<input type="text" style="width:150px;">
							</li>
						</ul>
					</li>
					<li style="width:100%">
						<h6 class="f-11 c-light mb-3">program</h6>
						<input type="text" style="width:100%;">
					</li>
					<li class="border-bot" style="width:100%">
						<h6 class="f-11 c-dark mb-10">Address</h6>
					</li>
					<li>
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">Province</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">City</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Barangay</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Blk no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Lot no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Zip code</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Street</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Country</h6>
								<select name="" id="">
									<option value="Unites States of America">United States</option>
									<option value="Philippines">Philippines</option>
								</select>
							</li>
						</ul>
					</li>

					<li class="border-bot" style="width:100%;margin-top:10px;">
						<h6 class="f-11 c-dark mb-10 pull-left c-green bold">Doctorate</h6>
						<i class="fa fa-chevron-down pull-right c-green mt-5"></i>
					</li>
					<li style="margin-bottom:0">
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">School Name</h6>
								<input type="text" style="width:645px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Academic Year</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Honor</h6>
								<input type="text" style="width:150px;">
							</li>
						</ul>
					</li>
					<li style="width:100%">
						<h6 class="f-11 c-light mb-3">program</h6>
						<input type="text" style="width:100%;">
					</li>
					<li class="border-bot" style="width:100%">
						<h6 class="f-11 c-dark mb-10">Address</h6>
					</li>
					<li>
						<ul>
							<li>
								<h6 class="f-11 c-light mb-3">Province</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">City</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Barangay</h6>
								<input type="text" style="width:150px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Blk no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Lot no.</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Zip code</h6>
								<input type="text" style="width:50px;">
							</li>
							<li>
								<h6 class="f-11 c-light mb-3">Street</h6>
								<input type="text" style="width:150px;">
							</li>
							<li style="margin-right:0;">
								<h6 class="f-11 c-light mb-3">Country</h6>
								<select name="" id="">
									<option value="Unites States of America">United States</option>
									<option value="Philippines">Philippines</option>
								</select>
							</li>
						</ul>
					</li>
				</ul>
				<button class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
			</div>
	  	</div>
	</div>
</div>

<!-- Eligibility Modal -->
<div id="eligibilityModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h6 class="reset c-dark">Eligibility Information</h6>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('add_eligibility') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<br>
					<div class="form-group" style="padding-right: 50px;">
						<input type="text" name="title" class="form-control input-sm" placeholder="Eligibility title" required>
					</div>
					
					<div class="form-group" style="padding-right: 50px;">
						<input type="text" name="rank" class="form-control input-sm" placeholder="Rank" required>
					</div>
					
					<div class="form-group" style="padding-right: 50px;">
						<input type="text" name="rate" class="form-control input-sm" placeholder="Rating" required>
					</div>
					
					<div class="form-group" style="padding-right: 50px;">
						<input type="text" name="place_of_exam" class="form-control input-sm" placeholder="Place of Exam" required>
					</div>
					
					<div class="form-group" style="padding-right: 50px;">
						<input type="date" name="date_of_exam" class="form-control input-sm" placeholder="Date of Exam" required>
					</div>
					<!-- image -->
					<div class="input-group image-preview" style="padding-right: 50px;">
		                <input type="text" class="form-control image-preview-filename input-sm" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
		                <span class="input-group-btn">
		                    <!-- image-preview-clear button -->
		                    <button type="button" class="btn btn-default image-preview-clear btn-sm" style="display:none;">
		                        <span class="fa 	fa-remove"></span> Clear
		                    </button>
		                    <!-- image-preview-input -->
		                    <div class="btn btn-default btn-sm image-preview-input">
		                        <span class="fa fa-folder-open"></span>
		                        <span class="image-preview-input-title">Upload Certficate</span>
		                        <input type="file" accept="image/png, image/jpeg" name="eligibility_certificate"/> <!-- rename it -->
		                    </div>
		                </span>
		            </div>
					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="padding:5px 25px;margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>

	<!-- Preview -->
		<div id="preview_certificate" class="modal fade" role="dialog">
			<div class="modal-dialog modal-md">

			    <!-- Modal content-->
			    <div class="modal-content box-edge">
			    	<div class="modal-head"></div>   	
					<div class="modal-body">
						<center>
							<img src="" class="img-responsive img-thumbnail modal_cert_img">
						</center>		
					</div>
			  	</div>
			</div>
		</div>
	<!-- Upload -->
	<div id="upload_certificate" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">

		    <!-- Modal content-->
		    <div class="modal-content box-edge">
		    	<div class="modal-head"></div>   	
				<div class="modal-body" >
					<form action="{{ route('add_certificate') }}" method="post" enctype="multipart/form-data"  style="padding: 0px 50px 0px 0px;">
						{{ csrf_field() }}
							<h3>Add Certificate</h3><br>
							<div class="form-group">

							    <div class="input-group image-preview">
					                <input type="text" class="form-control image-preview-filename input-sm" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
					                <span class="input-group-btn">
					                    <!-- image-preview-clear button -->
					                    <button type="button" class="btn btn-default image-preview-clear btn-sm" style="display:none;">
					                        <span class="fa fa-remove"></span> Clear
					                    </button>
					                    <!-- image-preview-input -->
					                    <div class="btn btn-default btn-sm image-preview-input">
					                        <span class="fa fa-folder-open"></span>
					                        <span class="image-preview-input-title">Upload Certficate</span>
					                        <input type="file" accept="image/png, image/jpeg" name="certificate_file" required /> <!-- rename it -->
					                    </div>
					                </span>
					            </div>
						  	</div>
						  	<input type="text" name="id" id="add_cert_id" class="" readonly>
						  	<input type="text" name="table" id="add_cert_table" class="" readonly>
						  	<input type="text" name="column_pk" id="add_cert_pk" class="" readonly>

						  	<div class="form-group" style="padding: 0px 0px 10px 0px;">
						  		<input type="submit" value="Upload" class="btn btn-primary btn-sm pull-right">	
						  	</div>

						</div>
					</form>
				</div>
		  	</div>
		</div>
	</div>

<!-- Work Experience Modal -->
<div id="add_exp_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Experience</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('add_experience') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;">
					{{ csrf_field() }}

					<br>
					<div class="form-group">
						<label for="company">Company:</label>
						<input type="text" class="form-control input-sm" name="company" id="company" required>
					</div>

					<div class="form-group">
						<label for="position">Position:</label>
						<input type="text" class="form-control input-sm" name="position" id="position" required>
					</div>

					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control input-sm" name="address" id="address" required>
					</div>
					
					<h5 class="pad-bot-10"><b>Job Tenure</b></h5>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="from" id="from" required></div>
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="to" id="to" required></div>
						</div>
					</div>

					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>


<!-- Add Services Modal -->
<div id="add_service_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Service</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('insert_data') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;">
					{{ csrf_field() }}

					<br>
					<div class="form-group">
						<label for="service_title">Service:</label>
						<input type="text" class="form-control input-sm" name="service_title" id="service_title" required>
					</div>

					<div class="form-group">
						<label for="position">Position:</label>
						<input type="text" class="form-control input-sm" name="position" id="position" required>
					</div>

					<div class="form-group">
						<label for="details">Details:</label>
						<textarea name="details" id="details" class="form-control" style="resize:vertical;"></textarea>
					</div>
					
					<h5 class="pad-bot-10"><b>Job Tenure</b></h5>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="from" id="from" required></div>
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="to" id="to" required></div>
						</div>
					</div>

					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<input type="text" name="table" value="services" readonly class="hidden">
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>

<!-- Trainings and Certificates -->
<div id="add_training_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Training/Certficiate</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('insert_data') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;">
					{{ csrf_field() }}

					<br>
					<div class="form-group">
						<label for="title">Title:</label>
						<input type="text" class="form-control input-sm" name="title" id="title" required>
					</div>

					<div class="form-group">
						<label for="location">Location:</label>
						<input type="text" class="form-control input-sm" name="location" id="location" required>
					</div>

					<div class="form-group">
						<label for="no_of_hours">Number of hours:</label>
						<input type="text" name="no_of_hours" id="no_of_hours" class="form-control">
					</div>
					
					<h5 class="pad-bot-10"><b>Tenure</b></h5>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="from" id="from" required></div>
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="to" id="to" required></div>
						</div>
					</div>
					<!-- image -->
					<div class="input-group image-preview pad-top-10">
		                <input type="text" class="form-control image-preview-filename input-sm" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
		                <span class="input-group-btn">
		                    <!-- image-preview-clear button -->
		                    <button type="button" class="btn btn-default image-preview-clear btn-sm" style="display:none;">
		                        <span class="fa 	fa-remove"></span> Clear
		                    </button>
		                    <!-- image-preview-input -->
		                    <div class="btn btn-default btn-sm image-preview-input">
		                        <span class="fa fa-folder-open"></span>
		                        <span class="image-preview-input-title">Upload Certficate</span>
		                        <input type="file" accept="image/png, image/jpeg" name="certificate_file"/> <!-- rename it -->
		                    </div>
		                </span>
		            </div>

					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<input type="text" name="table" value="trainings" readonly class="hidden">
					<input type="text" name="p_key" value="training_id" readonly class="hidden">
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>

<!-- add_affiliation_modal -->
<div id="add_affiliation_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Affiliation</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('insert_data') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;">
					{{ csrf_field() }}

					<br>
					<div class="form-group">
						<label for="organization">Organization:</label>
						<input type="text" class="form-control input-sm" name="organization" id="organization" required>
					</div>

					<div class="form-group">
						<label for="position">Postion:</label>
						<input type="text" class="form-control input-sm" name="position" id="position" required>
					</div>
					
					<h5 class="pad-bot-10"><b>Job Tenure</b></h5>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="from" id="from" required></div>
							<div class="col-lg-6"><input type="date" class="form-control input-sm" name="to" id="to" required></div>
						</div>
					</div>

					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<input type="text" name="table" value="affiliations" readonly class="hidden">
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>

<!-- add_award_modal -->
<div id="add_award_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Award</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('insert_data') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;">
					{{ csrf_field() }}

					<br>
					<div class="form-group">
						<label for="award">Award:</label>
						<input type="text" class="form-control input-sm" name="award" id="award" required>
					</div>

					<div class="form-group">
						<label for="date_received">Date Received:</label>
						<input type="date" class="form-control input-sm" name="date_received" id="date_received" required>
					</div>

					<div class="form-group">
						<label for="event">Event:</label>
						<input type="text" class="form-control input-sm" name="event" id="event" required>
					</div>

					<!-- image -->
					<div class="input-group image-preview pad-top-10">
		                <input type="text" class="form-control image-preview-filename input-sm" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
		                <span class="input-group-btn">
		                    <!-- image-preview-clear button -->
		                    <button type="button" class="btn btn-default image-preview-clear btn-sm" style="display:none;">
		                        <span class="fa 	fa-remove"></span> Clear
		                    </button>
		                    <!-- image-preview-input -->
		                    <div class="btn btn-default btn-sm image-preview-input">
		                        <span class="fa fa-folder-open"></span>
		                        <span class="image-preview-input-title">Upload Certficate</span>
		                        <input type="file" accept="image/png, image/jpeg" name="certificate_file"/> <!-- rename it -->
		                    </div>
		                </span>
		            </div>


					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<input type="text" name="table" value="awards" readonly class="hidden">
					<input type="text" name="p_key" value="award_id" readonly class="hidden">
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>

<!-- add_skills_modal -->
<div id="add_skills_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Skills</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" >

				<form action="{{ route('update_skills') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;" onkeypress="return event.keyCode != 13";>
					{{ csrf_field() }}
					<br>
					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<ul class="list-inline">
						<li>
							 <div class="form-group">
								<h6 class="f-11 c-light mb-3">Language</h6>
								<input type="text" name="skills" class="form-control" data-role="tagsinput" value="{{$user->alumnus_info->student_per_info->skills->skills}}">
							 </div>
						</li>
						<li>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-prime btn-sm">Save</button>
							</div>
						</li>
						
					</ul>
					
				</form>
			</div>
	  	</div>
	</div>
</div>

<!-- add reference  -->

<div id="add_reference_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content box-edge">
	    	<div class="modal-head">
	    		<div class="border-bot" style="padding:16px 0;">
	    			<h3 class="reset c-dark">Add Reference</h3>
	    		</div>
	    	</div>   	
			<div class="modal-body" style="padding-top:0;overflow:hidden">

				<form action="{{ route('insert_data') }}" method="post" enctype="multipart/form-data" style="padding-right: 50px;">
					{{ csrf_field() }}

					<br>
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control input-sm" name="name" id="name" required>
					</div>

					<div class="form-group">
						<label for="position">Position:</label>
						<input type="text" class="form-control input-sm" name="position" id="position" required>
					</div>

					<div class="form-group">
						<label for="company_name">Company:</label>
						<input type="text" name="company_name" id="company_name" class="form-control">
					</div>

					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" name="address" id="address" class="form-control">
					</div>

					<div class="form-group">
						<label for="contact_number">Contact Number:</label>
						<input type="text" name="contact_number" id="contact_number" class="form-control">
					</div>

					<input type="text" name="spi_id" value=" {{ $user->alumnus_info->student_per_info->spi_id }} " class="hidden" readonly>
					<input type="text" name="table" value="references" readonly class="hidden">
					<button type="submit" class="btn btn-success btn-prime btn-sm pull-right" style="margin:15px 0;">Save</button>
				</form>
			</div>
	  	</div>
	</div>
</div>

@endsection

@section('script')
	
	<script src="{{ asset('public/plugins/bootstrap-tags/bootstrap-tagsinput.js') }}"></script>

	<script>
		$(document).ready(function(){
			$(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
			    $(".alert-dismissible").alert('close');
			});
		});
	</script>

	<script>
		
		$(document).on('click', '#close-preview', function(){ 
		    $('.image-preview').popover('hide');
		    // Hover befor close the preview
		    $('.image-preview').hover(
		        function () {
		           $('.image-preview').popover('show');
		        }, 
		         function () {
		           $('.image-preview').popover('hide');
		        }
		    );    
		});

		$(function() {
		    // Create the close button
		    var closebtn = $('<button/>', {
		        type:"button",
		        text: 'x',
		        id: 'close-preview',
		        style: 'font-size: initial;',
		    });
		    closebtn.attr("class","close pull-right");
		    // Set the popover default content
		    $('.image-preview').popover({
		        trigger:'manual',
		        html:true,
		        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
		        content: "There's no image",
		        placement:'bottom'
		    });
		    // Clear event
		    $('.image-preview-clear').click(function(){
		        $('.image-preview').attr("data-content","").popover('hide');
		        $('.image-preview-filename').val("");
		        $('.image-preview-clear').hide();
		        $('.image-preview-input input:file').val("");
		        $(".image-preview-input-title").text("Browse"); 
		    }); 
		    // Create the preview image
		    $(".image-preview-input input:file").change(function (){     
		        var img = $('<img/>', {
		            id: 'dynamic',
		            width:250,
		            height:200
		        });      
		        var file = this.files[0];
		        var reader = new FileReader();
		        // Set preview image into the popover data-content
		        reader.onload = function (e) {
		            $(".image-preview-input-title").text("Change");
		            $(".image-preview-clear").show();
		            $(".image-preview-filename").val(file.name);            
		            img.attr('src', e.target.result);
		            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
		        }        
		        reader.readAsDataURL(file);
		    });  
		});

		// $(document).on('click', '.remove_data', function(event) {
		// 	event.preventDefault();
		// 	var spi_id = $(this).attr('alumnus-id');
		// 	var id     = $(this).attr('data-id');
			
		// 	$.post(' {{ route("remove_eligibility") }} ', {'elig_id': id, 'spi_id': spi_id, _token: '{{csrf_token()}}'}, function(data, textStatus, xhr) {
		// 		location.reload();
		// 	});
		// });

		$(document).on('click', '.preview_certificate', function(event) {
			event.preventDefault();
			$('#preview_certificate').modal('toggle');

			var elig_id = $(this).attr('data-id');
			var file 	= $(this).attr('file-name');
			var folder  = $(this).attr('file-folder');

			$('.modal_cert_img').attr('src', "{{ asset('public/storage/certificates')}}"+"/"+folder+"/"+file); 
		});

		$(document).on('click', '.upload_certificate', function(event) {
			event.preventDefault();	
			$('#upload_certificate').modal('toggle');

			var id  = $(this).attr('data-i');
			var pk  = $(this).attr('data-p');
			var tbl = $(this).attr('data-t');

			$("#add_cert_id").val(id);
			$("#add_cert_pk").val(pk);
			$("#add_cert_table").val(tbl);
		});

		$(document).on('click', '.remove_data', function(event) {
			
			event.preventDefault();
			var id 	  = $(this).attr('data-i');
			var table = $(this).attr('data-t');
			var primary = $(this).attr('data-p');

			$.post(' {{ route("remove_data") }} ', {'id': id, 'table': table, 'primary': primary ,_token: '{{csrf_token()}}'}, function(data, textStatus, xhr) {
				location.reload();
			});
		});

	</script>

@endsection