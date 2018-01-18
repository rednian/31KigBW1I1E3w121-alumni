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
    @include('layouts.admin.header')
    @include('layouts.admin.nav')
    @yield('content')

<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/moment.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>
@yield('script')

</body>
</html>
