<div class="profile-area">
	<div class="profile-head">
		<img class="auth_image">
		
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