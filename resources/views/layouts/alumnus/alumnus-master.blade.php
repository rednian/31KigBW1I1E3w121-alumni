<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Styles -->
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
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
    @yield('style')

</head>
<body>
    
    @include('layouts/alumnus/header')
    @include('layouts/alumnus/nav')
    @include('layouts/alumnus/sidebar')

    <div class="main-content">
        <div class="container">
            <div class="row">
                
                <div class="col-xs-3 s-pad bg-white no-padding">
                    <div class="profile-area">
                        <div class="profile-head">
                            <img src="{{url('public/images/don.jpg')}}">
                            <h5>Don J. Del Rosario</h5>
                            <h6>Bachelor of Science in Computer Science</h6>
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
                            <img src="images/facebook-ico.png">
                            <img src="images/twitter-ico.png">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 s-pad">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    
        
<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/moment.js') }}"></script>
@yield('script')

</body>
</html>
