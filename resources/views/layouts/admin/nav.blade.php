<?php
$active = \Request::segment(2);
?>

{{--@if(!Auth::guard($guard)->check())--}}

<header class="header" style="padding-top:10px;">
    <div class="container">
        <a href="index.html" class="pull-left">
            <img src="{{url('public/images/logo.png')}}" class="logo">
        </a>
        <div class="alumni-type pull-left">
            <span class="myriad f-11">Access Type: </span>
            <span class="myriad f-11">System Administrator</span>
        </div>
        <ul class="notifs pull-left">
            <li>
                <img src="{{url('public/images/mailico.png')}}" class="mailico">
                <span>10</span>
            </li>
        </ul>
        <div class="head-welcome pull-right">
            <img src="{{url('public/images/don.jpg')}}" alt="">
            <div class="pull-left mr-15">
                <h6 class="c-white f-10 mt-3 pull-left mr-5">Welcome:</h6><a href="" class="f-13 c-neon" style="line">Don Del Rosario</a>
                <p class="c-white f-10 mb-0" style="margin-left:50px;">Librarian</p>
            </div>
        </div>
    </div>
</header>


<div class="sub-nav mb-24">
    <div class="container">
        <ul class="pull-left">
            <li><a <?php if($active == 'alumni'){echo 'class="active"'; } ?>href="{{route('alumni.index')}}">Alumnus</a></li>
            <li><a <?php if($active == 'company'){echo 'class="active"'; } ?> href="{{route('company.visitor')}}">Company</a></li>
            <li><a <?php if($active == 'advertisement'){echo 'class="active"'; } ?> href="{{route('advertisement.index')}}">Advertising</a></li>
            <li><a <?php if($active == 'account'){echo 'class="active"'; } ?>  href="{{route('account.index')}}">Account</a></li>
            <li><a href="reports_tesda.html">Reports</a></li>
            <li><a href="">Announcements</a></li>
            <li><a href="">Invitation</a></li>
        </ul>

    </div>
</div>
{{--@endif--}}