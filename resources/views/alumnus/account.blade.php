@extends('layouts/alumnus/alumnus-master')

@section('links')
	<style>
		.top-right {
		    position: absolute;
		    top: 8px;
		    right: 25px;
		}
	</style>
@endsection

@section('content')

	<div class="main-content">

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

					<div class="my-account bg-white p-15">
						<div class="head border-bot p-bot-10 oh">
							<h6 class="mt-0 pull-left f-dark">General Account Settings</h6>
							<a href="" class="pull-right c-bright-green f-12" style="line-height:25px;">View Account History</a>
						</div>

						<ul class="mb-24">
							<li class="ptb-10 oh">
								<div class="pull-left">
									<h6 class="mt-0 f-12 c-light mb-3">Username</h6>
									<h5 class="mt-0 f-16 c-dark">{{ Auth::user()->username }}</h5>
								</div><br>
								<a href="" class="username_upd_btn pull-right c-green f-12"> Edit</a>
							</li>
							<li class="ptb-10 oh">
								<div class="pull-left">
									<h6 class="mt-0 f-12 c-light">Password</h6>
									<h5 class="mt-0 f-16 c-dark pull-left mr-10 pt-3">********************* </h5>
								</div><br>
								<a href="" class="pass_upd_btn pull-right c-green f-12"> Edit</a>
							</li>
						</ul>

						<div class="head border-bot p-bot-10 oh">
							<h6 class="mt-0 pull-left f-dark">Security</h6>
						</div>
						<ul>
							<li class="ptb-10 oh">
								<div class="pull-left">
									<h6 class="mt-0 f-12 c-light mb-3">Contact Verification Number</h6>
									<h5 class="mt-0 f-16 c-dark">{{ Auth::user()->contact_verification_no }}</h5>
								</div><br>
								<a href="" class="contact_upd_btn pull-right c-green f-12"> Edit</a>
							</li>
							<li class="ptb-10 oh">
								<div class="pull-left">
									<h6 class="mt-0 f-12 c-light mb-3">Alternate Email Address</h6>
									<h5 class="mt-0 f-16 c-dark">{{ Auth::user()->email_address }}</h5>
								</div><br>
								<a href="" class="email_upd_btn pull-right c-green f-12"> Edit</a>
							</li>
						</ul>
					</div>

				</div>

			</div>

		</div>
	</div> 
	
	<!-- Modals  -->

	<div id="username_update" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">

		    <!-- Modal content-->
		    <div class="modal-content box-edge">
		    	<div class="modal-head"></div>   	
				<div class="modal-body">
					
					<div class="row">
						<div class="col-lg-4">
							<div class="col-image pad-bot-10 text-center">
								<img class="img img-responsive img-thumbnail auth_image" alt="" style="width:100%;"><br>
								<div class="text-center"><a href="" class="c-green cdp_btn hidden">Change display photo</a></div>
							</div>
						</div>	
						<div class="col-lg-8">
							<div class="container-fluid">
								<form method="POST" action="{{ route('update_username') }}">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="{{ Auth::user()->username }}" required>
									</div>
									<div class="form-group">
										<label for="old_password">Old Password</label>
										<input type="password" class="form-control" name="old_password" id="old_password" placeholder="************" required>
									</div>

									@if(session()->has('username_wrong_password'))
										<div class="alert alert-danger alert-dismissible fade in" role="alert" style="padding:5px 0px 5px 5px !important;">
									        <strong>Error! </strong> {!! session()->get('username_wrong_password'); !!}.
									    </div>
									@endif

								  	<button type="submit" class="btn btn-primary update_submit" disabled>Submit</button>
								</form>
							</div>
						</div>	
					</div>

				</div>
		  	</div>
		</div>
	</div>

	<div id="password_update" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">

		    <!-- Modal content-->
		    <div class="modal-content box-edge">
		    	<div class="modal-head"></div>   	
				<div class="modal-body">
					
					<div class="row">
						<div class="col-lg-4">
							<div class="col-image pad-bot-10 text-center">
								<img class="img img-responsive img-thumbnail auth_image" alt="" style="width:100%;"><br>
								<div class="text-center"><a href="" class="c-green cdp_btn hidden">Change display photo</a></div>
							</div>
						</div>	
						<div class="col-lg-8">
							<div class="container-fluid">
								<form method="POST" action="{{ route('update_password') }}">
									{{ csrf_field() }}

									<div class="form-group">
										<label for="old_password">Old Password</label>
										<input type="password" class="form-control" name="old_password" id="old_password_pass" placeholder="************" required>
									</div>
									
									<div class="form-group">
										<label for="new_password">New Password</label>
										<input type="password" pattern=".{5,}" class="form-control" name="password" id="new_password" placeholder="Minimum of 5 characters" required>
									</div>

									<div class="form-group">
										<label for="confirm_password">Confirm Password</label><small class='text-danger unmatched hidden'> Passwords do not match</small>
										<input type="password" pattern=".{5,}" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Minimum of 5 characters" required>
										<small class="form-text text-muted">We'll never share your password with anyone else.</small>
									</div>

									@if(session()->has('password_wrong_password'))
										<div class="alert alert-danger alert-dismissible fade in" role="alert" style="padding:5px 0px 5px 5px !important;">
									        <strong>Error! </strong> {!! session()->get('password_wrong_password'); !!}.
									    </div>
									@endif
									
								  	<button type="submit" class="btn btn-primary pass_update_submit" disabled>Submit</button>
								</form>
							</div>
						</div>	
					</div>

				</div>
		  	</div>
		</div>
	</div>

	<div id="contact_update" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">

		    <!-- Modal content-->
		    <div class="modal-content box-edge">
		    	<div class="modal-head"></div>   	
				<div class="modal-body">
					
					<div class="row">
						<div class="col-lg-4">
							<div class="col-image pad-bot-10 text-center">
								<img class="img img-responsive img-thumbnail auth_image" alt="" style="width:100%;"><br>
								<div class="text-center"><a href="" class="c-green cdp_btn hidden">Change display photo</a></div>
							</div>
						</div>	
						<div class="col-lg-8">
							<div class="container-fluid">
								<form method="POST" action="{{ route('update_contact') }}">
									{{ csrf_field() }}

									<div class="form-group">
										<label for="old_password">Contact Number</label>
										<input type="number" class="form-control" name="new_number" required>
									</div>
									<div class="form-group">
										<label for="old_password">Password</label>
										<input type="password" class="form-control" name="old_password" placeholder="************" required>
									</div>

									@if(session()->has('contact_wrong_password'))
										<div class="alert alert-danger alert-dismissible fade in" role="alert" style="padding:5px 0px 5px 5px !important;">
									        <strong>Error! </strong> {!! session()->get('contact_wrong_password'); !!}.
									    </div>
									@endif
									
								  	<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>	
					</div>

				</div>
		  	</div>
		</div>
	</div>

	<div id="email_update" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">

		    <!-- Modal content-->
		    <div class="modal-content box-edge">
		    	<div class="modal-head"></div>   	
				<div class="modal-body">
					
					<div class="row">
						<div class="col-lg-4">
							<div class="col-image pad-bot-10 text-center">
								<img class="img img-responsive img-thumbnail auth_image" alt="" style="width:100%;"><br>
								<div class="text-center"><a href="" class="c-green cdp_btn hidden">Change display photo</a></div>
							</div>
						</div>	
						<div class="col-lg-8">
							<div class="container-fluid">
								<form method="POST" action="{{ route('update_email') }}">
									{{ csrf_field() }}

									<div class="form-group">
										<label for="old_password">New e-mail</label>
										<input type="email" class="form-control" name="new_email" required>
									</div>
									<div class="form-group">
										<label for="old_password">Password</label>
										<input type="password" class="form-control" name="old_password" placeholder="************" required>
									</div>

									@if(session()->has('email_wrong_password'))
										<div class="alert alert-danger alert-dismissible fade in" role="alert" style="padding:5px 0px 5px 5px !important;">
									        <strong>Error! </strong> {!! session()->get('email_wrong_password'); !!}.
									    </div>
									@endif
									
								  	<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>	
					</div>

				</div>
		  	</div>
		</div>
	</div>

