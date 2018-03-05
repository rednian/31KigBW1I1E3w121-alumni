<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/applications.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/help.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/inbox.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jobs.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/tor.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/visit.css') }}" rel="stylesheet">
    @yield('style')
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">

</head>
<body>
    <?php
    use Illuminate\Support\Facades\Auth;

    $active = \Request::segment(2);

            $user = Auth::user();

            $name = ucwords($user['fname']).' '.ucwords($user['lastname']);
    ?>
    <header class="header" style="padding-top:10px;">
        <div class="container">
            <a href="{{route('account.index')}}" class="pull-left">
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
                <img src="{{asset('public/storage/'.$user['image_path'])}}" alt="">
                <div class="pull-left mr-15">
                    <h6 class="c-white f-10 mt-3 pull-left mr-5">Welcome:</h6><a href="" class="f-13 c-neon" style="line">{{$name}}</a>
                    <p class="c-white f-10 mb-0" style="margin-left:50px;">{{ucwords($user['position'])}}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="sub-nav mb-24">
        <div class="container">
            <ul class="pull-left">
                <li><a <?php if($active == 'alumni'){echo 'class="active"'; } ?> href="{{route('alumnus.index')}}">Alumnus</a></li>
                <li><a <?php if($active == 'company'){echo 'class="active"'; } ?> href="{{route('company.visitor')}}">Company</a></li>
                <li><a <?php if($active == 'advertisement'){echo 'class="active"'; } ?> href="{{route('advertisement.index')}}">Advertising</a></li>
                <li><a <?php if($active == 'account'){echo 'class="active"'; } ?>  href="{{route('account.index')}}">Account</a></li>
                <li><a href="reports_tesda.html">Reports</a></li>
                <li><a href="">Announcements</a></li>
                <li><a href="">Invitation</a></li>
            </ul>

        </div>
    </div>

    @yield('content')

<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/moment.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>
@yield('script')

</body>
</html>
