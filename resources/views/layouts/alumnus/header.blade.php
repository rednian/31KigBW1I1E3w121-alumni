<style>
    .signout:hover {
        text-decoration: none;
    }
</style>


<header class="header" style="padding-top:10px;">
    <div class="container">
        <a href="index.html" class="pull-left">
            <img src="{{url('public/images/logo.png')}}" class="logo">
        </a>
        <div class="alumni-type pull-left">
            <span class="myriad f-11">Access Type: </span>
            <span class="myriad f-11">
                @if(Auth::check())

                    {{ ucfirst($user->account_type) }}

                @else

                    Unknown

                @endif
            </span>
        </div>
        <ul class="notifs pull-left">
            <li>
                <img src="{{url('public/images/messageico.png')}}" class="messageico">
                <span>2</span>
            </li>
            <li>
                <img src="{{url('public/images/mailico.png')}}" class="mailico">
                <span>10</span>
            </li>
        </ul>
        <div class="head-welcome pull-right">
            
            <div class="sign-out pull-right">
                <a href="{{ route('logout') }}" class='signout'>
                    <span class="myriad f-11 f-white m-5">Sign out</span>
                    <img src="{{url('public/images/signout.png')}}" style="width:20px;"">
                </a>
            </div>
            <!-- <a class="btn btn-xs btn-primary" href="{{ route('logout') }}">Logout</a> -->
        </div>
    </div>
</header>