@endsection


@section('script')

	@if(session()->has('username_wrong_password'))
		<script>
			$(document).ready(function() {
				$("#username_update").modal('show')
			});
		</script>
	@endif
	
	@if(session()->has('password_wrong_password'))
		<script>
			$(document).ready(function() {
				$("#password_update").modal('show')
			});
		</script>
	@endif

	@if(session()->has('contact_wrong_password'))
		<script>
			$(document).ready(function() {
				$("#contact_update").modal('show')
			});
		</script>
	@endif

	@if(session()->has('email_wrong_password'))
		<script>
			$(document).ready(function() {
				$("#email_update").modal('show')
			});
		</script>
	@endif

	<script>
		$(document).ready(function(){
			$(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
			    $(".alert-dismissible").alert('close');
			});
		});
	</script>
	<script>
		
		// $('.username_upd_btn').click(function(event) {
		// 	event.preventDefault();
		// 	$("#username_update").modal('toggle');
		// });

		$('.username_upd_btn').click(function(event) {
			event.preventDefault();
			$("#username_update").modal('show');
		});

		$('.pass_upd_btn').click(function(event) {
			event.preventDefault();
			$("#password_update").modal('show');
		});
		
		$('.contact_upd_btn').click(function(event) {
			event.preventDefault();
			$("#contact_update").modal('show');
		});

		$('.email_upd_btn').click(function(event) {
			event.preventDefault();
			$("#email_update").modal('show');
		});
		
		$("#username").keyup(function(event) {

			if( $(this).val() == "{{ Auth::user()->username }}" ) {
				$(".update_submit").attr('disabled', 'disabled')
			}
			else{
				$(".update_submit").removeAttr('disabled')
			}

		});

		$('#confirm_password').keyup(function(event) {

			if($(this).val() != $("#new_password").val()){
				$('.unmatched').removeClass('hidden');
				$('.pass_update_submit').attr('disabled', 'disabled');
			}else{
				$('.unmatched').addClass('hidden');
				$('.pass_update_submit').removeAttr('disabled');
			}

		});

	</script>

@endsection